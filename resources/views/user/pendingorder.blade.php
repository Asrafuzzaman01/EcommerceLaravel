@extends('user.layouts.user_profile_template')
@section('userprofile_content')

pending order page

@if(session()->has('message'))
      <div class="alert alert-success">
        {{session()->get('message')}}
      </div>
      @endif



      <table class="table">

        <th>product id</th>
        <th>price</th>

        @foreach ($pending_orders as $order )
        <tr>
            <td>{{ $order->product_name }}</td>
            <td>{{ $order->total_price }}</td>

        </tr>

        @endforeach




      </table>
@endsection
