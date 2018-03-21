<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $employees=Employee::all();
        return view('employees/index',['employees'=>$employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::all()->pluck('name','id');
        return view ('employees/create',['users'=>$users]);
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
            'salary'=>'required|max:4000',
            'typeEmployee'=>'required|boss or assistant or pharmacist',
            'user_id'=>'required|exits:users,id',
        ]);
        $employee=new Employee($request->all());
        $employee->save();
        flash('Employee creado correctamente');
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
        $users=User::all()->pluck('name','id');
        return view('employees/edit',['employee'=>$employee, 'users'=>$users]);
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
            'salary'=>'required|max:4000',
            'typeEmployee'=>'required|boss or assistant or pharmacist',
            'user_id'=>'required|exits:users,id',
        ]);
        $employee->fill($request->all());
        $employee->save();
        flash('Employee modificado correctamente');
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
       flash('Employee borrado correctamente');
       return redirect()->route('employees.index');
    }
}
