@extends('admin.layouts.template')

@section('page_title')

All Category Single-Ecom

@endsection

@section('content')


<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span>All Category</h4>


    <!-- Bootstrap Table with Header - Light -->
    <div class="card"
      <h5 class="card-header">Available Category</h5>

      @if(session()->has('message'))
      <div class="alert alert-success">
        {{session()->get('message')}}
      </div>
      @endif




      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead class="table-light">
            <tr>
              <th>Id</th>
              <th>Category Name</th>
              <th>Sub Category</th>
              <th>Product</th>
              <th>Actions</th>
            </tr>
          </thead>





          <tbody class="table-border-bottom-0">

            @foreach ( $category as $categories)

            <tr>
                <td>{{$categories->id }}</td>
                <td>{{$categories->category_name }}</td>
                <td>{{$categories->subcategory_count }}</td>
                <td>{{$categories->slug }}</td>
                <td>
                    <a href="{{ route('editecategory',$categories->id)}}" class="btn btn-primary">Edite</a>
                    <a href="{{ route('deletecategory',$categories->id)}}" class="btn btn-danger">Delete</a>


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
