<?php

namespace App\Http\Controllers;

use App\Models\ExtendBooking;
use App\Models\Enduser;
use App\Notifications\BookingNotification;
use App\Notifications\MorayLimousineNotifications;
use App\Rules\MatchOldPassword;
use App\Models\User;
use App\Models\UsersMedia;
use Carbon\Carbon;
use App\Models\Booking;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\View\View;
use App\Models\Configuration;

class UserController extends Controller
{
    private $home_user;
    private $booking;
    private $user;
    public function __construct(Enduser $user, \App\Models\Booking $booking, User $home_user)
    {
        $this->booking = $booking;
        $this->user = $user;
        $this->home_user = $home_user;
    }

    /**
     * @var array
     */
    public $notify_cancel_booking_admin = [
        'greeting' => 'Booking Request Is cancelled by user',
        'subject' => 'Cancelled Booing By user',
        'thanks_text' => '',
        'action_text' => 'View My Site',
        'action_url' => '/admin/index',

    ];
    /**
     * @var array
     */
    public $notify_cancel_booking_user = [
        'greeting' => 'Booking Cancelled',
        'subject' => 'Booking Request Cancelled',
        'thanks_text' => 'Thanks For being Hathaway Limousine',
        'action_text' => 'View My Site',
        'action_url' => '/admin/index',

    ];
    /**
     * @var array
     */
    public $userRules = [
        'user_id' => 'required',
    ];

    /** Return build profile form
     * @return Factory|\Illuminate\View\View
     */
    public function buildProfile()
    {
        return view('end-user.build-user-profile');
    }

    /** Create and update Profile Function
     *
     * @param Request $request
     * @return string
     */
    public function storeProfile(Request $request)
    {
        $id = null;
        $id = $request->id;
        $imageName = null;
        $images = new UsersMedia();
        if ($request->hasFile('image_name')) {
            $imageName = time() . $request->image_name->getClientOriginalName();
            $request->image_name->move(public_path('uploaded-user-images/endusers-images'), $imageName);
        }
        if ($id == null) {
            $this->validate($request, $this->userRules);
            $formdata = $request->except('image_name');
            $this->user->createUser($formdata);
            if (isset($imageName)) {
                $images->saveUserImage($imageName, Auth()->user()->id);
            }
        } else {

            $formdata = $request->except(['_token', 'image_name']);
            $this->validate($request, $this->userRules);
            $this->user->updateUserProfile($formdata, $id);

            if (isset($imageName)) {
                if (isset(Auth()->user()->userMedia()->first()->image_name)) {
                    $images->updateUserImage($imageName, Auth()->user()->id);
                } else {
                    $images->saveUserImage($imageName, Auth()->user()->id);
                }
            }
        }
        return redirect()->route('user.profile');
    }


    /** return update user profile form
     * @param $id
     * @return Factory|\Illuminate\View\View
     */
    public function updateProfile($id)
    {
        return view('end-user.build-user-profile');
    }


    /**
     * @return Factory|\Illuminate\View\View
     */
    public function userDashboard()
    {
        $user = auth()->user();
        $data['bookings']  =  $user->bookings->where('payment_status', 'paid');
        $data['pending_bookings'] =  $user->bookings->where('payment_status', 'paid')->where('booking_status', 'pending');
        $data['canceled_bookings'] =  $user->bookings->where('payment_status', 'paid')->where('booking_status', 'canceled');
        $data['completed_bookings'] =  $user->bookings->where('payment_status', 'paid')->where('booking_status', 'completed');
        return view('end-user.user-dashboard', $data);
    }

    /**
     * @return Factory|\Illuminate\View\View
     */
    public function userProfile()
    {
        return view('end-user.user-profile');
    }



    /** User Booking Details
     * @return Factory|\Illuminate\View\View
     */
    public function userReservation()
    {
        //$bookings =  auth()->user()->bookings->where('payment_status','paid');

        $bookings = auth()->user()->bookings->where('user_id', auth()->user()->id);
        return view('end-user.user-bookings')->with('bookings', $bookings);
    }


    /**Cancel Booking By user
     *
     * @param $id
     * @return RedirectResponse
     */
    public function cancelBooking($id)
    {
        //  Make Sure Booking Belongs  To This User
        $booking = auth()->user()->bookings->find($id);
        if ($this->checkDataAndTime($booking['pick_time'], $booking['pick_date'], 2)) {
            $booking->booking_status = 'canceled';
            $booking->save();

            //Send Notification
            $cancel_booking_msg = array_merge($this->notify_cancel_booking_user, ['body' => 'You Cancelled Your Booking Request On Hathaway Limousine Which Pick Address Is   ' .
                $booking['pick_address'] .  ' And Pick Time Was  ' . $booking['pick_time']]);
            auth()->user()->notify(new MorayLimousineNotifications($cancel_booking_msg));
            return redirect()->back()->with('success', 'booking is cancelled Successfully ..');
        }
        return redirect()->back()->with('error', 'Booking Can Be Cancelled Only Two Hour Before The Pick Time ..');
    }

    /**
     * @param $id
     * @return Factory|\Illuminate\View\View
     */
    public function PartnerDetails($id)
    {
        $user = $this->home_user->findPartner($id);
        $data['user'] = $user;
        $data['documents'] = $user->uploadedDocuments;
        $data['locations'] = $user->locations;
        $data['accounts'] = $user->partner;
        return view('admin.partner-tasks.partner-details', $data);
    }

    /**
     * @param $id
     * @return Factory|RedirectResponse|View
     */
    public function extendBooking($id)
    {
        $booking = auth()->user()->bookings->find($id);
        $data['booking'] = $booking;
        if ($this->checkDataAndTime($booking['pick_time'], $booking['pick_date'], 2)) {
            if ($data['booking'] != null or isset($data['booking'])) {
                return view('end-user.extend-booking', $data);
            } else {
                return redirect()->back()->with('error', 'Error.. !  No Booking Found');
            }
        }
        return redirect()->back()->with('error', 'Booking Can Not Be Extended Now..');
    }

    /**
     * @param $id
     * @return Factory|RedirectResponse|View
     */
    public function bookingDetail($id)
    {
        $tax_rate = 0.0;
        if (!empty(Configuration::first()->tax_rate)) {
            $tax_rate = Configuration::first()->tax_rate;
        }
        $data['booking'] = auth()->user()->bookings()->find($id);
        $data['extended_booking'] = $data['booking']->extended_bookings->where('payment_status', 'paid')->first();
        if ($data['booking'] != null or isset($data['booking'])) {
            $data['taxrate'] = $tax_rate;
            
            return view('end-user.booking-details', $data);
        } else {
            return redirect()->back()->with('error', 'Error.. !  No Booking Found');
        }
    }

    public function bookingConfirm($id)
    {
            $notify_booking_user =array_merge($this->confirm_booking_msg,['body' => 'Hello  !  booking with booking '.$id.' is confirmed by  user.']);
             $admin = User::where('user_type', 'admin')->get();
             Notification::send($admin, new MorayLimousineNotifications($notify_booking_user));
            return redirect()->back()->with('success', 'Sucess.. !  Booking Confirmed');
    }

    public $confirm_booking_msg = [
        'greeting' => 'Booking Request is confirmed by User',
        'subject' => 'Booking Request is Confirmed by user',
        'thanks_text' => 'Thanks For Using Hathaway Limousine',
        'action_text' => 'View My Site',
        'action_url' => '/home',
    ];

    /**
     * @param Request $request
     * @return Factory|\Illuminate\View\View
     */
    public function saveExtendBooking(Request $request)
    {
        $extended_amount = 0.00;
        $from_data = $request->all();
        $booking = $this->booking->findBooking($request['booking_id']);
        $extended_duration = $this->home_user->durationInHour($request['extended_duration']);
        $from_data['extended_duration'] = $extended_duration;
        $extended_distance = $request['extended_distance'] / 1000;
        $total_distance = $extended_distance + $booking['estimated_distance'];
        //         in case booking type is by distance
        if ($booking->booking_type == 'distance') {
            $total_new_price = $this->booking->getClassPriceDistance($booking, $total_distance);
            $total_new_price += $booking['extra_options_amount'];

            if ($total_new_price > $booking['net_amount']) {
                $extended_amount = $total_new_price - $booking['net_amount'];
            }
        } else {
            $extended_duration = $request['selected_hour'];
            $total_hours = $booking['estimated_time'] + $extended_duration;
            $total_distance = $total_distance +  ($extended_duration * 25);
            $from_data['extended_duration'] = $total_distance;
            $from_data['new_drop_location'] = "This Booking is for " . $total_hours;
            $extended_amount = $this->booking->extendPriceByTime($booking, $extended_duration);
            $total_new_price = $extended_amount;
        }
        $from_data['extended_distance'] = $extended_distance;
        $extended_booking = $this->home_user->storeExtendedBooking($from_data, $booking, $extended_amount, $total_new_price);
        $data['booking'] = $booking;
        $data['extended_booking'] = $extended_booking;
        return view('end-user.extended-booking-details', $data);
    }




    /**  Extended Booking Payment
     *
     * @param Request $request
     */
    public function paypaltransactioncomplete(Request $request)
    {
        $booking_id = $request->input('bookingId');
        $booking = ExtendBooking::find($booking_id);
        $booking->orderId = $request->input('orderID');
        $booking->userDetail = json_encode($request->input('userDetail'), JSON_PRETTY_PRINT);
        $user =  $this->home_user;
        if (isset($booking->orderId)) {
            $booking->payment_status = 'paid';
            $booking->save();
            $original_booking = $booking->booking;
            $admin = $user->where('user_type', 'admin')->get();
            $notify_booking_user = array_merge($this->booking->notify_booking_user, ['body' => 'Hello  ! Your booking is Extended Successfully We Will Let You Know When a Driver & Vehicle will be assigned to your booking. ']);
            $notify_booking_admin = $this->notificationMsg($original_booking);
            Auth()->user()->notify(new MorayLimousineNotifications($notify_booking_user));
            Notification::send($admin, new BookingNotification($notify_booking_admin));
        }
    }



    /**List Of Notifications
     *
     *
     * @return Factory|\Illuminate\View\View
     */
    public function userNotifications()
    {
        $notifications = auth()->user()->notifications()->where('read_at', '!=', null)->get();
        return view('end-user.user-notifications')->with('notifications', $notifications);
    }

    /**
     * @return Factory|View
     */
    public function changePasswordForm()
    {
        return view('end-user.change-password');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function changePassword(Request $request)
    { {
            $request->validate([
                'current_password' => ['required', new MatchOldPassword],
                'new_password' => ['required'],
                'new_confirm_password' => ['same:new_password'],
            ]);

            User::find(auth()->id())->update(['password' => Hash::make($request->new_password)]);

            return redirect()->back()->with('success', 'Success ..! Password Is Changed Successfully !');
        }
    }

    /**
     * @param $time
     * @param $date
     * @return bool
     */
    public function checkDataAndTime($time, $date, $hour)
    {
        $current_time = Carbon::now();
        $booking_time =  $time . ' ' . $date;
        $current_time = Carbon::parse($current_time)->addHours($hour);
        $pick_date_time = Carbon::parse($booking_time);
        //If Booking Time is greater then 2 hour form booking time
        if ($pick_date_time->greaterThan($current_time)) {
            return true;
        }
        return false;
    }

    /**
     * @param $booking
     * @return array
     */
    public function notificationMsg($booking)
    {
        return  [
            'greeting' => 'Booking Extended by User .',
            'subject' => 'Hathaway Limousine .  Booking Is Extended By a User',
            'thanks_text' => 'Thanks For Choosing Hathaway Limousine',
            'action_text' => 'View My Site',
            'action_url' => '/booking/details/' . $booking->id,
            'body' => "BOOKING DETAILS
                Pick Date  -   $booking->pick_date
                Pick Address  -   $booking->pick_address
                Drop Address  -   $booking->drop_address
                Selected Class  -   $booking->drop_address
                Travel Amount  -  $booking->travel_amount
                Net Amount  -  $booking->net_amount
                Payment Status  -   $booking->payment_status"
        ];
    }



    public function canceledBookings()
    {
        $bookings = auth()->user()->bookings->where('payment_status', 'paid')
            ->where('bookings_status', 'canceled');
        return view('parshall-views._user_booking_table')->with('bookings', $bookings);
    }

    public function completedBookings()
    {
        $bookings = auth()->user()->bookings->where('payment_status', 'paid')
            ->where('bookings_status', 'completed');
        return view('parshall-views._user_booking_table')->with('bookings', $bookings);
    }

    public function allBookings()
    {
        $data['bookings'] = auth()->user()->bookings->where('payment_status', 'paid');
        return view('parshall-views._user_booking_table', $data);
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function filterByDate(Request $request)
    {
        //$bookings = auth()->user()->bookings->where('payment_status','paid')
        $booking_type = $request->type;
        $bookings = auth()->user()->bookings
            ->where('pick_date', '>=',  $request['from_date'])
            ->where('pick_date', '<=', $request['to_date']);
        if ($booking_type == "next") {
            return view('parshall-views._user_booking_table')->with('bookings', $bookings);
        } else {
            return view('parshall-views._user_booking_pravious_table')->with('bookings', $bookings);
        }
    }
    public function filterByStatus(Request $request)
    {
        $booking_type = $request->type;
        $status = $request->status;
        $bookings = auth()->user()->bookings
            ->where('user_id', auth()->user()->id)
            ->where('booking_status', $status);
        if ($booking_type == "next") {
            return view('parshall-views._user_booking_table')->with('bookings', $bookings);
        } else {
            return view('parshall-views._user_booking_pravious_table')->with('bookings', $bookings);
        }
    }

    /**
     * @param $id
     * @return Factory|View
     */
    public function getInvoice($id)
    {
        $booking =  $this->booking->find($id);
        return \view('end-user.user-invoice')->with('booking', $booking);
    }


    /**
     * @var array
     */
    public $notify_booking_user = [
        'greeting' => 'Your request is submitted successfully',
        'subject' => 'Welcome To Hathaway Limousines',
        'thanks_text' => 'Thanks For Choosing Hathaway Limousine',
        'action_text' => 'View My Site',
        'action_url' => '/home',

    ];
}
