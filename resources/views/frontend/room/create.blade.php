<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
         {{-- navber section --}}
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center mx-auto">

                <nav class="navbar navbar-expand-lg navbar-info bg-dark">
                    {{-- <a class="navbar-brand" href="/">Public Hostel</a> --}}
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/border/create"><span
                                        class="text-uppercase font-weight-bolder">Border Registraion</span></a></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/border/view"><span
                                        class="text-uppercase font-weight-bolder">Border View</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/room/create"><span
                                        class="text-uppercase font-weight-bolder">New Room ADD</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/room/view"><span
                                        class="text-uppercase font-weight-bolder">View Room</span> </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/meals/create"><span
                                        class="text-uppercase font-weight-bolder">ADD Meals</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/meals/view"><span
                                        class="text-uppercase font-weight-bolder">View Meals</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/order/view"><span
                                        class="text-uppercase font-weight-bolder">Order Meal</span></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="/order/report"><span
                                        class="text-uppercase font-weight-bolder">Your Order Report</span></a>
                            </li>
                        </ul>
                    </div>
                </nav>

            </div>
        </div>
    </div>
    {{-- end Navbar --}}





    <div class="conatainer p-lg-5">
        <h1> New Room ADD</h1>
        <div>
            @if(Session::get('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    @if(Session::get('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
            @endif
            <form action="/room/store" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-12 text-center mx-auto">
                        <div>
                            <label for="room_num">Room Number</label>
                            <input type="text" id="room_num" name="room_num" placeholder="Enter Room Number">
                        </div>
                        <br>
                        <div>
                            <label for="flor_num">Floor number</label>
                            <input type="text" id="flor_num" name="floor_num" placeholder="Enter Flor number">
                        </div>
                        <br>
                        <div>
                            <label for="status">status</label>
                            <input type="radio" id="open" name="status" value="Open">
                          ?? <label for="open">Open</label><br>
                          ?? <input type="radio" id="css" name="status" value="Booked">
                          ?? <label for="css">Booked</label><br>

                        </div>
                    </div>
                </div>
                <div class=" text-center">
                    <input class="text-center" type="submit" value="submit">
                </div>
            </form>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
