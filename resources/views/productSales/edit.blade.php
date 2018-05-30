@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">~Editar línea Venta</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::model($productSale, [ 'route' => ['productSales.update',$productSale->id], 'method'=>'PUT']) !!}

                        <div class="form-group">
                            {!! Form::label('quantity', 'Cantidad producto') !!}

                            {!! Form::number('quantity',$productSale->product_id, ['class'=>'form-control', 'required', 'autofocus']) !!}

                        </div>

                        <div class="form-group">
                            {!!Form::label('product_id', 'Producto') !!}
                            <br>
                            {!! Form::select('product_id', $products, $productSale->product_id, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!!Form::label('sale_id', 'Venta') !!}
                            <br>
                            {!! Form::select('sale_id', $sales, $productSale->sale_id, ['class' => 'form-control']) !!}
                        </div>

                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection