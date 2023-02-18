@extends('admin.layouts.template')
@section('page_title')

Pending order Single-Ecom

@endsection

@section('content')




<vid class="container">

    <div class="card">

        <div class="card-title">
            <h2 class="text-info"> Pending Orders</h2>
        </div>

            <div class="card-body">


                <table class="table">

                    <tr>
                        <th>User Id</th>
                        <th>Shipping information</th>
                        <th>Product Id</th>
                        <th>Quantity</th>
                        <th>Total will Pay</th>

                        <th>Action</th>
                    </tr>

                    @foreach ( $pending_orders as $orders )
                    <tr>

                      <td>{{ $orders->user_id }}</td>
                      <td>

                        <ul>

                            <li>Phone number- {{ $orders->shipping_phonenumber }}</li>
                            <li>City- {{ $orders->shipping_city }}</li>
                            <li>Postal Code- {{ $orders->shipping_postalcode }}</li>

                        </ul>

                      </td>

                      <td>{{ $orders->product_name }}</td>
                      <td>{{ $orders->quantity }}</td>
                      <td>{{ $orders->total_price }}</td>

                      <td> <a href="" class="btn btn-primary"> Approve Now</a></td>




                    </tr>



                    @endforeach



                </table>


            </div>


    </div>
</vid>

@endsection
