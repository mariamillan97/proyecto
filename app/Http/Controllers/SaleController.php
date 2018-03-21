<?php

namespace App\Http\Controllers;

use App\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
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
        $sales= Sale::all();
        return view('sales/index',['sales'=>$sales]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients= Client::all();
        $employees= Employee::all();
        return view('sales/create',['clients'=>$clients, 'employees'=>$employees]);
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
            'paid'=>'required|false or true',
            'wayToPay'=>'required|creditCar or cash',
            'client_id'=>'required|exists:clients,id',
            'employee_id'=>'required|exists:employees,id'

        ]);
        $sale= new Sale($request->all());
        $sale->save();
        flash('Sale creado correctamente');
        return redirect()->route('sales.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        return view('sales/show',['sale'=>$sale]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        $clients= Cliente::all();
        $employees= Employee::all();
        return view ('sales/edit',['sale'=>$sale,'client'=> $clients ,'employee'=> $employees]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        $this->validate($request, [
            'paid'=>'required|false or true',
            'wayToPay'=>'required|creditCar or cash',
            'client_id'=>'required|exists:clients,id',
            'employee_id'=>'required|exists:employees,id'

        ]);
        $sale-> fill($request->all());
        $sale->save();
        flash('Sale modificado correctamente');
        return redirect()->route('sales.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        $sale->delete();
        flash('Sale borrada correctamente');
        return redirect()->route('sales.index');
    }
}
