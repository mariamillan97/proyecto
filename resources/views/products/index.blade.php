@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Productos</div>

                    <div class="panel-body">

                        {!! Form:: open (['route'=>'products.create', 'method'=> 'get']) !!}
                        {!! Form :: submit ('Crear producto', ['class'=>'btn btn-primary']) !!}
                        {!! Form :: close() !!}

                        <br><br>
                        <table class="table table-striped table-bordered">
                               <tr>
                                   <th>Nombre</th>
                                   <th>Precio de compra</th>
                                   <th>Precio de venta</th>
                                   <th>Fecha de caducidad</th>
                                   <th>Stock</th>
                                   <th>Receta</th>
                                   <th colspan="2">Acciones</th>

                               </tr>

                        @foreach ($products as $product)

                            <tr>

                                <td>{{ $product->name}}</td>
                                <td>{{ $product->pricePurchase }}</td>
                                <td>{{ $product->priceSale}}</td>
                                <td>{{ $product->dateOfExpiry }}</td>
                                <td>{{ $product->stock}}</td>
                                <td>{{ $product->prescription }}</td>

                                <td>
                                    {!! Form::open(['route'=>
                                    ['products.edit', $product->id],'method'=>'get']) !!}
                                    {!! Form::submit('Editar',
                                    ['class'=>'btn btn-warning']) !!}
                                    {!! Form::close() !!}
                                </td>
                                <td>
                                    {!! Form::open(['route' =>
                                     ['products.destroy',$product->id], 'method' => 'delete']) !!}
                                    {!! Form::submit('Borrar',
                                    ['class'=> 'btn btn-danger' ,'onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
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