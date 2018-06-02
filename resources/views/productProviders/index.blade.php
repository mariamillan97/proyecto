@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Producto-Proveedor</div>

                    <br>

                    <div class="panel-body">
                        @include('flash::message')



                        <br><br>

                        {!! Form::open(['route' => 'productProviders.create', 'method' => 'get', 'class'=>'inline-important']) !!}
                       {!!   Form::submit('Crear relación', ['class'=> 'btn btn-success'])!!}
                        {!! Form::close() !!}


                        <br><br>

                        <table id="tabla-productProvider"  class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Provider</th>
                                <th>Email</th>

                                <th colspan="2">Acciones</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($productProviders as $productProvider)
                                <tr data-id="{{$productProvider->id}}">
                                    <td>{{ $productProvider->product->name }}</td>
                                    <td>{{ $productProvider->provider->name }}</td>
                                    <td>{{ $productProvider->provider->email }}</td>

                                    <td>
                                        {!! Form::open(['route'=>
                                        ['productProviders.edit', $productProvider->id],'method'=>'get']) !!}
                                        {!! Form::submit('Editar',['class'=>'btn btn-success']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['route' =>
                                         ['productProviders.destroy',$productProvider->id], 'method' => 'delete']) !!}
                                        {!! Form::submit('Borrar',
                                        ['class'=> 'btn btn-success' ,'onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{--}}    {!! Form::open(['route' => ['tipoencuestas.destroy',':TIPOENCUESTA_ID'], 'method' => 'delete','id'=>'form-delete']) !!}
        {!! Form::close() !!} {{--}}
@endsection

