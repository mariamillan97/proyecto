<?php

namespace App\Http\Controllers;
use App\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {

        $providers = Provider::all();
        return view('providers/index',['providers'=>$providers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('providers/create');
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
            'name'=> 'requires|max:255',
            'address'=>'requires|max:255',
            'email'=>'email',
            'number'=>'requires|max:9'
        ]);

        $provider=new Provider($request->all());
        $provider->save();
        flash('Proveedor creado correctamente');
        return redirect()->route('providers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Provider $provider)
    {
        return view('providers/show',['provider'=>$provider]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Provider $provider)
    {
        return view('providers/edit',['provider'=>$provider]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provider $provider)
    {
        $this->validate($request,[
            'name'=> 'requires|max:255',
            'address'=>'requires|max:255',
            'email'=>'email',
            'number'=>'requires|max:9'
        ]);
        $provider->fill($request->all());
        $provider->save();
        flash('Proveedor actualizado correctamente');
        return redirect()->route('providers.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provider $provider)
    {
        $provider->delete();
        flash('Proveedor borrado correctamente');
        return redirect()->route('providers.index');

    }
}
