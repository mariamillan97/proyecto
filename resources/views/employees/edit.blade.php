@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar trabajador</div>

                    <div class="panel-body">


                        {!! Form::model($employee, [ 'route' => ['employees.update',$employee->id], 'method'=>'PUT']) !!}

                        <div class="form-group">
                            {!! Form::label('salary', 'Salario del empleado') !!}


                        </div>

                        <div class="form-group">
                            {!!Form::label('typeEmployee', 'Cargo del empleado') !!}

                        </div>

                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection