@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('DNI') ? ' has-error' : '' }}">
                                <label for="DNI" class="col-md-4 control-label">DNI</label>

                                <div class="col-md-6">
                                    <input id="DNI" type="text" class="form-control" name="DNI" value="{{ old('DNI') }}" required autofocus>

                                    @if ($errors->has('DNI'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('DNI') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('Name') ? ' has-error' : '' }}">
                                <label for="Name" class="col-md-4 control-label">Nombre</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('lastName1') ? ' has-error' : '' }}">
                                <label for="lastName1" class="col-md-4 control-label">Primer apellido</label>

                                <div class="col-md-6">
                                    <input id="lastName1" type="text" class="form-control" name="lastName1" value="{{ old('lastName1') }}" required autofocus>

                                    @if ($errors->has('lastName1'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('lastName1') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('lastName2') ? ' has-error' : '' }}">
                                <label for="lastName2" class="col-md-4 control-label">Segundo apellido</label>

                                <div class="col-md-6">
                                    <input id="lastName2" type="text" class="form-control" name="lastName2" value="{{ old('lastName2') }}" required autofocus>

                                    @if ($errors->has('lastName2'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('lastName2') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('salary') ? ' has-error' : '' }}">
                                <label for="salary" class="col-md-4 control-label">Salario</label>

                                <div class="col-md-6">
                                    <input id="salary" type="text" class="form-control" name="salary" value="{{ old('salary') }}" required autofocus>

                                    @if ($errors->has('salary'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('salary') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}">
                                <label for="number" class="col-md-4 control-label">Teléfono</label>

                                <div class="col-md-6">
                                    <input id="number" type="text" class="form-control" name="number" value="{{ old('number') }}" required>

                                    @if ($errors->has('number'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('number') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="role_id" class="col-md-4 control-label">Rol</label>

                                    <br>
                                    {!! Form::select('role_id', $roles, ['class' => 'form-control', 'required']) !!}

                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>



                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Registrar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
