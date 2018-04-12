@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Clientes</div>

                    <div class="panel-body">


                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Nombre</th>
                                <th>Primer Apellido</th>
                                <th>Segundo Apellido</th>
                                <th>Email</th>
                                <th>Teléfono</th>
                                <th>Deuda</th>
                                <th>NumSocSec</th>
                                <th>Productos comprados</th>



                            </tr>

                            @foreach ($clients as $client)


                                <tr>

                                    <td>{{ $client->user->name }}</td>
                                    <td>{{ $client->user->lastName1 }}</td>
                                    <td>{{ $client->user->lastName2 }}</td>
                                    <td>{{ $client->user->email }}</td>
                                    <td>{{ $client->user->number}}</td>
                                    <td>{{ $client->debt }}</td>
                                    <td>{{ $client->socSecNum }}</td>
                                    <td>{{ $client-> purchasedProducts}}</td>



                                    <td>
                                        {!! Form::open(['route' =>
                                        ['clients.edit',$client->id],
                                         'method' => 'get']) !!}
                                        {!!   Form::submit('Editar',
                                        ['class'=> 'btn btn-warning'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['route' =>
                                        ['clients.destroy',$client->id],
                                         'method' => 'delete']) !!}

                                        {!!   Form::submit('Borrar',
                                         ['class'=> 'btn btn-danger' ,'onclick' =>
                                         'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
                                        {!! Form::close() !!}

                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection