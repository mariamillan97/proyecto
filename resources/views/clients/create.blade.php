@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear cliente</div>

                    <div class="panel-body">

                        {!! Form:: open(['route'=> 'clients.index']) !!}

                        <div class="form-group">

                            {!! Form:: label ('DNI', 'DNI del cliente') !!}
                            {!! Form::text('DNI',null,
                            ['class'=>'form-control', 'required', 'autofocus']) !!}

                        </div>


                        <div class="form-group">

                            {!! Form:: label ('name', 'Nombre del cliente') !!}
                            {!! Form::text('name',null,
                            ['class'=>'form-control', 'required', 'autofocus']) !!}

                        </div>

                        <div class="form-group">

                            {!! Form:: label ('lastName1', 'Primer apellido') !!}
                            {!! Form::text('lastName1',null,
                            ['class'=>'form-control', 'required']) !!}

                        </div>


                        <div class="form-group">

                            {!! Form:: label ('lastName2', 'Segundo apellido') !!}
                            {!! Form::text('lastName2',null,
                            ['class'=>'form-control', 'required']) !!}

                        </div>


                        <div class="form-group">

                            {!! Form:: label ('number', 'Telefóno') !!}
                            {!! Form::text('number',null,
                            ['class'=>'form-control', 'required']) !!}

                        </div>

                        <div class="form-group">

                            {!! Form:: label ('socSecNum', 'Número de la Seguridad Social') !!}
                            {!! Form::text('socSecNum',null,
                            ['class'=>'form-control', 'required']) !!}

                        </div>



                        <div class="form-group">

                            {!! Form:: label ('purchasedProducts', 'Cantidad de productos comprados') !!}
                            {!! Form::text('purchasedProducts',null,
                            ['class'=>'form-control', 'required']) !!}

                        </div>



                        <div class="form-group">

                            {!! Form:: label ('debt', '¿Deuda?') !!}
                            {!! Form::text('debt',null,
                            ['class'=>'form-control', 'required']) !!}

                        </div>


                        <div class="form-group">
                            {!!Form::label('email', 'Email del cliente') !!}
                            {!! Form::text('email',null,
                          ['class'=>'form-control', 'required', 'autofocus']) !!}

                        </div>


                        {!! Form:: submit ('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



