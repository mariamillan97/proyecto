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
                                   <th>Código</th>
                                   <th>Nombre</th>
                                   <th>Stock</th>
                               </tr>

                        @foreach ($products as $product)

                            <tr>

                                <td>{{ $product->code }}</td>
                                <td>{{ $product->name}}</td>
                                <td>{{ $product->stock}}</td>

                                <td>
                                    {!! Form::open(['route'=>['products.edit', $product->id],'method'=>'get']) !!}
                                    {!! Form::submit('Editar', ['class'=>'btn btn-warning']) !!}
                                    {!! Form::close() !!}
                                </td>
                                <td>
                                    {!! Form::open(['route' => ['products.destroy',$product->id], 'method' => 'delete']) !!}
                                    {!! Form::submit('Borrar', ['class'=> 'btn btn-danger' ,'onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
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