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
     *
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index(Request $request)
    {
       // $productSales = ProductSale::all();
      $productSales= ProductSale::name($request->get('name'))->orderBy('id', 'DESC')->paginate(500);
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
        $sales = Sale::all()->pluck('id','id');


        return view('productSales/create',['products'=>$products, 'sale'=>$sales]);
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
    public function show(ProductSale $productSale)
    {
      //  $productSales = Product::all()->pluck('name', 'id');
        // $productSales = $sale->productSale();
   //     return view('sales/productSale',['sale'=>$sale, 'products'=>$products]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductSale $productSale)
    {


        $products = Product::all()->pluck('name','id');

        $sales = Sale::all()->pluck('id','id');


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
    public function update(Request $request, ProductSale $productSale)
    {
        $this->validate($request, [
            'product_id' => 'required|exists:products,id',
            'sale_id' => 'required|exists:sales,id',
            'quantity' => 'required',

        ]);

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
    public function destroy($productSale)
    {
        $productSale = ProductSale::find($productSale);
        $productSale->delete();
        flash('Línea Venta borrada correctamente');

        return redirect()->route('productSales.index');
    }
}
