<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
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

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);
        $this->authenticated($request, $this->guard()->user());

        $pass = Auth::user()->password;
        if($pass == "$2y$10$79pDsHQ9371GLe/1ZO0YdOCj5Fh93AuZ8GbZ5qEa7dtbXUR1OYnsi"){
            return view('auth.passwordreset');
        }

       

        return $this->authenticated($request, $this->guard()->user())
               ?: redirect()->intended($this->redirectPath());
    }







    
}
