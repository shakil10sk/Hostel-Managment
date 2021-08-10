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

    <h1> New Room ADD</h1>
    <h4><a href="/">Home</a></h4>
    <h4><a href="/room/view">Room View</a></h4>

    <div class="conatainer p-lg-5">
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
                            <select name="status" id="">
                                <option value="open">Open</option>
                                <option value="Booked">Book</option>
                            </select>

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
