@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Línea Venta</div>

                    <div class="panel-body">

                        {{ Form::open(['url'=>'/cantidadProducto/'.$sale->id])}}

                        <div class="form-group">
                            {!!Form::label('product_id', 'Añadir producto') !!}
                            <br>
                            {!! Form::select('product_id', $products, ['class' => 'form-control', 'required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('quantity') !!}
                            {!! Form::text('quantity',null,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>


                        {!! Form::submit('Añadir producto',['class'=>'btn-primary btn']) !!}
                        {{ Form::close() }}

                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>

                                <th colspan="5">Acciones</th>
                            </tr>


                            @if(isset($sale->products))

                                @foreach ($sale->products as $product)


                                    <tr>
                                        <td>{{ $product->name}}</td>
                                        <td>{{ $product->pivot->quantity }}</td>

                                        <td>
                                            {{Form::open(array('action'=> array('ConsultaController@borrarProducto', $product->id, $sale->id)))}}
                                            {!! Form::submit('Borrar', ['class'=> 'btn btn-danger' ,'onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>

                                @endforeach
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection