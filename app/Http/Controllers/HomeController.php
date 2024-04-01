<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\CmsFaq;
use App\Models\CmsHomePage;
use App\Models\CmsService;
use App\Models\Configuration;
use App\Models\Location;
use App\Models\HappyClient;
use App\Models\Testimonial;
use App\Notifications\BookingNotification;
use App\Notifications\MorayLimousineNotifications;
use App\Models\User;
use App\Models\VehicleCategory;
use App\Models\Contactus;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Pagination\Paginator;
use Session;
use DB;

class HomeController extends Controller
{

    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }



    protected $notify_admin_enquiry = [
        'greeting' => 'You have a new enquiry from a user on Hathaway Limousines',
        'subject' => 'A new enquiry from a user',
        'thanks_text' => 'Thanks For Using Hathaway Limousine',
        'action_text' => 'View My Site',
        'action_url' => 'admin/index',
    ];
    protected $notify_user_enquiry = [
        'greeting' => 'Your enquiry is received on Hathaway Limousines',
        'subject' => 'Enquiry Is Received',
        'body' => 'Your enquiry is received on Hathaway Limousines Thanks for your response we will respond you ( if needed ) soon.',
        'thanks_text' => 'Thanks For Using Hathaway Limousine',
        'action_text' => 'View My Site',
        'action_url' => 'user/profile',
    ];



    /**
     * @return Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['categories'] = VehicleCategory::all();
        $data['config'] = Configuration::first();
        $data['logos'] = HappyClient::all();
        $data['services'] = CmsService::all();
        $data['testimonial'] = Testimonial::all();

        return view('home.index', $data);
    }


    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function userLogout()
    {
        Auth()->logout();
        return redirect(route('login'));
    }


    public function ourfleet()
    {
        $homeCMS = CmsHomePage::all();
        $home_content = [];
        foreach ($homeCMS as $home) {
            $item_name = $home->item_name;
            $home_content += [$item_name => $home->item_content];
        }
        $data['home_content'] = $home_content;
        $categories = VehicleCategory::paginate(6);
        $data['categories'] = $categories;
        return view('siteheader.our-fleet', $data);
    }
<<<<<<< HEAD
    public function fleetdetail()
    {
        $homeCMS = CmsHomePage::all();
        $home_content = [];
        foreach ($homeCMS as $home) {
            $item_name = $home->item_name;
            $home_content += [$item_name => $home->item_content];
        }
        $data['home_content'] = $home_content;
        $categories = VehicleCategory::paginate(3);
        $data['categories'] = $categories;
        return view('siteheader.fleet-detail', $data);
    }
=======

>>>>>>> 5758a8caf7b869ca45db07bf111a6915ec595f3a
    /**
     * @return Factory|\Illuminate\View\View
     */

    public function contactUs()
    {
        $homeCMS = CmsHomePage::all();
        $home_content = [];
        foreach ($homeCMS as $home) {
            $item_name = $home->item_name;
            $home_content += [$item_name => $home->item_content];
        }
        $data['home_content'] = $home_content;
        return view('siteheader.contact-us', $data);
    }

    /**
     * @return Factory|\Illuminate\View\View
     */
    public function aboutUs()
    {
        $homeCMS = CmsHomePage::all();
        $home_content = [];
        foreach ($homeCMS as $home) {
            $item_name = $home->item_name;
            $home_content += [$item_name => $home->item_content];
        }
        $data['home_content'] = $home_content;

        $faqs = CmsFaq::all();
        $happyClients = HappyClient::all();
        return view('siteheader.about-us', compact('faqs', 'home_content' , 'happyClients'));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function contact_us_store(Request $request)
    {
        $user = Auth()->user();
        $data = request()->validate([
            'first_name' => 'required|min:3 | max:20',
            'last_name' => 'required|min:3 | max:20',
            'cellno' => 'required|min:7 | max:20',
            'email' => 'required',
            'comment' => 'required|min:3 | max:300'
        ],
        [
            'first_name.min' => 'Please write your First Name with more than three characters',
            'first_name.required' => 'Name field should not be empty',
            'first_name.max' => 'Maximum characters for first_name is 20',
            'last_name.min' => 'Please write your Last Name with more than three characters',
            'last_name.required' => 'Name field should not be empty',
            'last_name.max' => 'Maximum characters for first_name is 20',
            'cellno.required' => 'Phone Number should not be empty',
            'cellno.min' => 'Minimum integers for Phone Number is 7 integers',
            'cellno.max' => 'Maximum integers of Phone Numbers is 20 integers',
            'email.required' => 'Email is required',
            'comment.required' => 'Description should not be empty',
            'comment.min' => 'Minimum characters for Description is 7 characters',
            'comment.max' => 'Maximum characters of Description is 20 characters',
        ]    
    );
        $from_data = request()->all();
        $enquiry_msg =  Contactus::create($from_data);
        $admin = $this->user->where('user_type', 'admin')->get();
        $notify_admin_enquiry = array_merge($this->notify_admin_enquiry, ['body' => $enquiry_msg->comment]);
        Notification::send($admin, new MorayLimousineNotifications($notify_admin_enquiry));
        $user->notify(new MorayLimousineNotifications($this->notify_user_enquiry));
        return redirect()->back()->with('success', 'Success ... !  Your Message is Submitted Successfully .');
    }

    /**
     * @return Factory|\Illuminate\View\View
     */
    public function servicesrates()
    {
        return view('siteheader.services-rates');
    }

    /**
     * @return Factory|\Illuminate\View\View
     */
    public function ourServices()
    {
        $services = CmsService::paginate(6);
        $homeCMS = CmsHomePage::all();
        $home_content = [];
        foreach ($homeCMS as $home) {
            $item_name = $home->item_name;
            $home_content += [$item_name => $home->item_content];
        }
        $data['home_content'] = $home_content;
        $config = Configuration::all()->first();
        return view('siteheader.airport-transfer', compact('home_content', 'services', 'config'));
    }

    public function serviceDetail($id)
    {
        $service = CmsService::find($id);
        $services = CmsService::all()->take(10);
        $config = Configuration::all()->first();
        return view('siteheader.service-detail')->with('service', $service)->with('services', $services)->with('config', $config);
    }

    public function ariporttransfer()
    {

        return view('siteheader.airport-transfer');
    }
    public function limousineservice()

    {

        return view('siteheader.limousine-service');
    }
    public function freewaitingtime()

    {
        return view('siteheader.free-waiting-time');
    }

    /**
     * @return Factory|\Illuminate\View\View
     */
    public function faq()
    {
        $faqs = CmsFaq::all();
        return view('home.faq')->with('faqs', $faqs);
    }


    public function footerPageOne()
    {
        return view('siteheader.footer-page-one');
    }

    public function footerPageTwo()
    {
        return view('siteheader.footer-page-two');
    }

    //send expiry date doc notificatin
    public function send_expiry_date_notify()
    {
        $current = Carbon::now()->toDateString();
        $notifydata = DB::table('uploadeddocuments')
            ->join('users', 'users.id', '=', 'uploadeddocuments.user_id')
            ->whereNotNull('expiry_date')->get();
        $admin = User::where('user_type', 'admin')->first();
        foreach ($notifydata as $data) {
            $to = \Carbon\Carbon::createFromFormat('Y-m-d', $data->expiry_date);
            $diff_in_days = $to->diffInDays($current);
            $user = new User();
            $user->id = $data->id;
            $user->email = $data->email;
            if ($diff_in_days == 14) {
                $approve_msg =  array_merge($this->approve_driver_msg, ['body' => 'Your uploaded document expiry date is in 14 days. Please renew your document.']);
                $user->notify(new MorayLimousineNotifications($approve_msg));
            }
            if ($diff_in_days == 1) {
                $approve_msg =  array_merge($this->admin_notify_expiry_msg, ['body' => 'Expiry date of document ' . $data->document_title . ' for User ' . $data->first_name . ' ' . $data->last_name . '  is in 1 day. Please take necessary action']);
                $admin->notify(new MorayLimousineNotifications($approve_msg));
            }
        }
    }
    private $approve_driver_msg = [
        'greeting' => 'Document expired.',
        'subject' => 'Document Expired Notify',
        'thanks_text' => 'Thanks For Using Hathaway Limousine',
        'action_text' => 'View My Site',
        'action_url' => '/driver/dashboard',
    ];
    private $admin_notify_expiry_msg = [
        'greeting' => 'Document expired.',
        'subject' => 'Document Expired',
        'thanks_text' => 'Thanks For Using Hathaway Limousine',
        'action_text' => 'View My Site',
        'action_url' => '/driver/dashboard',
    ];
}
