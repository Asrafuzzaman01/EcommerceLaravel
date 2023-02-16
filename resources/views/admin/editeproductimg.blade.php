@extends('admin.layouts.template')
@section('page_title')

Edite Product-image Single-Ecom

@endsection

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span>Update Product Image</h4>

    <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Edite Product image</h5>
                      <small class="text-muted float-end">Update new image</small>
                 @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif
                    </div>

                    <div class="card-body">



            <form action="{{ route('updateproductimg') }}" method="post" enctype="multipart/form-data">
                        @csrf



                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">previous image</label>
                          <div class="col-sm-10">
                            <img style="height:150px"; src="{{ asset($productimg->product_img )}}" alt="">

                          </div>
                        </div>

                        <input type="hidden" value="{{ $productimg->id }}" name="id">



                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Upload new Product Image</label>
                            <div class="col-sm-10">
                              <input type="file" class="form-control" id="product_img"  name="product_img"  />
                            </div>
                          </div>


                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Edite Product Image</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
</div>


@endsection
