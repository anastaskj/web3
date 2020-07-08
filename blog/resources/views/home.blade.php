<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Deliver</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #582F58;
                font-family: 'Montserrat', sans-serif;
                font-weight: 200;
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
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .linkHere{
                text-decoration: underline;
                font-weight: 600;   
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body class = "mainbody">
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))

                <div class="top-right links">
                    @if(Auth::guest() && !Auth::guard('admin')->check()) {{--this is for guests only--}}
                        <a href="{{ url('/food') }}">Dishes</a>
                        <a href="{{ route('login') }}">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @elseif(Auth::guest() && Auth::guard('admin')->check()) {{--this is for admins only--}}
                        <a href="{{ url('/admin') }}">Dashboard</a>
                        <a href="{{ url('/food') }}">Dishes</a>
                    @else {{--this is for normal users only--}}
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                        <a href="{{ url('/food') }}">Dishes</a> 
                    @endif
                </div>
            @endif

            <div class="content">

                <div class="title m-b-md">
                    You are welocome to our  <br>online restorant
                </div>
                {{-- <div class = "row" >
                    Apply to join our delivery crew <a href = "#" class = "linkHere">here</a>!
                </div> --}}

                
            </div>
        </div>
    </body>
</html>
