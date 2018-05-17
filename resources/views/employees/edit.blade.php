@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar trabajador</div>

                    <div class="panel-body">


                        {!! Form::model($employee, [ 'route' =>
                        ['employees.update',$employee->id],
                        'method'=>'PUT']) !!}

                        <div class="form-group">
                            {!! Form::label('name', 'Nombre del empleado') !!}
                            {!! Form::text('name',$employee->user->name,
                            ['class'=>'form-control', 'required', 'autofocus']) !!}


                        </div>

                        <div class="form-group">
                            {!! Form::label('lastName1', 'Primer apellido del empleado') !!}
                            {!! Form::text('lastName1',$employee->user->lastName1,
                            ['class'=>'form-control', 'required']) !!}


                        </div>

                        <div class="form-group">
                            {!! Form::label('lastName2', 'Segundo apellido del empleado') !!}
                            {!! Form::text('lastName2',$employee->user->lastName2,
                            ['class'=>'form-control', 'required']) !!}


                        </div>

                        <div class="form-group">
                            {!! Form::label('email', 'Email del empleado') !!}
                            {!! Form::text('email',$employee->user->email,
                            ['class'=>'form-control', 'required']) !!}


                        </div>


                        <div class="form-group">
                            {!! Form::label('number', 'Número de teléfono del empleado') !!}
                            {!! Form::text('number',$employee->user->number,
                            ['class'=>'form-control', 'required']) !!}


                        </div>

                        <div class="form-group">
                            {!! Form::label('salary', 'Salario del empleado') !!}
                            {!! Form::text('salary',$employee->salary,['class'=>'form-control', 'required']) !!}


                        </div>

                        <div class="form-group">
                            {!!Form::label('role_id', 'Rol empleado') !!}
                            <br>
                            {!! Form::select('role_id', $role, $employee->role_id, ['class' => 'form-control', 'required']) !!}
                        </div>

                        {!! Form::submit('Editar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection