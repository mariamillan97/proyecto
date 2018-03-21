<?php

namespace App\Http\Controllers;

use App\ProductSale;
use Illuminate\Http\Request;

class ProductSaleController extends Controller
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
        $productSales= ProductSale::all();
        return view('productSales/index',['productSales'=>$productSales]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products= Product::all();
        $sales = Sale::all();
        return view('products/index',['products'=>$products , 'sales'=>$sales]);
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
            'quantity'=>'required|max:15',
            'product_id'=>'required|exists:products, id',
            'sale_id'=>'required|exists:sales, id'
        ]);
        $productSale = new ProductSale($request->all());
        $productSale->save();
        flash('ProductSale creada correctamente');
        return redirect()->route('productSales.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductSale  $productSale
     * @return \Illuminate\Http\Response
     */
    public function show(ProductSale $productSale)
    {
        return view('productSales/show',['productSale'=>$productSale]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductSale  $productSale
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductSale $productSale)
    {
        $products= Product::all();
        $sales = Sale::all();
        return view('productSales/edit',['productSale'=>$productSale , 'products'=>$products , 'sales'=>$sales]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductSale  $productSale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductSale $productSale)
    {
        $this->validate($request, [
            'quantity'=>'required|max:15',
            'product_id'=>'required|exists:products, id',
            'sale_id'=>'required|exists:sales, id'
        ]);
        $productSale ->fill($request->all());
        $productSale->save();
        flash('ProductSale modificada correctamente');
        return redirect()->route('productSales.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductSale  $productSale
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductSale $productSale)
    {
        $productSale->delete();
        flash('ProductSale borrada correctamente');
        return redirect()->route('productSales.index');
    }
}
