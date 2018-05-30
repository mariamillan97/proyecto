@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Detalles</div>

                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'productSales.create', 'method' => 'get']) !!}
                        {!!  Form::submit('Crear Línea Venta', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}

                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Venta</th>

                                <th colspan="2">Acciones</th>
                            </tr>

                            @foreach ($productSales as $productSale)


                                <tr>
                                    <td>{{ $productSale->product->name }}</td>
                                    <td>{{ $productSale->quantity }}</td>
                                    <td>{{ $productSale->sale_id }}</td>

                                    <td>
                                        {!! Form::open(['route' => ['productSales.edit',$productSale->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['productSales.destroy',$productSale->id], 'method' => 'delete']) !!}
                                        {!!   Form::submit('Borrar', ['class'=> 'btn btn-danger' ,'onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
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