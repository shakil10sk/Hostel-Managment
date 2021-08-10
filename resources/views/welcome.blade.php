<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Hostel Managment System</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
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
                font-size: 64px;
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

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md bg-secondary">
                    <span class="text-info font-weight-bolder text-uppercase">Hostel Managment</span>
                </div>


                <nav class="navbar navbar-expand-lg navbar-info bg-dark">
                    {{-- <a class="navbar-brand" href="/">Public Hostel</a> --}}
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                          <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="/border/create"><span class="text-uppercase font-weight-bolder">Border Registraion</span></a></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/border/view"><span class="text-uppercase font-weight-bolder">Border View</span></a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="/room/create"><span class="text-uppercase font-weight-bolder">New Room ADD</span></a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="/room/view"><span class="text-uppercase font-weight-bolder">View Room</span> </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="/meals/create"><span class="text-uppercase font-weight-bolder">ADD Meals</span></a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="/meals/view"><span class="text-uppercase font-weight-bolder">View Meals</span></a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="/order/view"><span class="text-uppercase font-weight-bolder">Order Meal</span></a>
                          </li>

                          <li class="nav-item">
                            <a class="nav-link" href="/order/report"><span class="text-uppercase font-weight-bolder">Your Order Report</span></a>
                          </li>
                      </ul>
                    </div>
                  </nav>

                {{-- <div class="links">

                        <ul class="list-group">
                            <li class="m-3"> <a href="/border/create">Border Create</a></li>
                            <li class="m-3"> <a href="/border/view">Border Lists</a></li>
                            <li class="m-3"><a href="/room/create">Room Create</a></li>
                            <li class="m-3"><a href="/room/view">View Room</a></li>
                            <li class="m-3"><a href="/meals/create">Create meals Prices</a></li>
                            <li class="m-3"> <a href="/meals/view">meals Status View</a></li>
                            <li class="m-3"> <a href="/order/view">Order</a></li>
                            <li class="m-3"> <a href="/order/report">Order Report</a></li>
                            <li class="m-3"> <a href="https://github.com/shakil10sk/Hostel-Managment">GitHub</a></li>
                        </ul>

                </div> --}}
            </div>
        </div>
    </body>
</html>
