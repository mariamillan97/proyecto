@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear producto</div>

                    <div class="panel-body">
                        @include('flash::message')


                        {!! Form:: open(['route'=> 'products.store']) !!}


                        <div class="form-group">

                            {!! Form:: label ('name', 'Nombre del producto') !!}
                            {!! Form::text('name',null,
                            ['class'=>'form-control', 'required', 'autofocus']) !!}

                        </div>

                        <div class="form-group">

                            {!! Form:: label ('pricePurchase', 'Precio de compra del producto') !!}
                            {!! Form::text('pricePurchase',null,
                            ['class'=>'form-control', 'required']) !!}

                        </div>

                        <div class="form-group">

                            {!! Form:: label ('priceSale', 'Precio de venta del producto') !!}
                            {!! Form::text('priceSale',null,
                            ['class'=>'form-control', 'required']) !!}

                        </div>

                        <div class="form-group">

                            {!! Form:: label ('dateOfExpiry', 'Fecha de caducidad del producto') !!}
                            {!! Form::text('dateOfExpiry',null,
                            ['class'=>'form-control', 'required']) !!}

                        </div>


                        <div class="form-group">

                            {!! Form:: label ('stock', 'Cantidad disponible del producto') !!}
                            {!! Form::text('stock',null,
                            ['class'=>'form-control', 'required']) !!}

                        </div>



                        <div class="form-group">
                            {!! Form::label('prescription', 'Necesidad de receta del producto') !!}
                            <br>

                            <input name = "prescription" type = "radio" value = "0" > No <br>

                            <input name = "prescription" type = "radio" value = "1" > Sí


                        </div>


                        {!! Form:: submit ('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}

                    </div>
                 </div>
             </div>
        </div>
    </div>

@endsection



