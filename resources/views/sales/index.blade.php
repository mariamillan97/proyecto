@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Ventas</div>

                   {{--}} <link rel="stylesheet"
                          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
                          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
                          crossorigin="anonymous">
                    <link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">

                    <link href=" https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css"
                          rel="stylesheet">{{--}}

                    <br>
                    <div class="panel-body">
                        @include('flash::message')


                        <form class="navbar-form navbar-left pull-right" role="search">
                            {{Form::open(['route'=>'sales.index', 'method'=>'GET', 'class'=> 'navbar-form navbar-left pull-right'])}}

                            <div class="form-group">
                                {{Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Id. Venta'])}}
                            </div>

                            <button type="submit" class="btn btn-success">Buscar</button>
                        </form>

                        <br><br>

                        {!! Form::open(['route' => 'sales.create',
                         'method' => 'get']) !!}
                        {!!   Form::submit('Crear venta',
                        ['class'=> 'btn btn-success'])!!}
                        {!! Form::close() !!}

                        <br><br>

                        {!! Form::open(['route' => 'productSales.index', 'method' => 'get']) !!}
                        {!! Form::submit('Detalles', ['class'=> 'btn btn-success'])!!}
                        {!! Form::close() !!}


                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Id. Venta</th>
                                <th>Pagado</th>
                                <th>Cliente</th>
                                <th>Empleado</th>
                                <th>Fecha</th>


                                <th colspan="2">Acciones</th>

                            </tr>

                            @foreach ($sales as $sale)


                                <tr>
                                    <td>{{ $sale->id }}</td>
                                    <td>{{ $sale->paid }}</td>
                                    <td>{{ $sale->client->user->name}}</td>
                                    <td>{{ $sale->employee->user->name}}</td>
                                    <td>{{ Carbon\Carbon::parse($sale->created_at)->format('d-m-Y') }}</td>






                                    <td>
                                        {!! Form::open(['route' => ['sales.edit',$sale->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Editar', ['class'=> 'btn btn-success'])!!}
                                        {!! Form::close() !!}
                                    </td>

                                    <td>
                                        {!! Form::open(['route' => ['sales.destroy',$sale->id], 'method' => 'delete']) !!}
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
