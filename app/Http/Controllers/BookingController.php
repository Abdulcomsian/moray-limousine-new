<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Configuration;
use App\Models\ExtendBooking;
use App\Models\Enduser;
use App\Http\Requests\BookingRequest;
use App\Models\invoice;
use App\Models\Location;
use App\Models\BookingHour;
use App\Notifications\BookingNotification;
use App\Notifications\MorayLimousineNotifications;
use App\Notifications\InvoiceNotifications;
use App\Models\OtherUser;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\VehicleCategory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Session;
use Stripe;
use DB;
use PDF;
use Illuminate\Support\Facades\Hash;
use App\AdminAssingBooking;


class BookingController extends Controller
{
    /**
     * @var VehicleCategory
     */
    private $classes;
    private $booking;
    private $other_user;

    /**
     * BookingController constructor.
     * @param VehicleCategory $categories
     * @param Booking $booking
     * @param OtherUser $other_user
     */
    public function __construct(VehicleCategory $categories, Booking $booking, OtherUser $other_user)
    {
        $this->classes = $categories;
        $this->booking = $booking;
        $this->other_user = $other_user;
    }

    /**
     * This method return select class view with given prices tags
     * @param BookingRequest $request
     * @return Factory|View
     */
    public function selectClassByDistance(BookingRequest $request)
    { 
            $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if (Auth()->check() == false)
            {
                Session::put('search', $actual_link);
            }
            $validated = $request->validated();
            $dist = (float)$request['total_distance'];
            $durationInHours = $this->durationInHour($request->total_duration);
            $distance_in_km=$dist/1000;
            //$distance_in_km = $this->calculateDistance($dist);
            $classes = $this->classes->all();
            //    Set Prices and also set the discounts & markup with classes
            $classes =  $this->booking->classesWithPriceByDistance($classes, $distance_in_km, $request->all());

             // Paginate the array manually
            $perPage = 4; // Number of items per page
            $currentPage = request('page', 1); // Get the current page from the request
            $pagedData = array_slice($classes, ($currentPage - 1) * $perPage, $perPage);
            $paginatedClasses = new LengthAwarePaginator($pagedData, count($classes), $perPage);

            $data['booking_type'] = 'distance';
            $data['form_data'] = $request->except('_token');
            $data['distance'] = $distance_in_km;
            $data['classes'] = $paginatedClasses;
            $data['travel_duration'] = $durationInHours;
            return view('booking.select-vehicle-class', $data);
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function selectClassByHour(Request $request)
    {
        $classes = $this->classes->all();
        $selected_hour = $request['selected_hour'];
        //           set prices and set discounts or markup with given classes
        $classes = $this->booking->classesWithPriceByDuration($classes, $selected_hour,$request->all());

         // Paginate the array manually
        $perPage = 4; // Number of items per page
        $currentPage = request('page', 1); // Get the current page from the request
        $pagedData = array_slice($classes, ($currentPage - 1) * $perPage, $perPage);
        $paginatedClasses = new LengthAwarePaginator($pagedData, count($classes), $perPage);

        $data['booking_type'] = 'time';
        $data['form_data'] = array_merge($request->except('_token'), ['drop_address' => "This Booking Is For " . $selected_hour . " Hours  : "]);
        $data['classes'] = $paginatedClasses;
        $data['selected_hours'] = $selected_hour;
        $data['travel_duration'] = $selected_hour;
        return view('booking.select-vehicle-class', $data);
    }


    /**
     * @param Request $request
     * @return Factory|RedirectResponse|Redirector|View
     */
    public function saveBookingOnSelect(Request $request)
    {
        if (Auth()->check())
        {
            $distance = $request['distance'];
            $form_data = json_decode($request->formData);
            $tax_amount = $request->tax_amount;
            $tax_amount = str_replace(',', '', $tax_amount);
            $travel_amount = $request->travel_price;
            $id = $request->selected_id;
            $selected_category =  $this->classes->find($id);
            $travel_amount = str_replace(',', '', $travel_amount);
            $booking = $this->booking->saveBookingOnSelect($form_data, $id, $travel_amount, $distance, $tax_amount);
            //get enduser billing details if have
            $enduser_billing_details = Enduser::where('user_id', Auth()->id())->first();
            $data['options'] = $selected_category->options()->get();
            $data['selected_category'] = $selected_category;
            $data['form_data'] = $form_data;
            $data['booking'] = $booking;
            $data['travel_amount'] = $travel_amount;
            $data['enduser_billing_details'] = $enduser_billing_details;
            return view('booking.select-options', $data);
        } else
        {
            session(['link' => url()->previous()]);
            return redirect('/login');
        }
    }

    /**
     * @param Request $request
     * @return Factory|View
     */

    public function extraOptionsDetails(Request $request)
    {
        $options_data = $request->optionsData;
        $options_data = json_decode($options_data);
        // dd($options_data);
        if ($options_data == null)
        {
            $options_data = [];
        }
        $class = $request->selectedClass;
        $class = json_decode($class);
        $form_data = $request->formData;
        $form_data = json_decode($form_data);
        $tax_amount = $form_data->tax_amount;
        $id = $form_data->id;
        $travel_amount = $form_data->travel_amount;
        $booking =  $this->booking->saveSelectedOptions($options_data, $id, $travel_amount, $request->all(), $tax_amount);

        //saving if booking for some one other

        $this->other_user->storeOtherUser($request->all(), $id);
        $options_price = $booking->extra_options_amount;
        $tax_rate = "";
        if (!empty(Configuration::first()->tax_rate))
        {
            $tax_rate = Configuration::first()->tax_rate;
        }
        return view('booking.billing-information', ['class' => $class, 'form_data1' => $form_data, 'form_data' => $booking, 'options_data' => $options_data, 'options_price' => $options_price, 'tax_rate' => $tax_rate]);
    }



    /**PayPal Transaction Complete Action
     *
     * @param Request $request
     */


    // public function paypaltransactioncomplete(Request $request)
    // {
    //     $booking_id = $request->input('bookingId');
    //     $booking = Booking::find($booking_id);
    //     $booking->orderId = $request->input('orderID');
    //     $booking->userDetail = json_encode($request->input('userDetail'), JSON_PRETTY_PRINT);

    //     $booking->payment_status = 'paid';
    //     $booking->booking_status = 'new';
    //     $booking->update();

    //     $notify_booking_user = array_merge($this->notify_booking_user, ['body' => 'Hello  ! Your booking request For Pick Address ' . $booking->pick_addess . ' Is Received We Will Let You Know When a Driver & Vehicle will be assigned to your booking. ']);
    //     $notify_booking_admin = $this->notificationMsg($booking);
    //     $user = $booking->user;
    //     $admin = User::where('user_type', 'admin')->get();
    //     $user->notify(new MorayLimousineNotifications($notify_booking_user));
    //     Notification::send($admin, new BookingNotification($notify_booking_admin));
    // }



    //stripe submit action
    public function storeBooking(Request $request)
    {
         $booking_id = $request->input('bookingId');
         $booking = Booking::find($booking_id);
         $amount=$booking->extra_options_amount+$booking->travel_amount;
       try{
             Stripe\Stripe::setApiKey('sk_test_51O79eiJ1EtA0iMLv07oP8GXAxnJsE2E85sssHiqm1v19axnc0blY8LvOqEByDhYKDl5YeW6belFYNKMBg8lAjez500zxYuPrwZ');
             $stripedata=Stripe\Charge::create ([
                    "amount" => $amount*100,
                    "currency" => "eur",
                    "source" => $request->stripeToken,
                    "description" => "This payment is for tested purpose"
            ]);

            $booking->orderId = $stripedata->id;
            $booking->userDetail = json_encode($stripedata, JSON_PRETTY_PRINT);
            $booking->payment_status = 'paid';
            $booking->booking_status = 'new';
            $booking->update();

            $notify_booking_user = array_merge($this->notify_booking_user, ['body' => 'Hello  ! Your booking request For Pick Address ' . $booking->pick_addess . ' Is Received We Will Let You Know When a Driver & Vehicle will be assigned to your booking. ']);
            $notify_booking_admin = $this->notificationMsg($booking);
            $user = $booking->user;

            $admin = User::where('user_type', 'admin')->get();
            $user->notify(new MorayLimousineNotifications($notify_booking_user));
            Notification::send($admin, new BookingNotification($notify_booking_admin));



            //invoice work here
            $users = user::find($user->id);
            $result = invoice::create([
                'booking_id' => $booking->id,
                'invoice_number' => 'ML- ' . mt_rand(100000, 999999)
            ]);
            $invoice_number = $result->invoice_number;


            //GENERATE PDF FILE AND SEND TO IN EMAIL


            $pdf = PDF::loadView('invoicepdf', ['booking' => $booking, 'invoice_number' => $invoice_number]);

            // dd('abcd');

            $path = public_path('pdf');
            $fileName =  'invoice' . $booking_id . '.' . 'pdf';
            $pdf->save($path . '/' . $fileName);



            //send invoice using email

            $notify_admins_msg = [
                'greeting' => 'Invoice',
                'subject' => 'Booking Invoice',
                'body' => [
                    'booking' => 'BOOKING DETAILS',
                    'Pick Date'   =>   $booking->pick_date,
                    'Pick Address'   =>   $booking->pick_address,
                    'Drop Address'   =>   $booking->drop_address,
                    'Selected Class'   =>   $booking->drop_address,
                    'Travel Amount'   =>  $booking->travel_amount,
                    'extra Amount'     =>  $booking->extra_options_amount,
                    'Payment Status'   =>  $booking->payment_status,
                    'invoicenumber' => $invoice_number,
                    'bookingid' => $booking_id,
                    'pendingamount' =>'',
                    'filename' => $fileName,
                ],
                'thanks_text' => 'Thanks For Using Moray Limousines',
                'action_text' => '',
                'action_url' => '',
            ];
            Notification::send($users, new InvoiceNotifications($notify_admins_msg));
             return view('booking.thanks')->with('booking', $booking);
        } catch (\Exception $exception) {
            return redirect()->back()->with('error','ERROR .. !  '.$exception->getMessage().'.');;
        }



    }

    /**
     * @param $id
     * @return Factory|View
     */
    public function thanksPage($id)
    {
        $booking = ExtendBooking::find($id);
        if ($booking)
        {
            $original_booking = $booking->booking->find($booking['booking_id']);
            return view('booking.thanks-page', ['booking' => $booking, 'original_booking' => $original_booking]);
        } else {
            return view('booking.thanks-page');
        }
    }

    /**
     * @param $id
     * @return Factory|View
     */
    public function thanksHome($id)
    {
        $booking = auth()->user()->bookings->find($id);
        if ($booking) {
            return view('booking.thanks')->with('booking', $booking);
        } else {
            return view('booking.thanks');
        }
    }


    /**
     * @param $id
     * @return RedirectResponse
     */
    public function bookingApprove($id)
    {
        $booking  = Booking::find($id);
        $booking->booking_status = 'approved';
        $booking->save();
        $user = $booking->user;
        $approve_msg = array_merge($this->approve_booking_msg, ['body' => 'Your Booking Request is approved by Moray Limousine which ' .
            $booking['pick_address'] .  ' And Pick Time is  ' . $booking['pick_time'] . ' ! Enjoy With Us.  ']);
        $user->notify(new MorayLimousineNotifications($approve_msg));
        return redirect()->back();
    }


    public function adminbookingApprove(Request $request)
    {
            //assign to driver from admin side

            $vehicleId =$request->vehicle;
            $bookingId = $request->id;
            $driver =$request->driver; //array


            $booking = Booking::find($bookingId);
            $pickUpDate = $booking->pick_date;

            $booking->vehicle()->sync($vehicleId);
            $booking->driver()->attach($driver, ['booking_date' => $pickUpDate, 'assigned_to' => 'driver','admin_assign'=>1]);
            $assign_msg = array_merge($this->notify_driver_assign, ['body' => 'You are assigned a new ride which booking address is : ' . $booking->pick_address . ' See yor dashboard for more details or click the button blow.. ', 'action_url' => '/driver/dashboard']);
            $driveruser = User::find($driver);
            $driveruser->notify(new MorayLimousineNotifications($assign_msg));
            $booking  = Booking::find($request->id);
            $booking->booking_status = 'approved';
            $booking->save();
            $user = $booking->user;
            $approve_msg = array_merge($this->approve_booking_msg_admin, ['body' => 'Your Booking Confirm is approved by Moray Limousine which ' .
            $booking['pick_address'] .  ' And Pick Time is  ' . $booking['pick_time'] . ' is Assigned to '.$driveruser->first_name .' '.$driveruser->last_name.' having phone number is '.$driveruser->phone_number.' ! Enjoy With Us.  ']);
            $user->notify(new MorayLimousineNotifications($approve_msg));
            return redirect()->back();
    }

    public function editadminbookingApprove(Request $request)
    {
            $vehicleId =$request->vehicle;
            $bookingId = $request->id;
            $driver =$request->driver; //array


            $booking = Booking::find($bookingId);
            $pickUpDate = $booking->pick_date;

            $booking->vehicle()->sync($vehicleId);
            $booking->driver()->updateExistingPivot($driver, ['booking_date' => $pickUpDate, 'assigned_to' => 'driver','status'=>'approved','driver_status'=>'approved','admin_assign'=>1]);
            $assign_msg = array_merge($this->notify_driver_assign, ['body' => 'You are assigned a new ride which booking address is : ' . $booking->pick_address . ' See yor dashboard for more details or click the button blow.. ', 'action_url' => '/driver/dashboard']);
            $driveruser = User::find($driver);
            $driveruser->notify(new MorayLimousineNotifications($assign_msg));
            $booking  = Booking::find($request->id);
            $booking->booking_status = 'approved';
            $booking->save();
            $user = $booking->user;
            $approve_msg = array_merge($this->approve_booking_msg_admin, ['body' => 'Your Booking Confirm is updated by Moray Limousine which ' .
            $booking['pick_address'] .  ' And Pick Time is  ' . $booking['pick_time'] . ' is Assigned to '.$driveruser->first_name .' '.$driveruser->last_name.' having phone number is '.$driveruser->phone_number.' ! Enjoy With Us.  ']);
            $user->notify(new MorayLimousineNotifications($approve_msg));
            return redirect()->back();
    }
    /**
     * @param $id
     * @return RedirectResponse
     */
    public function bookingDisapprove($id)
    {
        $booking  = Booking::find($id);
        $booking->booking_status = 'disapproved';
        $booking->save();
        $user = $booking->user;
        //        Send Notification
        $disapprove_msg = array_merge($this->disapprove_booking_msg, ['body' => 'Your Booking Request is not approved by Moray Limousine which ' .
            $booking['pick_address'] .  ' And Pick Time is  ' . $booking['pick_time']]);
        $user->notify(new MorayLimousineNotifications($disapprove_msg));
        return redirect()->back();
    }

    /**
     * @param $booking
     * @return array
     */
    public function sendnotify()
    {
        $notify_booking_admin = $this->notificationMsgtest();
        //echo"<pre>";print_r($notify_booking_admin);exit;
        $admin = User::where('user_type', 'admin')->get();
        $admin[0]->email = 'obaidkust@gmail.com';
        Notification::send($admin, new BookingNotification($notify_booking_admin));
    }
    public function notificationMsgtest()
    {
        return  [
            'greeting' => 'You Have a New Booking Request.',
            'subject' => 'Moray Limousine .  New Booking Request',
            'thanks_text' => 'Thanks For Choosing Moray Limousine',
            'action_text' => 'View My Site',
            'action_url' => 'https://moray-limousines.de/booking/details/187',
            'body' => [
                'booking' => 'BOOKING DETAILS',
                'Pick Date'  =>   '22-13-2018',
                'Pick Address'  => 'pindi road kohat',
                'Drop Address'  =>  'babribanda kohat',
                'Selected Class'   => 'islamabad is',
                'Travel Amount'  =>  300,
                'Net Amount'  =>    600,
                'Payment Status' =>  'pending',

            ]
        ];
    }
    public function notificationMsg($booking)
    {
        $class = VehicleCategory::find($booking['vehicle_type_id ']);
        return  [
            'greeting' => 'You Have a New Booking Request .',
            'subject' => 'Moray Limousine .  New Booking Request',
            'thanks_text' => 'Thanks For Choosing Moray Limousine',
            'action_text' => 'View My Site',
            'action_url' => '/booking/details/' . $booking->id,
            'body' => [
                'booking' => 'BOOKING DETAILS',
                'Pick Date'   =>   $booking->pick_date,
                'Pick Address'   =>   $booking->pick_address,
                'Drop Address'   =>   $booking->drop_address,
                'Selected Class'   =>  $class->name ?? '',
                'Travel Amount'   =>  $booking->travel_amount,
                'Net Amount'     =>  $booking->net_amount,
                'Payment Status'   =>  $booking->payment_status,
            ]
        ];
    }


    /**
     * @param $id
     * @return RedirectResponse
     */
    public function bookingDelete($id)
    {
        $booking = Booking::find($id);
        $booking->delete();
        return redirect()->back();
    }

    /**
     * @param $id
     * @return Factory|View
     */
    public function bookingDetailsPage($id)
    {
        $booking = Booking::find($id);
        $vehicleType = $booking->vehicleType()->first();
        $extended_booking = $booking->extended_bookings->where('payment_status', 'paid')->first();
        if ($booking->book_for_someone) {
            $enduser_billing_details = DB::table('booking_billing_address')
                ->select(DB::raw('*'))
                ->where('booking_id', $id)
                ->get();
        } else {
            $enduser_billing_details = DB::table('endusers')
                ->select(DB::raw('*'))
                ->where('user_id', $booking->user_id)
                ->get();
        }
        return view('booking.booking-details-page')->with([
            'booking' => $booking,
            'vehicle_type' => $vehicleType,
            'extended_booking' => $extended_booking,
            'enduser_billing_details' => $enduser_billing_details
        ]);
    }

    // public function bookingDetailsUser(){
    //     return view('booking.booking-details');
    // }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function assignBooking(Request $request)
    {
        $validatedData = null;
        $assignToType = $request->type;
        if ($assignToType == 'driver') {
            $request->validate([
                'booking_id' => 'required',
                'driver_id' => 'required',
                'vehicle_id' => 'required'
            ]);
            $bookingId = $request->booking_id;
            $vehicleId = $request->vehicle_id;
            $drivers = $request->driver_id; //array


            $booking = Booking::find($bookingId);
            $pickUpDate = $booking->pick_date;

            $booking->vehicle()->sync($vehicleId);

            foreach ($drivers as $driver) {
                $booking->driver()->attach($driver, ['booking_date' => $pickUpDate, 'assigned_to' => 'driver']);
                $assign_msg = array_merge($this->notify_driver_assign, ['body' => 'You are assigned a new ride which booking address is : ' . $booking->pick_address . ' See yor dashboard for more details or click the button blow.. ', 'action_url' => '/driver/dashboard']);
                $user = User::find($driver);
                $user->notify(new MorayLimousineNotifications($assign_msg));
            }
        } else if ($assignToType == 'partner') {
            $request->validate([
                'booking_id' => 'required',
                'partner_id' => 'required',
                'commission' => 'required'
            ]);

            $commission = $request->commission;
            $bookingId = $request->booking_id;
            $partnerIds = $request->partner_id;


            $booking = Booking::find($bookingId);
            $netAmount = $booking->net_amount;
            $amountTax = $this->calculateTax($netAmount);
            $amountCommission = $this->calculateCommission($netAmount, $commission);
            $netAmount = $netAmount - ($amountCommission + $amountTax);

            //            $booking->partner()->attach($partnerId);

            //            $user = User::find($partnerId);
            //            if ($user){
            //                $user->notify(new MorayLimousineNotifications($assign_msg));
            //            }

            foreach ($partnerIds as $partnerId) {

                $booking->partner()->attach($partnerId, ['commission' => $commission, 'calculated_price' => $netAmount, 'assigned_to' => 'partner']);
                $assign_msg = array_merge($this->notify_driver_assign, ['body' => 'You are assigned a new ride which booking address is : ' . $booking->pick_address . ' See yor dashboard for more details or click the button blow.. ', 'action_url' => '/partner/dashboard',]);
                $user = User::find($partnerId);
                if ($user) {
                    Notification::send($user, new MorayLimousineNotifications($assign_msg));
                }
            }
        }
        return redirect()->back();
    }

    /**
     * @param $price
     * @return float|int
     */
    private function calculateTax($price)
    {
        $tax_rate = Configuration::first()->tax_rate;
        return ($tax_rate * $price) / 100;
    }

    /**
     * @param $price
     * @param $commission
     * @return float|int
     */
    private function calculateCommission($price, $commission)
    {
        return ($price * $commission) / 100;
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function unAssignBooking($id)
    {
        $booking = Booking::find($id);
        if ($booking->driver()->exists()) {
            $booking->driver()->detach();
        }
        if ($booking->vehicle()->exists()) {
            $booking->vehicle()->detach();
        }
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function assignToForm(Request $request)
    {
        $booking = Booking::find($request->bookingId);
        $bookingCity = $booking->booking_city;
        $assignTo = $request->assignTo;
        $parameters = [];
        if ($assignTo == 1) { // 1 for driver
            $vehicleType = $booking->vehicleType()->first();
            $vehicles = $vehicleType->vehicles()->where('status', 'approved')
                ->where('creator_id', auth()->user()->id)->get();
            $drivers = auth()->user()->users->where('user_type', 'driver')->where('status', 'approved');
            $availableDrivers = [];
            foreach ($drivers as $driver) {
                if ($this->isDriverAvailable($driver->id, $booking->pick_date)) {
                    if (count($driver->locations()->where('location_city', $bookingCity)->get()) > 0) {
                        $availableDrivers[] = $driver;
                    }
                }
            }

            $availableVehicles = [];
            foreach ($vehicles as $vehicle) {
                if ($this->isVehicleAvailable($vehicle->id, $booking->pick_date)) {
                    if (count($vehicle->locations()->where('location_city', $bookingCity)->get()) > 0) {
                        $availableVehicles[] = $vehicle;
                    }
                }
            }
            $parameters['drivers'] = $availableDrivers;
            $parameters['vehicles'] = $availableVehicles;
        } else {
            $partners = User::all()->where('user_type', 'partner')->where('status', 'approved');
            $availablePartners = [];
            foreach ($partners as $partner) {
                if (count($partner->locations()->where('location_city', $bookingCity)->get()) > 0) {
                    $availablePartners[] = $partner;
                }
            }
            $parameters['partners'] = $availablePartners;
        }
        $parameters['assignTo'] = $request->assignTo;
        $parameters['booking_id'] = $request->bookingId;
        return view('admin._partials._booking-assign-to-form')->with($parameters);
    }

    /**
     * @param $driverId
     * @param $date
     * @return bool
     */
    private function isDriverAvailable($driverId, $date)
    {

        $driver = User::find($driverId);
        $bookings = $driver->booking()->where('booking_date', $date)->get();
        if (count($bookings) > 0) {
            return false;
        }
        return true;
    }

    /**
     * @param $vehicleId
     * @param $date
     * @return bool
     */
    private function isVehicleAvailable($vehicleId, $date)
    {
        $vehicle = Vehicle::find($vehicleId);
        $bookings = $vehicle->booking()->where('booking_date', $date)->get();
        if (count($bookings) > 0) {
            return false;
        }
        return true;
    }

    /**
     * @param $bookingId
     * @param $status
     * @return RedirectResponse
     */
    public function driverAction($bookingId, $status)
    {
        $driver = auth()->user();
        $booking = Booking::find($bookingId);
        $customer_email = Booking::with('user')->first();
        if (auth()->user()->user_type == 'partner' && count($booking->driver()->wherePivot('status', 'approved')->get()) > 0) {
            return redirect()->back()->with([
                'error' => 'This reservation already accepted by someone else'
            ]);
        } elseif (count($booking->driver()->wherePivot('driver_status', 'accepted')->get()) > 0) {
            return redirect()->back()->with([
                'error' => 'This reservation already accepted by someone else'
            ]);
        }
        if (auth()->user()->user_type == 'partner') {
            $driver->booking()->where('booking_id', $bookingId)
                ->updateExistingPivot($bookingId, ['status' => $status]);
            if ($status == "rejected") {
                $driver->booking()->where('booking_id', $bookingId)
                    ->wherePivot('booking_id', '=', $bookingId)->detach();
            }
        } else {
            $driver->booking()->where('booking_id', $bookingId)
                ->updateExistingPivot($bookingId, ['driver_status' => $status]);
        }
        if ($status == 'approved' || $status == 'accepted') {
            if (auth()->user()->user_type == 'partner') {
                $booking->driver()->wherePivot('status', 'pending')->detach();
            } elseif (auth()->user()->user_type == 'driver') {
                $booking->driver()->wherePivot('driver_status', 'pending')->wherePivot('assigned_to', 'driver')->detach();
            }
        }
        //driver notification and partner notification here according to user id
        $notify_driver_msg = [
            'greeting' => 'You ' . $status . ' a Booking With Booking Id = ' . $bookingId,
            'subject' => 'Booking ' . $status . ' By You',
            'body'   => 'A Booking With Booking Id ' . $bookingId . ' Assigned To You By Moray Limousines ' . $status . ' By You For Details Of booking Follow The link Given Blow Or Login And check Booking Details With Booking Id' . $bookingId,
            'thanks_text' => 'Thanks For Using Moray Limousines',
            'action_text' => 'View My Site',
            'action_url' => '/booking/details/' . $bookingId,
        ];
        $driver->notify(new MorayLimousineNotifications($notify_driver_msg));
        //admin notify when driver accepted
        if (auth()->user()->user_type == 'driver')
        {
            $notify_admins_msg = [
                'greeting' => 'A Booking With Booking Id ' . $bookingId . ' Assigned To Driver By a Partner ' . $status . ' By Driver On Moray-Limousines',
                'subject' => 'Booking ' . $status . ' By Driver',
                'body'   => 'A Booking With Booking Id ' . $bookingId . ' Assigned To Driver By a Partner ' . $status . ' By Driver For Details Of booking Follow The link Given Blow Or Login And check Booking Details With Booking Id ' . $bookingId . '
                 Driver name is ' . auth()->user()->first_name . ' ' . auth()->user()->last_name . ' having phone number is ' . auth()->user()->phone_number . ' vehicle is ' . $booking->vehicle[0]->title . ' having plate no is ' . $booking->vehicle[0]->plate,
                'thanks_text' => 'Thanks For Using Moray Limousines',
                'action_text' => 'View My Site',
                'action_url' => '/booking/details/' . $bookingId,
            ];
            Notification::send($customer_email->user, new MorayLimousineNotifications($notify_admins_msg));
        } elseif (auth()->user()->user_type == 'partner')
        {
            $notify_admins_msg = [
                'greeting' => 'A Booking With Booking Id ' . $bookingId . ' Assigned To  Partner ' . $status . ' By Partner On Moray-Limousines',
                'subject' => 'Booking ' . $status . ' By Partner',
                'body'   => 'A Booking With Booking Id ' . $bookingId . ' Assigned Partner ' . $status . ' By Partner For Details Of booking Follow The link Given Blow Or Login And check Booking Details With Booking Id' . $bookingId,
                'thanks_text' => 'Thanks For Using Moray Limousines',
                'action_text' => 'View My Site',
                'action_url' => '/booking/details/' . $bookingId,
            ];
        }
        $users = User::where('user_type', 'admin')->get();
        Notification::send($users, new MorayLimousineNotifications($notify_admins_msg));
        return redirect()->back();
    }


    /**
     * @param $id
     * @return RedirectResponse
     */


    public function completeBooking(Request $request, $id)
    {
        $booking = Booking::find($id);
        $user_id = $booking->user_id;
        $booking->booking_status = 'completed';
        $booking->pending_payment = $request->pending_payment;
        $booking->update();
        $users = user::find($user_id);
        $result = invoice::create([
            'booking_id' => $booking->id,
            'invoice_number' => 'ML- ' . mt_rand(100000, 999999)
        ]);
        $invoice_number = $result->invoice_number;
        //GENERATE PDF FILE AND SEND TO IN EMAIL
        $pdf = PDF::loadView('invoicepdf', ['booking' => $booking, 'invoice_number' => $invoice_number]);
        $path = public_path('pdf');
        $fileName =  'invoice' . $id . '.' . 'pdf';
        $pdf->save($path . '/' . $fileName);
        //send invoice using email
        $notify_admins_msg = [
            'greeting' => 'Invoice',
            'subject' => 'Booking Invoice',
            'body' => [
                'booking' => 'BOOKING DETAILS',
                'Pick Date'   =>   $booking->pick_date,
                'Pick Address'   =>   $booking->pick_address,
                'Drop Address'   =>   $booking->drop_address,
                'Selected Class'   =>   $booking->drop_address,
                'Travel Amount'   =>  $booking->travel_amount,
                'extra Amount'     =>  $booking->extra_options_amount,
                'Payment Status'   =>  $booking->payment_status,
                'invoicenumber' => $invoice_number,
                'bookingid' => $id,
                'pendingamount' => $booking->pending_payment,
                'filename' => $fileName,
            ],
            'thanks_text' => 'Thanks For Using Moray Limousines',
            'action_text' => '',
            'action_url' => '',
        ];
        Notification::send($users, new InvoiceNotifications($notify_admins_msg));
        return redirect()->back()->with('success', 'Booking Is Completed Successfully ...');
    }

    public function allBookings()
    {
        $data['bookings'] = Booking::all();
        return view('parshall-views._booking-list-table', $data);
    }

    public function payOutBookings()
    {
        $data['bookings'] = Booking::where('payment_status', 'paid')
            ->where('partner_payment_status', true)->get();
        return view('parshall-views._booking-list-table', $data);
    }


    /**
     * @param Request $request
     * @return Factory|View
     */
    public function searchBookingByDate(Request $request)
    {
        $data['bookings'] = $this->booking
            ->where('pick_date', '>=',  $request['from_date'])
            ->where('pick_date', '<=', $request['to_date'])->get();
        return view('parshall-views._booking-list-table', $data);
    }

    /**
     * @return Factory|View
     */
    public function pendingBookings()
    {
        // $data['bookings'] = Booking::where(['booking_status'=>'pending'])->get();
        $data['bookings'] = Booking::with('checkdriverassign')->where(['booking_status'=>'approved','payment_status'=>'paid'])->get();

        return view('parshall-views._booking-list-table', $data);
    }
    public function newBookings()
    {
        $data['bookings'] = Booking::with('checkdriverassign')->where(['booking_status'=>'new'])->get();

        return view('parshall-views._booking-list-table', $data);
    }
    public function canceledBookings()
    {
        $data['bookings'] = Booking::where('booking_status', 'canceled')
            ->where('payment_status', 'paid')->get();
        return view('parshall-views._booking-list-table', $data);
    }

    /**
     * @return Factory|View
     */
    public function completedBookings()
    {
        $data['bookings'] = Booking::where('booking_status', 'completed')->where('payment_status', 'paid')->get();
        return view('parshall-views._booking-list-table', $data);
    }

    /** Paid Booking List
     *
     * @return Factory|View
     */

    public function paidBookings()
    {
        $data['bookings'] = Booking::where('payment_status', 'paid')->get();
        return view('parshall-views._booking-list-table', $data);
    }

    public function approvedBookings()
    {
        $data['bookings'] = Booking::where('booking_status', 'approved')->get();
        return view('parshall-views._booking-list-table', $data);
    }

    /** Search Booking By id
     * @param $id
     * @return Factory|View
     */
    public function searchedIdBooking($id)
    {
        $data['bookings'] = $this->booking->where('id', $id)->get();
        return view('parshall-views._booking-list-table', $data);
    }


    /**
     * @param $duration_In_Sec
     * @return float|int
     * Convert Time in Second In Mins
     */
    public function durationInHour($duration_In_Sec)
    {
        $minutes = floor($duration_In_Sec / 60);
        return $minutes / 60;
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function selectedClass($id)
    {
        $category =  $this->classes->find($id);
        return response()->json($category);
    }

    /**
     * This function return View for Select Extra
     * Options against a Vehicle Class
     * @param $id
     * @return Factory|View
     */
    public function selectOptions($id)
    {
        $category =  $this->classes->find($id);
        $data['options'] = $category->options()->get();
        $data['selected_category'] = $category;
        return view('parshall-views._select-options', $data);
        //        return view('booking.select-options',$data);
    }

    /**For check allowed cities by admin
     *
     * @return JsonResponse
     */
    public function getAllowedCities()
    {
        $locations = Location::all();
        return response()->json($locations);
    }
    public function getLocationHours(Request $request)
    {
        $country=$request->country;

        //check if country wise is hours is exist or not
        $countryresult=BookingHour::where('country',$country)->first();
        if($countryresult)
        {
            $hours=$countryresult->hours;
             return response()->json($hours);
        }
        $cityresult=BookingHour::where('city',$request->pick_city)->first();
        if($cityresult)
        {
            $hours=$cityresult->hours;
            return response()->json($hours);
        }
        $config = Configuration::first();
        if($config)
        {
            $hours=$config->master_hour;
             return response()->json($hours);
        }


    }

    /**
     * @param $dist
     * @return float|int
     */

    // public function calculateDistance($dist)
    // {
    //     $dist = $dist / 1000;
    //     if ($dist < 10 && $dist > 5) {
    //         $dist = $dist - 3;
    //     } elseif ($dist > 10 && $dist < 20) {
    //         $dist = $dist - 4;
    //     } elseif ($dist > 20 && $dist < 30) {
    //         $dist = $dist - 5;
    //     } elseif ($dist > 30 && $dist < 40) {
    //         $dist = $dist - 6;
    //     } elseif ($dist > 40 && $dist < 80) {
    //         $dist = $dist - 7;
    //     } elseif ($dist > 80 && $dist < 150) {
    //          $dist = $dist - 8;
    //     } elseif ($dist > 150) {
    //         $dist = $dist - 8;
    //     }
    //     return $dist;
    // }













    protected $notify_booking_user = [
        'greeting' => 'Your request is submitted successfully',
        'subject' => 'Welcome To Moray Limousines',
        'thanks_text' => 'Thanks For Choosing Moray Limousine',
        'action_text' => 'View My Site',
        'action_url' => '/home',

    ];
    /**
     * @var array
     */
    public $notify_driver_assign = [
        'greeting' => 'New Booking Is Assigned',
        'subject' => 'New Ride Is Assigned To You',
        'thanks_text' => 'Thanks For Using Moray Limousine',
        'action_text' => 'View My Site',
    ];

    /**
     * @var array
     */
    public $approve_booking_msg = [
        'greeting' => 'Your Booking Request is approved by Moray Limousine',
        'subject' => 'Booking Request is approved by Moray Limousine',
        'thanks_text' => 'Thanks For Using Moray Limousine',
        'action_text' => 'View My Site',
        'action_url' => '/home',
    ];

    public $approve_booking_msg_admin = [
        'greeting' => 'Your Booking Confirm is approved by Moray Limousine',
        'subject' => 'Booking Confirm is approved by Moray Limousine',
        'thanks_text' => 'Thanks For Using Moray Limousine',
        'action_text' => 'View My Site',
        'action_url' => '/home',
    ];
    /**
     * @var array
     */
    protected $disapprove_booking_msg = [
        'greeting' => 'Your Booking Request is  not approved by Moray Limousine',
        'subject' => 'Booking Request Disapproved',
        'thanks_text' => 'Thanks For Using Moray Limousine',
        'action_text' => 'View My Site',
        'action_url' => '/home',
    ];
}
