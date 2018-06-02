@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Proveedores</div>

                    <div class="panel-body">
                        @include('flash::message')


                        <form class="navbar-form navbar-left pull-right" role="search">
                            {{Form::open(['route'=>'providers.index', 'method'=>'GET', 'class'=> 'navbar-form navbar-left pull-right'])}}

                            <div class="form-group">
                                {{Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Nombre proveedor'])}}
                            </div>

                            <button type="submit" class="btn btn-success">Buscar</button>
                        </form>
                        <br><br>

                        {!! Form::open(['route' => 'providers.create', 'method' => 'get']) !!}
                        {!!   Form::submit('Crear proveedor', ['class'=> 'btn btn-success'])!!}
                        {!! Form::close() !!}

                        <br><br>

                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Nombre</th>
                                <th>Dirección</th>
                                <th>Email</th>
                                <th>Teléfono</th>

                            </tr>

                            @foreach ($providers as $provider)


                                <tr>
                                    <td>{{ $provider->name }}</td>
                                    <td>{{ $provider->address }}</td>
                                    <td>{{ $provider->email }}</td>
                                    <td>{{ $provider->number }}</td>

                                    <td>
                                        {!! Form::open(['route' => ['providers.edit',$provider->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Editar', ['class'=> 'btn btn-success'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['providers.destroy',$provider->id], 'method' => 'delete']) !!}
                                        {!!   Form::submit('Borrar', ['class'=> 'btn btn-success' ,'onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
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