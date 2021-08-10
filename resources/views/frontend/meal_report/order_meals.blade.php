<!doctype html>
<html lang="en">

<head>
    <title>Order Meal</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <h4><a href="/">Home</a></h4>
    <div class="pb-5">
        <div class="row  pb-5">
            <div class="col-md-12 text-center bg-info">
                <h3>Order Your Today's Meals </h3>
                <h4 class="pull-right">Today:- {{ date('d/m/y') }}</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 pb-5">
                <div class="text-center">
                    <ul class="" style="border:1px solid gray">
                        <table class="table table-responsive">
                            <thead class="bg-info">
                                <tr>
                                    <th class="text-center text-white">Meal Name</th>
                                    <th class="text-center text-white">Meal Qty</th>
                                    <th class="text-center text-white">Price</th>
                                    <th class="text-center text-white">Sub Total</th>
                                    <th class="text-center text-white">Action</th>
                                </tr>
                            </thead>
                            @php
                                $cart=Cart::content()
                            @endphp
                            <tbody>
                                @foreach($cart as $meal)
                                    <tr>
                                        <td class="text-center">{{ $meal->name }}</td>
                                        <td class="text-center">
                                            <form
                                                action="{{ url('/cart-update/'.$meal->rowId ) }}"
                                                method="POST">
                                                @csrf
                                                <input type="number" name="qty" value="{{ $meal->qty }}"
                                                    style="width: 50px">
                                                <button type="submit" class="btn btn-sm btn-success"
                                                    style="margin-top:-2px;">
                                                    <i class="fa fa-check "></i></button>
                                            </form>
                                        </td>
                                        <td class="text-center">{{ $meal->price }}</td>
                                        <td class="text-center">{{ $meal->price*$meal->qty }}
                                        </td>
                                        <td class="text-center"><a
                                                href="{{ url('/cart-remove/'.$meal->rowId) }}">
                                                <i class="fa fa-trash fa-2x text-danger"></a></i>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </ul>
                    <div class="pricing-footer  bg-info">
                        <p style="font-size:19px;"> Quantity: {{ Cart::count() }}</p>
                        <h2 class="text-white text-center m-0">Total:- {{ Cart::subtotal() }}
                        </h2>

                        <form action="{{ url('/invoice') }}" method="post">
                            @csrf
                            <div class="panel"><br><br>
                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @php
                                    $border=DB::table('borders')->get();
                                @endphp
                                <select name="border_id" id="" class="form-control">
                                    <option value="" disabled="" selected="">===Select Customar===</option>
                                    @foreach($border as $border)
                                        <option value="{{ $border->id }}">{{ $border->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <input type="hidden" name="border_id" value="{{ $border->id }}"> --}}

                            <button type="submit" class="btn btn-success ">Create Invoice</button>
                        </form>
                    </div>

                </div>
            </div>


            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Meal Price</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Meal Name</th>
                                            <th>Meal Price</th>
                                            <th>Select</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($data as $key=>$value)

                                            <tr class="text-center">
                                                <form action="/add-cart" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $value->id }}">
                                                    <input type="hidden" name="name" value="{{ $value->meal_name }}">
                                                    <input type="hidden" name="qty" value="1">
                                                    <input type="hidden" name="price"
                                                        value="{{ $value->meal_price }}">
                                                    <td>{{ $value->meal_name }}</td>
                                                    <td>{{ $value->meal_price }}</td>
                                                    <td> <button type="submit" class="btn btn-sm"><i
                                                                class="fa fa-plus-square fa-2x text-info"></i></button>
                                                    </td>
                                                </form>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Row -->
        <!-- End Meal view Section-->
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
