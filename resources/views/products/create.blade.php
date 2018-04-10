@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear producto</div>

                    <div class="panel-body">


                        {!! Form:: open(['route'=> 'products.store']) !!}
                        <div class="form-group">

                        {!! Form:: label ('code', 'Código del producto') !!}

                        //imput

                            /*@foreach para la lista de productos, con dos imputs : checkbox y otro de name, value(true o false)*/

                        </div>

                        <div class="form-group">
                             {!! Form::label ('name', 'Nombre del producto') !!}

                         </div>
                         <div class="form-group">
                            {!! Form::label ('stock', 'Stock Producto') !!}
                         </div>
                        {!! Form:: submit ('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}

                    </div>
                 </div>
             </div>
        </div>
    </div>

@endsection



