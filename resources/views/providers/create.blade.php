@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear proveedor</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' => 'providers.store']) !!}
                        <div class="form-group">
                            {!! Form::label('name', 'Nombre del proveedor') !!}


                        </div>

                        <div class="form-group">
                            {!!Form::label('email', 'Email') !!}

                        </div>

                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection