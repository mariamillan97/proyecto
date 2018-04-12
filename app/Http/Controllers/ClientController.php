<?php

namespace App\Http\Controllers;


use App\Client;
use App\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $clients = Client::all();
        return view('clients/index',['clients'=>$clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users= User::all();
        return view ('clients/create',['users'=>$users]);
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
            'debt'=>'required|max:50',
            'socSecNum'=>'required|max:12',
            'purchasedProducts'=>'required|max:50',
            'user_id'=>'required|exists:users,id'
        ]);
        $client=new Client($request->all());
        $client->save();
        flash('Cliente creado correctamente');
        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('clients/show',['client'=>$client]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {

        $users = User::all();
        return view ('clients/edit',['client'=>$client,'users'=>$users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $this->validate($request, [
            'debt'=>'required|max:50',
            'socSecNum'=>'required|max:12',
            'purchasedProducts'=>'required|max:50',
            'user_id'=>'required|exists:users,id'
        ]);
        $client->fill($request->all());
        $client->save();
        flash('Client modificado correctamente');
        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        flash('Client borrado correctamente');
        return redirect()->route('clients.index');
    }
}
