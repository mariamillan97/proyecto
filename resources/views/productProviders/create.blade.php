@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear relación</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' => 'productProviders.store']) !!}



                        <div class="form-group">
                            {!!Form::label('product_id', 'Producto') !!}
                            <br>
                            {!! Form::select('product_id', $products, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!!Form::label('provider_id', 'Proveedor') !!}
                            <br>
                            {!! Form::select('provider_id', $providers, ['class' => 'form-control']) !!}
                        </div>



                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection