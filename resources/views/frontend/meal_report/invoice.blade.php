<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="clearfix">
                                <div class="pull-right">
                                    <h4>Order Meal # <br>
                                        <strong>{{ date('d/m/y') }}</strong>
                                    </h4>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 text-left">
                                    <div class="pull-left m-t-5">
                                        <address>
                                            <strong>Name: {{ $border->name }}</strong><br>
                                            Address: {{ $border->address }}<br>
                                            Phone: {{ $border->your_phone }}
                                            <br>
                                        </address>

                                    </div>
                                </div>
                                <div class="col-md-6 text-right">
                                    <div class="pull-right m-t-5">
                                        <p><strong>Order Date: </strong>
                                            {{ date("l jS \of F Y") }}</p>
                                        <p class="m-t-5"><strong>Order Status: </strong> <span
                                                class="label label-pink">Active</span></p>
                                        @php
                                            // $order=DB::table('orders')->select('id')->first();
                                            $i=1;
                                        @endphp

                                        <p class="m-t-5"><strong>Order ID: </strong> #202100{{ ++$i }}
                                            {{-- {{ $order++ }} --}}

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- list of order item --}}
                        <div class="m-h-5"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table m-t-5">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Item</th>
                                                <th>Quantity</th>
                                                <th>Unit Cost</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $sl=0;
                                            @endphp
                                            @foreach($contents as $row)
                                                <tr>
                                                    <td>{{ ++$sl }}</td>
                                                    <td>{{ $row->name }}</td>
                                                    <td>{{ $row->qty }}</td>
                                                    <td>{{ $row->price }}</td>
                                                    <td>{{ $row->price*$row->qty }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{--end  list of order item --}}
                        <div class="row" style="border-radius: 0px;">
                            <div class="col-md-12 col-md-offset-9">
                                <hr>
                                <div>
                                    <p class="text-right"><b>Sub-total:</b> {{ Cart::subtotal() }}</p>

                                    <hr>
                                    <h3 class="text-right">Total:- {{ Cart::subtotal() }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-right ">
                                <div class="hidden-print">
                                    <div class="pull-right">
                                        <a href="#" onclick="window.print()"
                                            class="btn btn-inverse waves-effect waves-light bg-info"><i
                                                class="fa fa-print"></i></a>
                                        <a href="#" class="btn btn-primary waves-effect waves-light"
                                            data-toggle="modal" data-target="#con-close-modal">Submit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- invoice of payment --}}
        <form class="container" action="{{ url('/final-invoice') }}" method="post">
            @csrf
            <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title text-info">Invoice Of {{ $border->name }}
                                <span class="pull-right">Total: {{ Cart::subtotal() }}</span></h4>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="field-1" class="control-label">Payment<span class="text-danger">
                                                *</span></label>
                                        <select name="payment_status" id="" class="form-control">
                                            <option value="handcash"> Hand Cash </option>
                                            <option value="cheack"> Cheack </option>
                                            <option value="due"> Due </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="field-2" class="control-label">Pay<span class="text-danger">
                                                *</span></label>
                                        <input type="text" class="form-control" id="field-2" name="pay"
                                            placeholder="payment amount">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="field-3" class="control-label">Due<span class="text-danger">
                                                *</span></label>
                                        <input type="text" class="form-control" id="field-3" name="due"
                                            placeholder="Due Amount">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="border_id" value="{{ $border->id }}">
                            <input type="hidden" name="order_date" value="{{ date('d/m/y') }}">
                            <input type="hidden" name="order_status" value="Active">
                            <input type="hidden" name="total_meal" value="{{ Cart::count() }}">
                            <input type="hidden" name="sub_total" value="{{ Cart::subtotal() }}">
                            {{-- <input type="hidden" name="vat" value="{{ Cart::tax() }}"> --}}
                            <input type="hidden" name="vat" value="0">
                            <input type="hidden" name="total" value="{{ Cart::subtotal() }}">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect"
                                    data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-info waves-effect waves-light">Save
                                    changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal -->
        </form>
        {{-- end of payment invoice --}}
    </div>
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
