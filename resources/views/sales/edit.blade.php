@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar venta</div>

                    <div class="panel-body">

                        {!! Form::model($sale, [ 'route' => ['sales.update',$sale->id], 'method'=>'PUT']) !!}

                        <div class="form-group">
                            {!! Form::label('paid', 'La venta ha sido o no pagada') !!}


                        </div>

                        <div class="form-group">
                            {!!Form::label('client_id', 'Cliente') !!}
                            <br>
                            {!! Form::select('client_id', $clients, $sale->client_id, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!!Form::label('employee_id', 'Trabajador') !!}
                            <br>
                            {!! Form::select('employee_id', $employess, $sale->employee_id, ['class' => 'form-control']) !!}
                        </div>
                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection