@extends('admin.layouts.template')

@section('page_title')

All Product Single-Ecom

@endsection

@section('content')


<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span>All Product</h4>

    @if(session()->has('message'))
    <div class="alert alert-success">
      {{session()->get('message')}}
    </div>
    @endif



    <!-- Bootstrap Table with Header - Light -->
    <div class="card"
      <h5 class="card-header">Available All Product Information</h5>
      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead class="table-light">
            <tr>
              <th>Id</th>
              <th>Product Name</th>
              <th> Image</th>
              <th>Price</th>
              <th>Actions</th>
            </tr>
          </thead>

          <tbody class="table-border-bottom-0">
            @foreach ($allproduct as $products )


            <tr>
                <td>{{ $products->id }}</td>
                <td>{{ $products->product_name }}</td>
                <td>
                <img style="height:90px"; src="{{ asset($products->product_img )}}" alt="">
                <br>
                <a href="{{ route('editeproductimg',$products->id) }}" class="btn btn-info text-opacity-25">Update image</a>


                </td>
                <td>{{ $products->price }}</td>
                <td>
                    <a href="{{ route('editeproduct',$products->id) }}" class="btn btn-primary">Edite</a>
                    <a href="{{ route('deleteproduct',$products->id) }}" class="btn btn-danger">Delete</a>


                </td>

            </tr>
            @endforeach

          </tbody>

        </table>
      </div>
    </div>
    <!-- Bootstrap Table with Header - Light -->

</div>

@endsection
