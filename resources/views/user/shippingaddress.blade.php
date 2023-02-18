@extends('user.layouts.user_template')

@section('user_page-title')


Shipping-address

@endsection

@section('content')


<h2 class="text-info"> Provide Your shipping information</h2>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<div class="row">
    <div class="col-12">
        <div class="box_main">

            <form action="{{ route('addshippingaddress') }}" method="post" enctype="multipart/form-data">
                 @csrf
               <div class="form-group">
                <label for="phone_number"> Phone Number</label>
                <input type="text" name="phone_number" class="form-control" >
               </div>

               <div class="form-group">
                <label for="City-name"> City/Village Name</label>
                <input type="text" name="city_name"  class="form-control">
               </div>

               <div class="form-group">
                <label for="Postal_code"> Postal Code</label>
                <input type="text" class="form-control" name="postal_code">
               </div>

                <div> <input type="submit" class="btn btn-info" value="Next"> </div>
            </form>

        </div>
    </div>
</div>
@endsection
