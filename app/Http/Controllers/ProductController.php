<?php

namespace App\Http\Controllers;

use App\Product;
use App\Provider;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index(Request $request)
    {
/*tengo que poner que si es un cliente le mando a la vidta indexClient*/
/* if (userTipo == "Cliente")      return view('products/indexCliente',['products'=>$products]);
 else if (userTipo =="Empleado")         return view('products/index',['products'=>$products]);*/


       // $products= Product::all();

        $products= Product::name($request->get('name'))->orderBy('id', 'DESC')->paginate(500);
        return view('products/index',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $providers= Provider::all()->pluck('name','id');
        return view('products/create',['providers'=> $providers]);
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
            'pricePurchase'=>'required',
            'priceSale'=>'required',
            'dateOfExpiry'=>'required|after:today',
            'stock'=>'required|max:100',
            'prescription'=>'required',


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
        $providers = Provider::all()->pluck('name', 'id');

        return view('products/show',['product'=>$product, 'providers'=>$providers]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $providers= Provider::all()->pluck('name', 'id');
        return view('products/edit',['product'=>$product, 'providers'=>$providers]);
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
            'pricePurchase'=>'required',
            'priceSale'=>'required',
            'dateOfExpiry'=>'required|after:today',
            'stock'=>'required|max:100',
             'prescription'=>'required',
             'provider_id'=>'required|exists:providers,id'

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

   /* public function esProveedor($id, Request $request){

        $product = Product::find($id);
       $product->providers()->attach($request->provider_id, ['name'=>$request->name,
                  'product_id'=>$product->id ]);
      //  $product->providers()->name;

        return redirect()->route('products.index', ['product'=>$product]);


    }*/


}
