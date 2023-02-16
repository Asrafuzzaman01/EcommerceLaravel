@extends('user.layouts.user_template')

@section('user_page-title')


add-card-page

@endsection

@section('content')
<h2>Add to cart page</h2>
@if(session()->has('message'))
      <div class="alert alert-success">
        {{session()->get('message')}}
      </div>
      @endif


      <div class="row">
        <div class="col-12">
            <div class="box_main">
                <div class="table-responsive">

                    <table class="table">
                        <tr>
                            <th>Product Name</th>
                            <th>Image</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Action</th>
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
                            <td> <img src="{{asset($productimg)}}" style="height: 100px"></td>
                            <td>{{ $items->quantity }}</td>
                            <td>{{ $items->price }}</td>
                            <td><a href="{{ route('removeitem', $items->id) }}" class="btn btn-warning">Remove</a></td>
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


      </div>
@endsection
