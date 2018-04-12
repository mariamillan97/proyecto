@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar producto</div>

                    <div class="panel-body">
                        {!! Form::model ($product, ['route'=>
                        ['products.update', $product->id], 'method'=>'PUT'])  !!}


                        <div class="form-group">
                            {!! Form::label ('name', 'Nombre del producto')!!}
                           {!!  Form::text('name',$product->name,
                            ['class'=>'form-control', 'required', 'autofocus']) !!}

                        </div>

                        <div class="form-group">
                            {!! Form::label ('pricePurchase', 'Precio de compra del producto')!!}
                            {!!  Form::text('pricePurchase',$product->pricePurchase,
                             ['class'=>'form-control', 'required']) !!}

                        </div>

                        <div class="form-group">
                            {!! Form::label ('priceSale', 'Precio de venta del producto')!!}
                            {!!  Form::text('priceSale',$product->priceSale,
                             ['class'=>'form-control', 'required']) !!}

                        </div>

                        <div class="form-group">
                            {!! Form::label ('dateOfExpiry', 'Fecha de caducidad del producto')!!}
                            {!!  Form::text('dateOfExpiry',$product->dateOfExpiry,
                             ['class'=>'form-control', 'required']) !!}

                        </div>

                        <div class="form-group">
                            {!! Form::label ('stock', 'Cantidad disponible del producto')!!}
                            {!!  Form::text('stock',$product->stock,
                             ['class'=>'form-control', 'required']) !!}

                        </div>

                        <div class="form-group">
                            {!! Form::label ('prescription', 'Necesidad de receta del producto')!!}
                            {!!  Form::text('prescription',$product->prescription,
                             ['class'=>'form-control', 'required']) !!}

                        </div>


                        {!! Form:: submit ('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection