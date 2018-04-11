@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear cita</div>

                    <div class="panel-body">


                        {!! Form::model($client, [ 'route' => ['clients.update',$client->id], 'method'=>'PUT']) !!}

                        <div class="form-group">
                            {!! Form::label('socSecNum', 'Número de la Seguridad Social') !!}


                            //<input type="datetime-local" id="fecha_hora" name="fecha_hora" class="form-control" value="{{Carbon\Carbon::now()->format('Y-m-d\Th:i')}}" />


                        </div>

                        <div class="form-group">
                            {!!Form::label('user_id', 'Usuario:cliente') !!}
                            <br>
                            {!! Form::select('user_id', $users, $client->user_id, ['class' => 'form-control']) !!}
                        </div>
                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
