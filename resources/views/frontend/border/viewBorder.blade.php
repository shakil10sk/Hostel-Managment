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

    <h2>Border list View</h2>
    <h4><a href="/">Home</a></h4>

    <div class="conatainer p-lg-5">

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
                <td>Edit | Delete</td>
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
