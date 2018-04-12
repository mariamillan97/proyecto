@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Empleados</div>

                    <div class="panel-body">


                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Nombre</th>
                                <th>Primer Apellido</th>
                                <th>Segundo Apellido</th>
                                <th>Email</th>
                                <th>Teléfono</th>
                                <th>Salario</th>
                                <th>Rol</th>

                            </tr>

                            @foreach ($employees as $employee)


                                <tr>
                                    <td>{{ $employee->user->name }}</td>
                                    <td>{{ $employee->user->lastName1 }}</td>
                                    <td>{{ $employee->user->lastName2 }}</td>
                                    <td>{{ $employee->user->email }}</td>
                                    <td>{{ $employee->user->number}}</td>
                                    <td>{{ $employee->salary }}</td>
                                    <td>{{ $employee->role->name}}</td>
                                    <td>
                                        {!! Form::open(['route' => ['employees.edit',$employee->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['employees.destroy',$employee->id], 'method' => 'delete']) !!}
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