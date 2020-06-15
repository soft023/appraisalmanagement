<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Department;
use App\Supervisor;
use App\Position;
use App\Gradelevel;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Input;

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

/**
* Where to redirect users after registration.
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
$this->middleware('guest');
}






/**
* Get a validator for an incoming registration request.
*
* @param  array  $data
* @return \Illuminate\Contracts\Validation\Validator
*/



public function showRegistrationForm()
{


}















protected function validator(array $data)
{
return Validator::make($data, [
'firstname' => ['required', 'string', 'max:255'],
'lastname' => ['required', 'string', 'max:255'],
'othername' => ['required', 'string', 'max:255'],
'staffid' => ['required', 'string', 'max:255', 'unique:users'],
'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
'phone' => ['required', 'string', 'max:255'],
'address' => ['required', 'string', 'max:255'],
'gender' => ['required', 'string', 'max:255'],
// 'dob' => ['string', 'max:255'],
// 'profilepic' => ['string', 'max:255'],
'branch' => ['required', 'string', 'max:255'],
'department' => ['required', 'string', 'max:255'],
'supervisor' => ['required', 'string', 'max:255'],
'position' => ['required', 'string', 'max:255'],
'entrygradelevel' => ['required', 'string', 'max:255'],
'currentgradelevel' => ['required', 'string', 'max:255'],
'qualification' => ['required', 'string', 'max:255'],
'employmentstatus' => ['required', 'string', 'max:255'],
'password' => ['required', 'string', 'min:5', 'confirmed'],
]);
}

/**
* Create a new user instance after a valid registration.
*
* @param  array  $data
* @return \App\User
*/
protected function create(array $data)
{

$filen = Input::file('profilepic')->getClientOriginalName();
$nam = $data['staffid'];     
Input::file('profilepic')->move(public_path('staffpics'), $nam);
$filename = $nam.$filen;

return User::create([
'firstname' => $data['firstname'],
'lastname' => $data['lastname'],
'othername' => $data['othername'],
'staffid' => $data['staffid'],
'email' => $data['email'],
'phone' => $data['phone'],
'address' => $data['address'],
'gender' => $data['gender'],
'dob' => $data['dob'],
'profilepics' => $nam,
'branch' => $data['branch'],
'department' => $data['department'],
'supervisor' => $data['supervisor'],
'rightsupervisor' => $data['sp'],  
'rightmd' => $data['md'],
'righthr' => $data['hr'],
'rightfincon' => $data['fincon'],
'position' => $data['position'],
'entrygradelevel' => $data['entrygrade'],
'currentgradelevel' => $data['currentgrade'],
'qualification' => $data['qualification'],
'employmentstatus' => $data['status'],
'password' => Hash::make($data['password']),
]);

Input::file('profilepic')->move(public_path('staffpics'),$filename);
}
}
