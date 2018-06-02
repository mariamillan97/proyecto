<?php

namespace App\Http\Controllers;

use App\ProductSale;
use App\Sale;
use App\Employee;
use App\Client;
use App\Product;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index(Request $request)
    {
      //$sales= Sale::all();
         $sales= Sale::name($request->get('name'))->orderBy('id')->paginate();
        return view('sales/index',['sales'=>$sales]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients= Client::all()->pluck('full_name', 'id');
        $employees= Employee::all()->pluck('full_name', 'id');

       /* $client= $sale ->client;
        $employee= $sale ->employee;*/

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
            'paid'=>'required',
            'client_id'=>'required|exists:clients,id',
            'employee_id'=>'required|exists:employees,id'

        ]);
        $sale= new Sale($request->all());
        $sale->save();
        flash('Venta creada correctamente');
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
        $products = Product::all()->pluck('name', 'id');
       // $productSales = $sale->productSale();
        return view('sales/productSale',['sale'=>$sale, 'products'=>$products]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
       /* $client= $sale ->client;
        $employee= $sale ->employee;*/

        $clients= Client::all()->pluck('full_name', 'id');
        $employees= Employee::all()->pluck('full_name', 'id');

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
         //   'paid'=>'required',
            'client_id'=>'required|exists:clients,id',
            'employee_id'=>'required|exists:employees,id'

        ]);
        $sale-> fill($request->all());
        $sale->save();
        flash('Venta modificado correctamente');
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
        flash('Venta borrada correctamente');
        return redirect()->route('sales.index');
    }


    public function detalles($id , Request $request){

        $this->validate($request, [
            'product_id' =>'required|exists:products,id',
            'quantity'=>'required',
            //'paid'=>'required',
            'client_id'=>'required|exists:clients,id',
            'employee_id'=>'required|exists:employees,id'


        ]);

        $productSale = ProductSale::all();
        $sale =Sale::find($productSale);
        $sale ->productSale()->quantity;

        return redirect()->route('sales.index', ['sale'=>$sale]);


    }

 /*   public function cantidadProducto($id, Request $request)
    {

        $this->validate($request, [
            'quantity'=>'required',
            'product_id'=>'required|exists:products,id'

        ]);


        $sale = Sale::find($id);
        $sale->products()->attach($request->product_id, ['quantity'=>$request->quantity,
             'sale_id'=>$sale->id]);


        return redirect()->route('sales.index', ['sale'=>$sale]);
///////////////
        $sale = Sale::find($id);
        $sale->productSale()->attach($request->productSale_id, ['quantity'=>$request->quantity,
            'sale_id'=>$sale->id]);
        $sale->product()->attach($request->product_id, ['name'=>$request->name,
           'sale_id'=>$sale->id]);

        return redirect()->route('sales.index', ['sale'=>$sale]);
    }*/





    /*public function borrarProducto($idProduct ,$idSale)
    {
        $product = Product::find($idProduct);
        $sale = Sale::find($idSale);
        $sale->products()->detach($product->id);



        return redirect()->route('sales.index', ['sale'=>$sale]);
    }*/




}
