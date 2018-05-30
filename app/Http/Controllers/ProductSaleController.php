<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductSale;
use App\Sale;
use App\Product;

class ProductSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productSales = ProductSale::all();
        return view('productSales/index', ['productSales'=>$productSales]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all()->pluck('name','id');

        $sales = Sale::all()->pluck('id');


        return view('productSales/create',['products'=>$products, 'sales'=>$sales]);
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
            'product_id' => 'required|exists:products,id',
            'sale_id' => 'required|exists:sales,id',
            'quantity' => 'required',

        ]);

        $productSale = new ProductSale($request->all());
        $productSale->save();
        flash('Línea venta creada creada correctamente');
        return redirect()->route('productSales.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productSale = ProductSale::find($id);

        $products = Product::all()->pluck('name','id');

        $sales = Sale::all()->pluck('id');


        return view('productSales/edit',['productSale'=> $productSale,
            'products'=>$products, 'sales'=>$sales]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'product_id' => 'required|exists:products,id',
            'sale_id' => 'required|exists:sales,id',
            'quantity' => 'required',

        ]);
        $productSale = ProductSale::find($id);
        $productSale->fill($request->all());

        $productSale->save();

        flash('Línea Venta modificada correctamente');

        return redirect()->route('productSales.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productSale = ProductSale::find($id);
        $productSale->delete();
        flash('Línea Venta borrada correctamente');

        return redirect()->route('productSales.index');
    }
}
