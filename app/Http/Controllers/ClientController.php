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

    public function index(Request $request)
    {
      //  $clients = Client::all();
        $clients= Client::name($request->get('name'))->orderBy('id', 'DESC')->paginate();
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
            'debt'=>'required',
            'socSecNum'=>'required|max:12',
            'purchasedProducts'=>'required']);

        $user = new User;
        $user->name = $request['name'];
        $user->lastName1 = $request['lastName1'];
        $user->lastName2 = $request['lastName2'];
        $user->DNI = $request['DNI'];
        $user->number= $request ['number'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['DNI']);

        $user->save();

        $client=new Client($request->all());
        $client->user()->associate($user);
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
        return view('clients/index',['client'=>$client]);
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

            'debt'=>'required',
            'socSecNum'=>'required|max:12',
            'purchasedProducts'=>'required',

        ]);


        $user= User::find($client->user_id);
        $user->name = $request['name'];
        $user->lastName1 = $request['lastName1'];
        $user->lastName2 = $request['lastName2'];
        $user->DNI = $request['DNI'];
        $user->number= $request ['number'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['DNI']);

        $user->save();

        $client->fill($request->all());
        $client->user()->associate($user);
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
