@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar cliente</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::model($client, [ 'route' =>
                        ['clients.update',$client->id],
                         'method'=>'PUT']) !!}

                        <div class="form-group">
                            {!!Form::label('DNI', 'DNI del cliente') !!}
                            {!! Form::text('DNI',$client->user->DNI,
                            ['class'=>'form-control', 'required', 'autofocus']) !!}


                        </div>


                        <div class="form-group">
                            {!!Form::label('name', 'Nombre del cliente') !!}
                            {!! Form::text('name',$client->user->name,
                            ['class'=>'form-control', 'required', 'autofocus']) !!}


                        </div>


                        <div class="form-group">
                            {!!Form::label('lastName1', 'Primer apellido del cliente') !!}
                            {!! Form::text('lastName1',$client->user->lastName1,
                           ['class'=>'form-control', 'required']) !!}


                        </div>

                        <div class="form-group">
                            {!!Form::label('lastName2', 'Segundo apellido del cliente') !!}
                            {!! Form::text('lastName2',$client->user->lastName2,
                          ['class'=>'form-control', 'required', 'autofocus']) !!}

                        </div>

                        <div class="form-group">
                            {!!Form::label('email', 'Email del cliente') !!}
                            {!! Form::text('email',$client->user->email,
                          ['class'=>'form-control', 'required', 'autofocus']) !!}

                        </div>

                        <div class="form-group">
                            {!!Form::label('number', 'Número de teléfono del cliente') !!}
                            {!! Form::text('number',$client->user->number,
                          ['class'=>'form-control', 'required', 'autofocus']) !!}

                        </div>

                        <div class="form-group">
                            {!! Form::label('debt','Deuda del cliente') !!}
                            {!! Form::text('debt',$client->debt,
                            ['class'=>'form-control', 'required']) !!}


                        </div>


                        <div class="form-group">
                            {!!Form::label('socSecNum', 'Número de la Seguridad Social del cliente') !!}
                            {!! Form::text('socSecNum', $client->socSecNum,['class'=>'form-control',
                            'required']) !!}
                        </div>



                        <div class="form-group">
                            {!!Form::label('purchasedProducts', 'Número de productos totales comprados') !!}
                            {!! Form::text('purchasedProducts',$client->purchasedProducts,
                            ['class'=>'form-control', 'required']) !!}

                        </div>


                        {!! Form::submit('Editar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
