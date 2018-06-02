@extends('layouts.app')

<style>
    .card-header{
        color: #008000;
        background-color: #14ec00;
        font-family: 'serif';
        font-size: 40px;
        font-weight: 400;
    }
    .card-body{
        color: #8ce275;
        background-color: rgba(163, 236, 174, 0.01);
        font-family: 'verdana';
        font-size: 40px;
        font-weight: 100;
    }

</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bienvenido a la Farmacia - Salud y Vida</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                        {!! Form::open(['route' => ['sales.index'], 'method' => 'get']) !!}
                        {!! Form::submit('Ver ventas', ['class'=> 'btn btn-success btn-lg'])!!}
                        {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
