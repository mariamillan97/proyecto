<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductProvider;
use App\Product;
use App\Provider;

class ProductProviderController extends Controller
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

    public function index(Request $request)
    {
       $productProviders = ProductProvider::all();

       return view('productProviders/index', ['productProviders'=>$productProviders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all()->pluck('name','id');
        $providers = Provider::all()->pluck('name','id');
        return view('productProviders/create',['products'=>$products, 'providers'=>$providers]);
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
            'provider_id' => 'required|exists:providers,id',

        ]);
        $productProvider = new ProductProvider($request->all());
        $productProvider->save();
        flash('Relación producto proveedor creada correctamente');
        return redirect()->route('productProviders.index');
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

        $productProvider = ProductProvider::find($id);
        $products = Product::all()->pluck('name','id');
        $providers = Provider::all()->pluck('name','id');
        return view('productProviders/edit',['productProvider'=> $productProvider,
            'products'=>$products, 'providers'=>$providers]);
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
            'provider_id' => 'required|exists:providers,id',

        ]);
        $productProvider = ProductProvider::find($id);
        $productProvider->fill($request->all());
        $productProvider->save();
        flash('Relación producto proveedor modificada correctamente');
        return redirect()->route('productProviders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productProvider = ProductProvider::find($id);
        $productProvider->delete();
        flash('Relación producto proveedor borrada correctamente');
        return redirect()->route('productProviders.index');
    }


}
