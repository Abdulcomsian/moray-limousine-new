<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */



    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated($request, $user)
    {
        if (session('link')) {
            return redirect(session('link'));
        }

        if (Session::get('search') != null) 
        {
            return redirect()->to(Session::get('search'));
        } elseif ($user->user_type == 'admin') 
        {
            return redirect('/admin/index');
        } elseif ($user->user_type == 'driver') 
        {
            return redirect('/driver/dashboard');
        } elseif ($user->user_type == 'partner') 
        {
            return redirect('/partner/dashboard');
        } else 
        {
            return redirect('/');
        }
    }
}

