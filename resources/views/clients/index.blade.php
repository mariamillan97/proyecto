@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Clientes</div>

                    {{--}} <link rel="stylesheet"
                           href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
                           integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
                           crossorigin="anonymous">
                      <link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">

                      <link href=" https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css"
                          rel="stylesheet">{{--}}


                    <div class="panel-body">
                        @include('flash::message')

                        <form class="navbar-form navbar-left pull-right" role="search">
                            {{Form::open(['route'=>'clients.index', 'method'=>'GET', 'class'=> 'navbar-form navbar-left pull-right'])}}

                            <div class="form-group">
                                {{Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Número SecSoc'])}}
                            </div>

                            <button type="submit" class="btn btn-success">Buscar</button>
                        </form>
                        <br><br>

                        {!! Form::open(['route' => 'clients.create',
                        'method' => 'get']) !!}
                        {!! Form::submit('Crear cliente',
                        ['class'=> 'btn btn-success'])!!}
                        {!! Form::close() !!}



                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>DNI</th>
                                <th>Nombre</th>
                                <th>Primer Apellido</th>
                                <th>Segundo Apellido</th>
                                <th>Email</th>
                                <th>Teléfono</th>
                                <th>Deuda</th>
                                <th>NumSocSec</th>
                                <th>Productos comprados</th>

                                <th colspan="3">Acciones</th>

                            </tr>

                            @foreach ($clients as $client)


                                <tr>
                                    <td>{{ $client->user->DNI }}</td>
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
                                        ['class'=> 'btn btn-success'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['route' =>
                                        ['clients.destroy',$client->id],
                                         'method' => 'delete']) !!}

                                        {!!   Form::submit('Borrar',
                                         ['class'=> 'btn btn-success' ,'onclick' =>
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