@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear producto</div>

                    <div class="panel-body">
                        {!! Form::model ($product, ['route'=>['products.update', $product->id], 'method'=>'PUT'])  !!}

                        <div class="form-group">

                            {!! Form:: label ('code', 'Código del producto') !!}

                            //imput

                        </div>

                        <div class="form-group">
                            {!! Form::label ('name', 'Nombre del producto') !!}

                        </div>
                        <div class="form-group">
                            {!! Form::label ('stock', 'Stock Producto') !!}
                        </div>
                        {!! Form:: submit ('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection