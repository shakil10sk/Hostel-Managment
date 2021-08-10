<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>


<div class="container">

    <h3 class="text-center">Order Report</h3>
    <h4><a href="/">Home</a></h4>
    <div class="row">
        <div class="col-md-12 text-center mx-auto">

            <table class="table table-striped table-bordered">
                <thead>
                    <th>Border Name</th>
                    <th>Order Date</th>
                    <th>Total Meal</th>
                    <th> Total Cost</th>
                    <th>Payment ammount</th>
                    <th>Due ammount</th>
                </thead>
                @foreach($report as $key => $value)
                <tbody>

                        <td>{{ $value->name }}</td>
                        <td>{{ $value->order_date }}</td>
                        <td>{{ $value->total_meal }}</td>
                        <td> {{ $value->sub_total }}</td>
                        <td>{{ $value->pay }}</td>
                        <td>{{ $value->due }}</td>

                </tbody>
                @endforeach
            </table>


        </div>
    </div>

</div>








    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
