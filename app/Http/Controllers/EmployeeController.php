<?php

namespace App\Http\Controllers;

use App\Role;
use App\Employee;
use App\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

  /*  public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function index(Request $request)
    {

       // $employees=Employee::all();

        $employees= Employee::name($request->get('name'))->orderBy('id', 'DESC')->paginate();

        return view('employees/index',['employees'=>$employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=Role::all()->pluck('name','id');
        return view ('employees/create',['roles'=>$roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request, [
           'DNI' =>'required|max:9',
            'name'=>'required|max:255',
            'lastName1'=>'required|max:255',
            'lastName2'=>'required|max:255',
            'number'=>'required',
            'email'=>'email',
            'role_id'=> 'required|exists:roles,id',
            'salary'=>'required'
        ]);
        $employee=new Employee($request->all());
        $employee->save();
        flash('Trabajador creado correctamente');
        return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view ('employees/show',['employee'=>$employee]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        ////AQUI NO SE SI ES ROL O ROLES
        $role = Role::all()->pluck('name','id');
        return view('employees/edit',['employee'=>$employee, 'role'=>$role]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $this->validate($request, [
           /* 'DNI' =>'required',
            'name'=>'required|max:255',
            'lastName1'=>'required|max:255',
            'lastName2'=>'required|max:255',
            'number'=>'required',
            'email'=>'email',*/
            'role_id'=> 'required|exists:roles,id',
            'salary'=>'required'
        ]);
        $user = $employee->user;
        $user->fill($request->all());
        $employee->fill($request->all());
        $employee->user_id = $user->id;
        $user->save();
        $employee->save();
        flash('Trabajador modificado correctamente');
        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
       $employee->delete();
       flash('Trabajador borrado correctamente');
       return redirect()->route('employees.index');
    }
}
