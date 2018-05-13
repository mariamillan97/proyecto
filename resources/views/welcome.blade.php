<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
               /background-color: #fff;
                color: rgba(0, 226, 197, 0.7);
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
               /* background-image: url("http://plataforma.enclave4.es/Plateas-theme/images/backgrounds/fondo_login.png");
                background-size: 100%;
                background-color: rgba(15, 74, 155, 0);
                color: #2034b0;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: auto;*/


            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
                /*font-size: 120px;*/
                color: rgba(174, 0, 0, 0.8);
                font-family: Red;
                text-align: left;


            }

            .links > a {
               /* color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;*/

                color: #636b6f;
                padding: 0 25px;
                font-size: 18px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;


            }

            .contenido {
                color : #2e3436;
                font-size: 15px;
                font-weight: 600;
                margin-top: -15%;
                margin-left: 5%;


            }

            .m-b-md {
               /*margin-bottom: 30px;*/
                margin-left: 5%;
                margin-top: -30%;

            }

        </style>
    </head>

    <img src = "http://www.vectorlogo.es/wp-content/uploads/2014/12/logo-vector-universidad-sevilla.jpg"
         style = "width:180px;height: 100px">

    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>
