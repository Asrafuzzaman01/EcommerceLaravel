@extends('user.layouts.user_template')

@section('user_page-title')


checkout-page

@endsection

@section('content')
<h1 class="text-center text-info"> Final step to place your order  </h1>
<div class="row">
    <div class="col-5">
        <div class="main_box">
            <h3>Product Will sent At-</h3>

            <p>City/Village Name- {{ $shippingaddress->city_name}}</p>
            <p>Postal Code- {{ $shippingaddress->postal_code}}</p>
            <p>phone number- {{ $shippingaddress->phone_number }}  </p>


        </div>
    </div>

    <div class="col-7">
        <div class="main_box">
       <h3 class="text-center">Your final products Are-</h3>

       <div class="table-responsive">

        <table class="table">
            <tr>
                <th>Product Name</th>
                <th>Image</th>
                <th>Quantity</th>
                <th>Price</th>

            </tr>

                @php
                $total=0;

                @endphp
            @foreach ($cartitem as $items )


            <tr>
            @php
            $productname=App\Models\product::where('id',$items->product_id)->value('product_name');
            $productimg=App\Models\product::where('id',$items->product_id)->value('product_img');
            @endphp

                <td>{{$productname}}</td>
                <td> <img src="{{asset($productimg)}}" style="height:80px"></td>
                <td>{{ $items->quantity }}</td>
                <td>{{ $items->price }}</td>

            </tr>

            @php

            $total=$total+$items->price;

          @endphp

            @endforeach



            <tr>
                <td></td>
                <td></td>
                <td class="text-info  ">Total Amount =</td>
                <td class="text-info">${{ $total }}</td>





            </tr>



        </table>

    </div>


    </div>
</div>

<form action="{{ route('placeorder') }}" method="post">
    @csrf
    <input type="submit"  value="Cancel Order" class="btn btn-danger mr-4 p-2 ">



</form>

<form action="{{ route('placeorder') }}" method="post">
    @csrf
    <input type="submit" value=" Confirm Order" class="btn btn-primary p-2">


</form>


</div>

@endsection
