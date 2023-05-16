<?php

namespace App\Http\Controllers\Admin;


use App\Models\Configuration;
use App\Models\Discount;
use App\Models\ExtraOptions;
use App\Models\HappyClient;
use App\Models\Driver;
use App\Model\Partner;
use App\Notifications\MorayLimousineNotifications;
use App\Models\Tax;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\VehicleCategory;
use http\Env\Response;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Contactus;
use App\Models\Booking;
use PHPUnit\Framework\Constraint\Count;
use DB;
use Carbon\Carbon;
use Faker\Provider\DateTime;

class AdminController extends Controller
{
    private $client;
    private $booking;
    public function __construct(HappyClient $client, Booking $booking)
    {
        $this->client = $client;
        $this->booking = $booking;
    }


    public function login()
    {
        return view('driver.login');
    }


    /**
     * Admin Index Page
     * @return Factory|\Illuminate\View\View
     */
    public function index()
    {
        $bookings = $this->booking->where('payment_status', 'paid')
            ->orderBy('created_at', 'desc')->get();
        $pending_bookings  = $this->booking->where('payment_status', 'paid')->where('booking_status', 'pending')->get();
        $complete_bookings = Booking::where('booking_status', 'completed')->get();
        $pending_bookings = count($pending_bookings);
        $complete_bookings = count($complete_bookings);
        $data['bookings'] = $bookings;
        $data['pending_count'] = $pending_bookings;
        $data['completed_count'] = $complete_bookings;
        return view('admin.admin-index', $data);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
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
        return redirect(route('admin.index'));
    }

    /**
     * Manage Bookings page
     * @return Factory|\Illuminate\View\View
     */
    public function manageBookings()
    {

        $bookings = Booking::with('adminassign','vehicle')->where('payment_status', 'paid')
            ->orderBy('created_at', 'desc')->get();
        $vehicles=Vehicle::get();
        // dd('abc');
        $drivers=User::where('user_type','driver')->get();
        $pending_bookings  = Booking::with('adminassign','vehicle')->where('booking_status', 'pending')->get();
        $complete_bookings = Booking::where('booking_status', 'completed')->get();
        $pending_bookings = count($pending_bookings);
        $complete_bookings = count($complete_bookings);
        $data['pending_count'] = $pending_bookings;
        $data['bookings'] = $bookings;
        $data['completed_count'] = $complete_bookings;
        $data['vehicles']= $vehicles;
        $data['drivers']=$drivers;
        return view('admin.booking.manage-bookings', $data);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function registerDriver(Request $request)
    {
        $failMsg = 'Fail To add Driver. !  Please Try Another Email ..';
        $validator =  validator($request->all(), $this->validationRules);
        if ($validator->fails()) {
            return response()->json($failMsg);
        }
        $user = new User();
        $user = $user->registerDriver($request->all());
        $successMessage = 'Success !   Driver Created Successfully';
        $registered_msg = array_merge($this->register_driver_msg, ['body' => 'You  Registered On Moray Limousine by Admin . Please Check your account By using password : " ' . $request['password'] . ' "  ! Enjoy With Us.  ']);
        $user->notify(new MorayLimousineNotifications($registered_msg));
        return response()->json($successMessage);
    }
    /**
     * @param $id
     * @return Factory|\Illuminate\View\View
     * Driver Details View
     */
    public function driverDetails($id)
    {
        $data['user'] = User::find($id);
        $data['documents'] = $data['user']->uploadedDocuments;
        return view('admin.drivers-tasks.driver-details', $data);
    }

    /**
     * @param Request $request
     * @return Factory|\Illuminate\View\View
     * Approve Driver
     */
    public function changeStatus(Request $request)
    {
        $id = $request->id;
        $user =  User::find($id);
        $user->status = 'approved';
        $user->save();
        $approve_msg = array_merge($this->approve_driver_msg, ['body' => 'Your Account is Registered On Moray Limousines is Approved by Admin . ! Enjoy With Us.  ']);
        $user->notify(new MorayLimousineNotifications($approve_msg));
        $drivers = User::where('user_type', 'driver')->orderBy('id', 'desc')->get();
        $data['drivers'] = $drivers;
        return view('parshall-views._driver-list-table', $data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeTax(Request $request)
    {
        $tax = Tax::first();
        $tax->tax = $request->tax;
        $tax->save();
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return Factory|\Illuminate\View\View
     */
    public function disapproveStatus(Request $request)
    {
        $id = $request->id;
        $user =  User::find($id);
        $user->status = 'disapproved';
        $user->save();
        $disapprove_msg = array_merge($this->disapprove_driver_msg, ['body' => 'Your Account is Registered On Moray Limousines is Not Approved by Admin . ! ']);
        $user->notify(new MorayLimousineNotifications($disapprove_msg));

        $drivers = User::where('user_type', 'driver')->orderBy('id', 'desc')->get();
        $data['drivers'] = $drivers;
        return view('parshall-views._driver-list-table', $data);
    }

    /**
     * @param Request $request
     * @return Factory|\Illuminate\View\View
     */
    public function blockStatus(Request $request)
    {
        $id = $request->id;
        $user =  User::find($id);
        $user->status = 'blocked';
        $user->save();
        $approve_msg = array_merge($this->block_driver_msg, ['body' => 'Your Account Is Blocked By Admin On Moray Limousine']);
        $user->notify(new MorayLimousineNotifications($approve_msg));

        $drivers = User::where('user_type', 'driver')->orderBy('id', 'desc')->get();
        $data['drivers'] = $drivers;
        return view('parshall-views._driver-list-table', $data);
    }

    /** List of all Drivers
     * @return Factory|\Illuminate\View\View
     */
    public function menageDrivers()
    {
        $drivers = User::where('user_type', 'driver')->orderBy('id', 'desc')->get();
        return view('admin.drivers-tasks.driver-list')->with('drivers', $drivers);
    }

    /** Return a parshall view
     * @return Factory|\Illuminate\View\View
     */
    public function allDriverList()
    {
        $drivers = User::where('user_type', 'driver')->orderBy('id', 'desc')->get();
        $data['drivers'] = $drivers;
        return view('parshall-views._driver-list-table', $data);
    }

    /**
     * @return Factory|\Illuminate\View\View
     */
    public function adminDrivers()
    {
        $id = Auth()->id();
        $drivers = User::where('creator_id', $id)
            ->where('user_type', 'driver')
            ->orderBy('id', 'desc')->get();
        $data['drivers'] = $drivers;
        return view('parshall-views._driver-list-table', $data);
    }

    /** Driver not registered by the admin
     * @return Factory|\Illuminate\View\View
     */
    public function registeredDrivers()
    {
        $drivers = User::where('user_type', 'driver')->get();
        $data['drivers'] = $drivers;
        return view('parshall-views._driver-list-table', $data);
    }

    /**
     * @return Factory|\Illuminate\View\View
     */
    public function partnersList()
    {
        $partners = User::where('user_type', 'partner')->get();
        return view('admin.partner-tasks.partners-list')->with(['partners' => $partners]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * Register Partner by the Admin
     */
    public function registerPartner(Request $request)
    {
        // dd($request->all());
        $request->validate($this->validationRules);
        $user = new User();
        $partner = $user->registerDriver($request->all());
        $message = 'Success !   Partner Created Successfully';
        $registered_msg = array_merge($this->register_driver_msg, ['body' => 'You are Registered On Moray Limousines by Admin As a Partner. Please Check your account By using password : " ' . $request['password'] . ' "  ! Enjoy With Us.  ']);
        $partner->notify(new MorayLimousineNotifications($registered_msg));
        return redirect(route('partners.list'))->with('success', $message);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deletePartner($id)
    {
        $partner = User::find($id);
        $user = $partner->delete();
        if ($user) {
            $message = 'Success !   Partner Has Been Deleted Successfully';
            return redirect(route('partners.list'))->with('success', $message);
        } else {
            $message = 'Error !   There is a Error While Deleting This User';
            return redirect(route('partners.list'))->with('error', $message);
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * Approve Partner Status
     */
    public function approvePartner($id)
    {
        $partner = User::find($id);
        $partner->status = 'approved';
        $partner->save();

        $approve_msg = array_merge($this->approve_driver_msg, ['body' => 'Your Account is Registered On Moray Limousines as Partner is  Approved by Admin . ! Enjoy With Us ']);
        $partner->notify(new MorayLimousineNotifications($approve_msg));

        $message = 'Success !   Partner Has Approved  Successfully';
        return redirect(route('partners.list'))->with('success', $message);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function disapprovePartner($id)
    {
        $partner = User::find($id);
        $partner->status = 'disapproved';
        $partner->save();

        $disapprove_msg = array_merge($this->disapprove_driver_msg, ['body' => 'Your Account is Registered On Moray Limousines as Partner is Not Approved by Admin . ! ']);
        $partner->notify(new MorayLimousineNotifications($disapprove_msg));

        $message = 'Success ... !   Partner Is Disapproved Successfully';
        return redirect(route('partners.list'))->with('success', $message);
    }
    public function blockPartner($id)
    {
        $partner = User::find($id);
        $partner->status = 'blocked';
        $partner->save();
        $message = 'Success ... !    Partner Is Blocked Successfully';
        $approve_msg = array_merge($this->block_driver_msg, ['body' => 'Your Account Is Blocked By Admin On Moray Limousine']);
        $partner->notify(new MorayLimousineNotifications($approve_msg));
        return redirect(route('partners.list'))->with('success', $message);
    }



    /**
     * @return Factory|\Illuminate\View\View
     */
    public function addOptions()
    {
        $data['categories'] = VehicleCategory::all();
        $data['options'] = ExtraOptions::all();
        return view('admin.extra-options.add-extra-options', $data);
    }

    /**
     * Admin create Extra Options
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveOption(Request $request)
    {
        $categories = $request['categories'];
        $fromData = $request->except('$categories');
        $optionImg = null;
        $id = null;
        $id = $request->id;
        if ($request->hasFile('image_name')) {
            $optionImg = time() . $request->image_name->getClientOriginalName();
            $request->image_name->move(public_path('files/options-images'), $optionImg);
        }
        if ($id == null) {
            if (isset($optionImg)) {
                $fromData['image_name'] = $optionImg;
            }
            $option = ExtraOptions::create($fromData);
            //add categories in option
            foreach ($categories as $category) {
                $option->categories()->attach((int)$category);
            }
        } else {
            $fromData = $request->except('_token', 'categories');

            if (isset($optionImg)) {
                $fromData['image_name'] = $optionImg;
            }
            ExtraOptions::where('id', $id)->update($fromData);
            $options = ExtraOptions::find($id);
            $options->categories()->detach();
            foreach ($categories as $category) {
                $options->categories()->attach((int)$category);
            }
        }
        return redirect()->route('add.extra.options');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function optionUpdate($id)
    {
        $option =  ExtraOptions::find($id);
        $data['option'] = $option;
        $data['categories'] = $option->categories;
        return response()->json($data);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function optionDetails($id)
    {
        $option =  ExtraOptions::find($id);
        $categories = $option->categories;
        $data = ['option' => $option, 'categories' => $categories];
        return response()->json($data);
    }


    /**Delete Extra Option
     * @param $id
     * @return Factory|\Illuminate\View\View
     */
    public function optionDelete($id)
    {
        $option = ExtraOptions::where('id', $id)->delete();
        $data['categories'] = VehicleCategory::all();
        $data['options'] = ExtraOptions::all();
        return view('admin.extra-options.add-extra-options', $data);
    }



    /**
     * @return Factory|\Illuminate\View\View
     */
    public function manageDiscounts()
    {
        $data['categories'] = VehicleCategory::all();
        $data['discounts'] = Discount::all();
        return view('admin.discounts.add-discount', $data);
    }

    public function manageCityPricing()
    {
         $data['country'] = DB::table('country')->get();
        //  $data['city']=DB::table('city_wise_pricing')->get();
        $data['city']= null;
         $data['categories'] = VehicleCategory::all();
         return view('admin.city-wise-pricing.index',$data);
    }

     public function timeFormat($time){
        $stripped = str_replace(' ', '', $time);;
        $dateTime = new Carbon($stripped);
        $s=$dateTime->parse($dateTime);
        $military_time =$s->format('G:i:s');
        return $military_time;
    }

    public function saveCityPricing(Request $request)
    {
        //dd($request->all());
        if(!$request->country && !$request->location_city)
        {
            return redirect('admin/manage-city-pricing')->with('error','Error .. !  Please Select City or country.');
        }
        elseif($request->country && $request->location_city)
        {
            return redirect('admin/manage-city-pricing')->with('error','Error .. !  Please Select only City or country.');
        }
        $start_time = $this->timeFormat($request->start_time);
        $end_time = $this->timeFormat($request->end_time);
        $edit_id = $request->edit_id;
        if ($edit_id == null){
            if($request->country)
            {
                 $countryexist=DB::table('city_wise_pricing')->where('country',$request->country)->first();
                 if($countryexist)
                 {
                     return redirect('admin/manage-city-pricing')->with('error','Error .. !  Record Already Exist.');
                 }
            }

            if($request->location_city)
            {
                $cityexist=DB::table('city_wise_pricing')->where('city',$request->location_city)->first();
                 if($cityexist)
                 {
                     return redirect('admin/manage-city-pricing')->with('error','Error .. !  Record Already Exist.');
                 }
            }
            DB::table('city_wise_pricing')->insert(
                 array(
                        'city'   =>   $request->location_city,
                        'country'=>   $request->country ?? NULL,
                        'type'   =>   $request->type,
                        'price'  =>   $request->price,
                        'category'=>  $request->category,
                        'start_date'=>$request->start_date,
                        'end_date'=>$request->end_date,
                        'start_time'=>$start_time,
                        'end_time'=>$end_time,
                 )
            );
        }
        else{
            DB::table('city_wise_pricing')->where('id',$edit_id)->update(
                 array(
                        'city'   =>   $request->location_city,
                        'country'=>   $request->country ?? NULL,
                        'type'   =>   $request->type,
                        'price'  =>   $request->price,
                        'category'=>  $request->category,
                        'start_date'=>$request->start_date,
                        'end_date'=>$request->end_date,
                        'start_time'=>$start_time,
                        'end_time'=>$end_time,
                 )
            );
        }
         return redirect('admin/manage-city-pricing')->with('success','Success .. !  Record save Successfully .');

    }
    public function editCityPricing($id)
    {
        $result=DB::table('city_wise_pricing')->where('id',$id)->first();
         return response()->json($result);
    }
    public function deleteCityPrice($id)
    {
        DB::table('city_wise_pricing')->where('id',$id)->delete();
        return redirect('admin/manage-city-pricing')->with('success','Success .. !  Record Deleted Successfully .');
    }

    public function cityPriceDisActive($id)
    {
         $result = DB::table('city_wise_pricing')->where('id',$id)->update([
            'status'=>'dis_active',
         ]);

        if ($result){

            return redirect('admin/manage-city-pricing')->with('success','Success ! Status  DeActivated Successfully');
        }else{
            return redirect('admin/manage-city-pricing')->with('error','Error ! No Record Found ..');
        }
    }

    public function cityPriceActive($id)
    {
         $result = DB::table('city_wise_pricing')->where('id',$id)->update([
            'status'=>'active',
         ]);

        if ($result){

            return redirect('admin/manage-city-pricing')->with('success','Success ! Status  Activated Successfully');
        }else{
            return redirect('admin/manage-city-pricing')->with('error','Error ! No Record Found ..');
        }
    }

    /**
     * @return Factory|\Illuminate\View\View
     */
    public function inquiries()
    {
        $data['inquiries'] = Contactus::all();
        return view('admin.inquiries.list', $data);
    }


    /**
     * @return Factory|\Illuminate\View\View
     */
    public function changePasswordForm()
    {
        return view('admin.change-password');
    }


    /**
     * @param $id
     * @return Factory|\Illuminate\View\View
     */
    public function vehicleDetails($id)
    {
        $vehicle = Vehicle::find($id);
        $data['vehicle'] = $vehicle;
        $data['vehicle_category'] = $vehicle->VehicleCategory()->first();
        $data['vehicle_locations'] = $vehicle->locations;
        $data['vehicle_documents'] = $vehicle->documents;
        return view('admin.vehicle.admin-vehicle-details', $data);
    }

    /**
     * @return Factory|\Illuminate\View\View
     */
    public function adminNotifications()
    {
        $notifications = auth()->user()->notifications()->where('read_at', '!=', null)->orderBy('id', 'desc')->get();
        return view('admin.admin-notifications')->with('notifications', $notifications);
    }


    /**
     * @return Factory|\Illuminate\View\View
     */
    public function configuration()
    {
        $config = Configuration::first();
        return view('admin.configuration')->with('config', $config);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveConfiguration(Request $request)
    {
        $config = Configuration::first();
        $form_data = $request->except('_token');
        if ($request->hasFile('service_list_img')) {
            $service_list_img = time() . $request->service_list_img->getClientOriginalName();
            $request->service_list_img->move(public_path('files/pages-images'), $service_list_img);
            $form_data['service_list_img'] = $service_list_img;
        }
        if ($request->hasFile('service_detail_img')) {
            $service_detail_img = time() . $request->service_detail_img->getClientOriginalName();
            $request->service_detail_img->move(public_path('files/pages-images'), $service_detail_img);
            $form_data['service_detail_img'] = $service_detail_img;
        }

        $config->update($form_data);
        return redirect()->back()->with('success', 'Success .. !  Configuration Saved Successfully...');
    }

    /**
     * @return Factory|\Illuminate\View\View
     */
    public function happyClients()
    {
        $clint_images = $this->client->all();
        return view('admin.pages-cms.happy-client')->with('client_images', $clint_images);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createClient(Request $request)
    {
        $client_img = null;
        if ($request->hasFile('client_image')) {
            $client_img = time() . $request->client_image->getClientOriginalName();
            $request->client_image->move(public_path('files/clients-images'), $client_img);
        }
        $form_data = $request->all();
        $form_data['client_image'] = $client_img;
        if ($request['edit_id'] == null) {
            $form_data = $request->all();
            $form_data['client_image'] = $client_img;
            $this->client->createClient($form_data);
        } else {
            $form_data = $request->except('_token', 'edit_id');
            if (isset($client_img)) {
                $form_data['client_image'] = $client_img;
            } else {
                $form_data = $request->except('_token', 'edit_id', 'client_image');
            }

            $this->client->updateClient($form_data, $request['edit_id']);
        }
        return redirect()->back()->with('success', 'Clint Image saved Successfully');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteClient($id)
    {
        $clint = HappyClient::find($id);
        $clint->delete();
        return redirect()->back()->with('success', 'Clint Image Deleted Successfully');
    }

    /**
     * @param $id
     * @return Factory|\Illuminate\View\View
     */
    public function inquiryDetail($id)
    {
        $inquiry = Contactus::find($id);
        return view('admin.inquiries.inquiry-details')->with('inquiry', $inquiry);
    }

    public function inquiryDelete($id)
    {
        $inquiry = Contactus::find($id);
        $inquiry->delete();
        return redirect()->back();
    }



    public function sendEmailToUser(Request $request)
    {
        $user = User::find($request['user_id']);
        $msg = [
            'greeting' => 'You Have a New Notification Moray Limousine',
            'subject' => 'New Notification Form Moray Limousines',
            'body' => $request['msg_body'],
            'thanks_text' => 'Thanks For Using Moray Limousine',
            'action_text' => 'View My Site',
            'action_url' => '/partner/profile',
        ];
        $user->notify(new MorayLimousineNotifications($msg));
        return redirect()->back()->with('success', 'Your Message Is Send Successfully ...');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function notifyDriver(Request $request)
    {
        $user = User::find($request['user_id']);
        $msg = [
            'greeting' => 'You Have a New Notification Moray Limousine',
            'subject' => 'New Notification Form Moray Limousines',
            'body' => $request['msg_body'],
            'thanks_text' => 'Thanks For Using Moray Limousine',
            'action_text' => 'View My Site',
            'action_url' => '/partner/profile',
        ];
        $user->notify(new MorayLimousineNotifications($msg));
        return redirect()->back()->with('success', 'Your Message Sent Successfully ...');
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function payOut($id)
    {
        $booking = $this->booking->find($id);
        $booking->partner_payment_status = true;
        $booking->update();
        return redirect()->back()->with('success', 'Booking PayOut Successfully ... ');
    }


    //partner req action
    public function partner_req()
    {
        $cities = DB::table('locations')->get();
        $city_req = DB::table('locations')
            ->select('operate_city_requirements.id', 'operate_city_requirements.city_id', 'locations.location_city', 'operate_city_requirements.requirements', 'operate_city_requirements.documents', 'operate_city_requirements.doc_heading', 'operate_city_requirements.main_heading')
            ->join('operate_city_requirements', 'operate_city_requirements.city_id', '=', 'locations.id')->get();
        return view('admin.partner-req.index', compact('city_req', 'cities'));
    }
    //update req
    public function partner_req_update(Request $request)
    {

        DB::table('operate_city_requirements')->where('id', $request->id)->update(['city_id' => $request->city_id, 'main_heading' => $request->main_heading, 'requirements' => $request->requirements, 'doc_heading' => $request->doc_heading, 'documents' => $request->documents]);
        return redirect('/partner-registration-req')->with('success', 'Requiremtns against city Updated Successfully!! ...');
    }
    //save partner req
    public function partner_req_save(Request $request)
    {
       foreach($request->city_id as $city_id){
            DB::table('operate_city_requirements')->insert(['city_id' => $city_id, 'main_heading' => $request->main_heading, 'requirements' => $request->requirements, 'doc_heading' => $request->doc_heading, 'documents' => $request->documents]);
        }
        return redirect('/partner-registration-req')->with('success', 'Requirements against city added Successfully.');
    }
    //delete partner req
    public function partner_req_delete(Request $request)
    {
        DB::table('operate_city_requirements')->where('id', $request->id)->delete();
        return redirect('/partner-registration-req')->with('success', 'Requiremtns against city Deleted Successfully!! ...');
    }

    //    Notification Email Messages
    private $approve_booking_msg = [
        'greeting' => 'Your Booking Request is approved by Moray Limousine',
        'subject' => 'Booking Request is approved by Moray Limousine',
        'thanks_text' => 'Thanks For Using Moray Limousine',
        'action_text' => 'View My Site',
        'action_url' => '/home',
    ];
    private $register_driver_msg = [
        'greeting' => 'Your Account is Registered on Moray Limousine By Using This Email Address',
        'subject' => 'Account Registered',
        'thanks_text' => 'Thanks For Using Moray Limousine',
        'action_text' => 'View My Site',
        'action_url' => '/home',
    ];
    private $block_driver_msg = [
        'greeting' => 'Your Account has been Blocked on Moray Limousine',
        'subject' => 'Account Blocked',
        'thanks_text' => 'Thanks For Using Moray Limousine',
        'action_text' => 'View My Site',
        'action_url' => '/home',
    ];
    private $approve_driver_msg = [
        'greeting' => 'Your Account has been Approved by Moray Limousine.',
        'subject' => 'Account Approved',
        'thanks_text' => 'Thanks For Using Moray Limousine',
        'action_text' => 'View My Site',
        'action_url' => '/driver/dashboard',
    ];
    private $disapprove_driver_msg = [
        'greeting' => 'Your Account has Not been Approved by Moray Limousine',
        'subject' => 'Account Disapproved',
        'thanks_text' => 'Thanks For Using Moray Limousine',
        'action_text' => 'View My Site',
        'action_url' => '/home',
    ];
    protected $validationRules =   [
        'first_name' => 'required|string|max:50',
        'last_name' => 'required|string|max:50',
        'email' => 'required|string|email|max:255|unique:users',
        'phone_number' => 'required|max:25',
        'password' => 'required|string|min:6|confirmed',
        'user_type' => 'required|string|max:15',
    ];



    // Legal form of company


    //req action
    public function legal_req()
    {


        $cities = DB::table('locations')->get();
        $legal_form_data = DB::table('locations')
            ->select('legal.id', 'legal.city_id', 'legal.legal_form', 'locations.location_city')
            ->join('legal_form_of_company as legal', 'legal.city_id', '=', 'locations.id')->get();
        return view('admin.legal-form-of-company.index', compact('legal_form_data', 'cities'));
    }


    //save partner req
    public function legal_req_save(Request $request)
    {
        // dd($request->all());
        $legal_form = $request->legal_form;
        foreach ($request->city_id as $city_id) {
            foreach ($legal_form as $data) {
                 DB::table('legal_form_of_company')->insert(['city_id' => $city_id, 'legal_form' => $data]);
             }
         }

        return redirect('/legal-form-of-company')->with('success', 'Legal form against city added Successfully!! ...');
    }


    //update req
    public function legal_req_update(Request $request)
    {
        DB::table('legal_form_of_company')->where('id', $request->id)->update(['city_id' => $request->city_id, 'legal_form' => $request->legal_form]);
        return redirect('/legal-form-of-company')->with('success', 'Legal form against city Updated Successfully!! ...');
    }

    //delete partner req
    public function legal_req_delete(Request $request)
    {
        DB::table('legal_form_of_company')->where('id', $request->id)->delete();
        return redirect('/legal-form-of-company')->with('success', 'Legal form against city Deleted Successfully!! ...');
    }
}
