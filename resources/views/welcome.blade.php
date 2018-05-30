<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>FARMACIA</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
               /background-color: #fff;
                color: rgba(97, 255, 0, 0.7);
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
                font-size: 120px;
                color: rgba(24, 211, 4, 0.83);
                font-family: "Bauhaus 93";
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

                color: #18d304;
                padding: 0 25px;
                font-size: 18px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;


            }

            .contenido {
                color : #0004ec;
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

    <img src = "https://previews.123rf.com/images/franckito/franckito0709/franckito070900159/1650003-s%C3%ADmbolo-de-la-farmacia-cruz-verde-conectado-a-un-rat%C3%B3n-de-la-computadora-que-sugiere-una-farmacia-en-l%C3%ADnea-.jpg"
         style = "width:180px;height: 100px">

    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Iniciar Sesión</a>
                        <a href="{{ route('register') }}">Registrar</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    FARMACIA
                </div>

                <div class="links">
                    <a>Salud y Vida</a>
                    <br>
                    <br>
                    <a>María Millán Gamero</a>

                </div>
            </div>
        </div>
    </body>
</html>
