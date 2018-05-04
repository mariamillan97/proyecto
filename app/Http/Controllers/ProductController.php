<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
/*tengo que poner que si es un cliente le mando a la vidta indexClient*/
/* if (userTipo == "Cliente")      return view('products/indexCliente',['products'=>$products]);
 else if (userTipo =="Empleado")         return view('products/index',['products'=>$products]);*/


        $products= Product::all();
        return view('products/index',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:255',
            'pricePurchased'=>'required|max:200',
            'priceSale'=>'required|max:210',
            'dateOfExpiry'=>'required|date|after:now',
            'stock'=>'required|max:100',
            'prescription'=>'required|false or true',

        ]);
        $product= new Product($request->all());
        $product->save();
        flash('Producto creado correctamente');
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products/show',['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products/edit',['product'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request,[
        'name'=>'required|max:255',
        'pricePurchased'=>'required|max:200',
        'priceSale'=>'required|max:210',
        'dateOfExpiry'=>'required|date|after:now',
        'stock'=>'required|max:100',
        'prescription'=>'required|false or true',
    ]);
        $product-> fill($request->all());
        $product->save();
        flash('Producto modificado correctamente');
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        flash('Producto borrado correctamente');
        return redirect()->route('products.index');
    }
}
