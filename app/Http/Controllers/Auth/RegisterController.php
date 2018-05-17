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
        /*lo he puesto como si es un adm se creara un
        empleado, y sino un cliente*/
        /*no se si ponerlo como que si $data socsecnum
        entonces es cliente y sino empleado*/
        //if(isset($data['adm'])){
            return Validator::make($data, [
                'name' => 'required|max:255',
                'lastName1'=>'required|max:255',
                'lastName2'=>'required|max:255',
                'number'=>'required',
                'DNI'=>'required',
                'salary'=>'required',
               // 'user_id'=>'required|exits:users,id',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
                'role_id'=> 'required|exists:roles,id'
            ]);
       /* }else{
            return Validator::make($data,[
                'name'=> 'required|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'DNI'=>'required|max:9',
                'lastName1'=>'required|max:255',
                'lastName2'=>'required|max:255',
                'number'=>'numeric',
                'password' => 'required|string|min:6|confirmed',

            ]);*/
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
        /*$user = new User();
        $user->name = $data['name'];
        $user->lastName1 = $data ['lastName1'];
        $user->lastName2 = $data ['lastName2'];
        $user->email = $data ['email'];
        $user->number= $data ['number'];
        $user ->password = bcrypt($data['password']);
        $user->save();


        if(isset($data['adm'])){
            $client= new Client($data);
            $client-> user_id=$user->id;
            $client->save();
        }else{
            $employee= new Client($data);
            $employee-> user_id=$user->id;
            $employee->save();
        }

        return $user;*/

        /*$user = new User();
         $user->password = Hash::make($user->password);
         $user-save();
         $client = new Client($data);
         $client->user_id = $user->id;
         $client->save();
         return $user;*/

        /*return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);*/

}
