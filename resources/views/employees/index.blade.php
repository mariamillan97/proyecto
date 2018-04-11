@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Trabajadores</div>

                    <div class="panel-body">
                        {!! Form::open(['route' => 'employess.create', 'method' => 'get']) !!}
                        {!!   Form::submit('Crear empleado', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}

                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Salario</th>
                                <th>Usuario</th>
                                <th>TipoEmpleado</th>

                            </tr>

                            @foreach ($employees as $employee)


                                <tr>
                                    <td>{{ $employee->user }}</td>
                                    <td>{{ $employee->salary }}</td>
                                    <td>{{ $employee->typeEmployee}}</td>
                                    <td>
                                        {!! Form::open(['route' => ['employees.edit',$employee->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['employess.destroy',$employee->id], 'method' => 'delete']) !!}
                                        {!!   Form::submit('Borrar', ['class'=> 'btn btn-danger' ,'onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
                                        {!! Form::close() !!}

                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection