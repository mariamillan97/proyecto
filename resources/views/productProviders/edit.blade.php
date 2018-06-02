@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar relación</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::model($productProvider, [ 'route' =>
                        ['productProviders.update', $productProvider->id], 'method'=>'PUT']) !!}



                        <div class="form-group">
                            {!!Form::label('product_id', 'Producto') !!}
                            <br>
                            {!! Form::select('product_id', $products, $productProvider->product_id, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!!Form::label('provider_id', 'Proveedor') !!}
                            <br>
                            {!! Form::select('provider_id', $providers, $productProvider->provider_id, ['class' => 'form-control']) !!}
                        </div>



                        {!! Form::submit('Guardar',['class'=>'btn-success btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection