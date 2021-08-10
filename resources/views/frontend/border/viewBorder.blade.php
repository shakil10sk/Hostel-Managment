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
        <h2>Border list View</h2>
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

        <table class="table-striped table table-responsive">
            <thead>
                <th>SI</th>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Father Name</th>
                <th>Father Phone</th>
                <th>Email</th>
                <th>Address</th>
                <th>Photo</th>
                <th>Nid Number</th>
                <th>Room Number</th>
                <th>Action</th>
            </thead>
            @foreach($view as $key => $value)
            <tbody>
                <td>{{ ++$key }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->your_phone }}</td>
                <td>{{ $value->father_name }}</td>
                <td>{{ $value->father_phone }}</td>
                <td>{{ $value->email }}</td>
                <td>{{ $value->address }}</td>
                <td><img src="{{ asset('images/borders/'.$value->photo) }}" alt="" width="50" height="50"></td>
                <td>{{ $value->nid_number }}</td>
                <td>{{ $value->room_id }}</td>
                <td><a href="{{ URL::to('border/edit/'.$value->id) }}">Edit</a> | <a href="{{ URL::to('border/delete/'.$value->id) }}">Delete</a></td>
            </tbody>
            @endforeach
        </table>


    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
