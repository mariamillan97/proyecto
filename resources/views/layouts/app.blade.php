<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Farmacia') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div style="background-color:rgba(84,255,94,0.19)" >
     <div style=" font-family:'Arial' ">
         <div id="app">
         <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
             <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Farmacia') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                    <a href="{{ url('/home') }}"> Home </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Cerrar Sesión
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>



                                    <a class="dropdown-item" href="{{ route('sales.index') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('sale-form').submit();">
                                        Ventas

                                    </a>

                                    <form id="sale-form" action="{{ route('sales.index') }}" method="GET" style="display: none;">
                                        @csrf
                                    </form>


                                    <a class="dropdown-item" href="{{ route('products.index') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('product-form').submit();">
                                        Productos

                                    </a>

                                    <form id="product-form" action="{{ route('products.index') }}" method="GET" style="display: none;">
                                        @csrf
                                    </form>

                                    <a class="dropdown-item" href="{{ route('clients.index') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('client-form').submit();">
                                        Clientes

                                    </a>

                                    <form id="client-form" action="{{ route('clients.index') }}" method="GET" style="display: none;">
                                        @csrf
                                    </form>


                                    <a class="dropdown-item" href="{{ route('employees.index') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('employee-form').submit();">
                                        Empleados

                                    </a>

                                    <form id="employee-form" action="{{ route('employees.index') }}" method="GET" style="display: none;">
                                        @csrf
                                    </form>


                                    <a class="dropdown-item" href="{{ route('providers.index') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('provider-form').submit();">
                                        Proveedores

                                    </a>

                                    <form id="provider-form" action="{{ route('providers.index') }}" method="GET" style="display: none;">
                                        @csrf
                                    </form>


                                    <a class="dropdown-item" href="{{ route('productSales.index') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('productSale-form').submit();">
                                        Detalles

                                    </a>

                                    <form id="productSale-form" action="{{ route('productSales.index') }}" method="GET" style="display: none;">
                                        @csrf
                                    </form>

                                    <a class="dropdown-item" href="{{ route('productProviders.index') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('productProvider-form').submit();">
                                        Productos-Proveedores

                                    </a>

                                    <form id="productProvider-form" action="{{ route('productProviders.index') }}" method="GET" style="display: none;">
                                        @csrf
                                    </form>


                                </div>

                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
     </div>
    </div>
 </body>
</html>
