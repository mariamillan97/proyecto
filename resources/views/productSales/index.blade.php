@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Detalles</div>


                    <br>
                    <div class="panel-body">
                        @include('flash::message')

                        <form class="navbar-form navbar-left pull-right" role="search">
                            {{Form::open(['route'=>'productSales.index', 'method'=>'GET', 'class'=> 'navbar-form navbar-left pull-right'])}}

                            <div class="form-group">
                                {{Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Id. Venta'])}}
                            </div>

                            <button type="submit" class="btn btn-success">Buscar</button>
                        </form>

                        <br><br>
                        {!! Form::open(['route' => 'productSales.create', 'method' => 'get', 'class'=>'inline-important']) !!}
                      {!!   Form::submit('Crear detalles', ['class'=> 'btn btn-success'])!!}
                        {!! Form::close() !!}

                      {{--}}  {!! Form::open(['route' => 'tipoencuestas.destroyAll', 'method' => 'delete', 'class'=>'inline-important']) !!}
                        {!!   Form::submit('Borrar todas', ['class'=> 'btn btn-danger','onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
                        {!! Form::close() !!} {{--}}

                        <br><br>
                        <table id="tabla-productSale"  class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Id.Venta</th>
                                <th>Cliente</th>
                                <th>Empleado</th>
                                <th colspan="2">Acciones</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($productSales as $productSale)
                                <tr data-id="{{$productSale->id}}">
                                    <td>{{ $productSale->product->name }}</td>
                                    <td>{{ $productSale->quantity }}</td>
                                    <td>{{ $productSale->sale_id }}</td>
                                    <td>{{ $productSale->sale->client->full_name }}</td>
                                    <td>{{ $productSale->sale->employee->full_name }}</td>



                                    <td>
                                        {!! Form::open(['route'=>
                                        ['productSales.edit', $productSale->id],'method'=>'get']) !!}
                                        {!! Form::submit('Editar',['class'=>'btn btn-success']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['route' =>
                                         ['productSales.destroy',$productSale->id], 'method' => 'delete']) !!}
                                        {!! Form::submit('Borrar',
                                        ['class'=> 'btn btn-success' ,'onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
{{--}}    {!! Form::open(['route' => ['tipoencuestas.destroy',':TIPOENCUESTA_ID'], 'method' => 'delete','id'=>'form-delete']) !!}
    {!! Form::close() !!} {{--}}
@endsection

