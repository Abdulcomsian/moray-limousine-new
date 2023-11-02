<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
// use Lunaweb\EmailVerification\Traits\VerifiesEmail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Notification;
use App\Notifications\MorayLimousineNotifications;
use Session;
use DB;
use Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    // use VerifiesEmail;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */

    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['verify', 'showResendVerificationEmailForm', 'resendVerificationEmail']]);
        $this->middleware('auth', ['only' => ['showResendVerificationEmailForm', 'resendVerificationEmail']]);
        //        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_number' => 'required|max:25',
            'password' => 'required|string|min:6|confirmed',
            'user_type' => 'required|string|max:15',
        ],[
            'first_name.required' => 'First Name Field cannot be empty',
            'first_name.string'   => 'First Name must be a String',
            'first_name.max'      => 'You have reached the limit of maximum characters of 50',
            'last_name.required' => 'Last Name Field cannot be empty',
            'last_name.string'   => 'Last Name must be a String',
            'last_name.max'      => 'You have reached the limit of maximum characters of 50',
            'email.required'     => 'Email field should not be empty',
            'email.max'          => 'You have reached the maximum of limit of characters (255)',
            'email.unique'       => 'Email is already registered.',
            'phone_number.required' => 'Phone number is required',
            'phone_number.max'      => 'Maximum characters for Phone Number is 25',
            'password.required'  => 'Password field should not be empty',
            'password.min'       => 'Minimum limit of password is 6 characters',
            'password.confirmed' => 'Password doesn`t matched',           
        ]
    
    );
    }

    protected function partnervalidator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:255|unique:users',
            // 'password' => 'required|string|min:8|',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    //override register method
    public function register(Request $request)
    {
        if ($request->user_type == "partner") {
            $this->partnervalidator($request->all())->validate();
            event(new Registered($user = $this->partnercreate($request->all())));
            //send email to admin
            // $users = User::where('user_type', 'admin')->get();
            // Notification::send($users, new MorayLimousineNotifications($this->notifyAdminMsg));
            return $this->registered($request, $user)
                ?: redirect($this->redirectPath());
        } else {
            $this->validator($request->all())->validate();
            event(new Registered($user = $this->create($request->all())));
            if ($user->user_type != 'end_user') 
            {
                $this->guard()->login($user);
            }
            return $this->registered($request, $user)
                ?: redirect($this->redirectPath());
        }
    }

    protected function registered(Request $request, $user)
    {
        if (session('link')) {
            return redirect(session('link'));
        } elseif ($user->user_type == 'admin') {
            return redirect('/admin/index');
        } elseif ($user->user_type == 'driver') {
            return redirect('/driver/dashboard');
        } elseif ($user->user_type == 'partner') {
            //return redirect('/partner/dashboard');
            return view('home.partner-thankyou', compact('user'));
        } else {
            Session::flash('message', 'We have e-mailed your account activation link!.');
            return redirect('/login');
        }
    }
    //
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone_number' => $data['phone_number'],
            'email' => $data['email'],
            'user_type' => $data['user_type'],
            'password' => Hash::make($data['password']),
        ]);
    }
    protected function partnercreate(array $data)
    {
        $user = User::create([
            'first_name' => '',
            'last_name' => '',
            'phone_number' => '',
            'email' => $data['email'],
            'user_type' => $data['user_type'],
            'password' => '',
        ]);
        if ($user) 
        {
            DB::table('partners')->insert([
                'company_name' => $data['company_name'],
                'user_id' => $user->id,
                'legal_form_company' => '',
                'city' => '',
                'phone_number' => '',
                'default_location' => '',
            ]);
            DB::table('user_location')->insert([
                'user_id' => $user->id,
                'location_id' => $data['city-select'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            $user->city = $data['city-select'];
            return $user;
        }
    }
    //
    protected $notifyAdminMsg = [
        'greeting' => 'A New Partner On Moray Limousines is registered ',
        'subject' => 'New Partner have Registered',
        'body'   => 'A New Partner On Moray Limousines is registered please approved. For More Details visit web',
        'thanks_text' => 'Thanks For Using Moray Limousines',
        'action_text' => 'View My Site',
        'action_url' => '/admin/dashboard'
    ];
}

