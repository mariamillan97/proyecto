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
                background-image: url("http://www.cofm.es/recursos/img/portal/2015/03/09/fondo-farmacia-mini-1181x500.jpg");
                background-color: #a3ecae;
                color: rgba(14, 175, 5, 0.73);
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;


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
                font-size: 50px;
                font-size: 150px;
                color: rgb(36, 124, 0);
                font-family: "Microsoft PhagsPa";
                text-align: left;


            }

            .links > a {


                color: rgba(0, 0, 0, 0.8);
                padding: 0 25px;
                font-size: 20px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;


            }

            .contenido {
                color : #000000;
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
  {{--}}  <img src = "https://previews.123rf.com/images/franckito/franckito0709/franckito070900159/1650003-s%C3%ADmbolo-de-la-farmacia-cruz-verde-conectado-a-un-rat%C3%B3n-de-la-computadora-que-sugiere-una-farmacia-en-l%C3%ADnea-.jpg"
         style = "width:380px;height: 200px"> {{--}}


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

                <br>
                <div class="links">
                    <a>Salud y Vida</a>
                    <br>
                    <br>
                    <a>Av. Reina Mercedes 47</a>
                    <br>
                    <br>
                    <a>María Millán Gamero</a>



                </div>
            </div>
        </div>
    </body>

</html>
