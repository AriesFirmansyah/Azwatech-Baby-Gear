<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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
    protected $redirectTo = "/";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    protected function validateLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
            'g-recaptcha-response' => function ($attribute, $value, $fail){
                $secretKey = '6LcgeQ0bAAAAABNwROYye1QB4XFIMEmDZ3m2drWq';
                $response = $value;
                $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$response";
                $response = \file_get_contents($url);
                $response = json_decode($response);
                     if(!$response->success){
                         Session::flash('g-recaptcha-response', 'please check reCaptcha');
                         Session::flash('alert-class', 'alert-danger');
                         $fail($attribute.'google reCaptcha failed');
                     }
                }
        ]);
    }
}
