@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar proveedor</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::model($provider, [ 'route' =>
                        ['providers.update',$provider->id], 'method'=>'PUT']) !!}

                        <div class="form-group">
                            {!! Form::label('name', 'Nombre del proveedor') !!}
                           {!!  Form::text('name',$provider->name,
                            ['class'=>'form-control', 'required', 'autofocus']) !!}

                        </div>

                        <div class="form-group">
                            {!! Form::label('address', 'Dirección del proveedor') !!}
                            {!!  Form::text('address',$provider->address,
                             ['class'=>'form-control', 'required']) !!}

                        </div>

                        <div class="form-group">
                            {!! Form::label('email', 'Email del proveedor') !!}
                            {!!  Form::text('email',$provider->email,
                             ['class'=>'form-control', 'required']) !!}

                        </div>

                        <div class="form-group">
                            {!! Form::label('number', 'Número de teléfono del proveedor') !!}
                            {!!  Form::text('number',$provider->number,
                             ['class'=>'form-control', 'required']) !!}

                        </div>


                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection