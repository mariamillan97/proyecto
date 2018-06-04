<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Role;
use App\Employee;
use App\Http\Controllers\Controller;
//use Illuminate\Support\Facades\Hash;
//use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
        *
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

     public function showRegistrationForm()
    {
        $roles = Role::all()->pluck('name','id');

        return view('auth.register',['roles'=>$roles]);

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
                'name' => 'required|max:255',
                'lastName1'=>'required|max:255',
                'lastName2'=>'required|max:255',
                'number'=>'required',
                'DNI'=>'required',
                'salary'=>'required',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
                'role_id'=> 'required|exists:roles,id'
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


        $user = new User;
        $user->name = $data['name'];
        $user->lastName1 = $data['lastName1'];
        $user->lastName2 = $data['lastName2'];
        $user->DNI = $data['DNI'];
        $user->number= $data ['number'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);

        $user->save();

        $employee = new Employee;
        $employee->salary = $data['salary'];
        $employee->role_id=$data['role_id'];

        $employee->user()->associate($user);
        $employee->save();

        return $user;
    }

}
