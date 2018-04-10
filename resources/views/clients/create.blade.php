@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear cliente</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' => 'clients.store']) !!}
                        <div class="form-group">
                            {!! Form::label('user_id', 'Usuario: cliente') !!}
                            <br>
                            {!! Form::select ('user_id', $users, ['class'=> 'form-control']) !!}

                        </div>

                        <div class="form-group">
                            {!!Form::label('socSecNum', 'Número de la Seguridad Social') !!}

                        </div>

                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection