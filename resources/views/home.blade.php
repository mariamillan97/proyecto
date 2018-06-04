@extends('layouts.app')

<style>
    .card-header{
        color: #008000;
        background-color: rgb(216, 247, 187);
        font-family: 'serif';
        font-size: 50px;
        font-weight: 400;


    }
    .card-body{
        color: #8ce275;
        background-color: rgb(216, 247, 187);
        font-family: 'verdana';
        font-size: 30px;
        font-weight: 100;
        margin: 10%
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

                        <img src = "http://bichibye.com/wp-content/uploads/2017/04/lupa.png"
                             style = "width:100px;height: 100px;">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
