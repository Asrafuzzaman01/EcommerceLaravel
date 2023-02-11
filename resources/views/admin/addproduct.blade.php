@extends('admin.layouts.template')
@section('page_title')

Add Product Single-Ecom

@endsection

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span>Add Products</h4>

    <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Add Products</h5>
                      <small class="text-muted float-end">add new products</small>
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

            <form action="{{ route('storeproduct') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Product Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="product_name"  name="product_name" />
                          </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Product Price</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="price"  name="price" placeholder="$0" />
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Product Quantity</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="productquantity"  name="productquantity"  />
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-message">Short Description</label>
                            <div class="col-sm-10">
                              <textarea

                                class="form-control"
                                id="product_short_des" name="product_short_des"
                                placeholder="short description"
                                aria-label="Hi, Do you have a moment to talk Joe?"
                                aria-describedby="basic-icon-default-message2"
                              ></textarea>
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-message">Long Description</label>
                            <div class="col-sm-10">
                              <textarea

                                class="form-control"
                                id="product_long_des" name="product_long_des"
                                placeholder="Long Description"
                                aria-label="long Description"
                                aria-describedby="basic-icon-default-message2"
                              ></textarea>
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Select Category</label>
                            <div class="col-sm-10">

                                <select class="form-select" id="product_category_id" name="product_category_id" aria-label="selecet this Menu">
                                  <option selected>Open this select menu</option>

                                  @foreach ($category as $categories )
                                  <option value="{{$categories-> id }}">{{$categories->category_name  }}</option>
                                  @endforeach



                                </select>
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Select Sub Category</label>
                            <div class="col-sm-10">

                                <select class="form-select" id="propduct_subcategorey_id" name="propduct_subcategorey_id" aria-label="select this Menu">
                                  <option selected>Open this select menu</option>
                                  @foreach ($subcategory as $subcategories )
                                  <option value="{{$subcategories-> id }}">{{$subcategories->subcategory_name  }}</option>

                                  @endforeach


                                </select>
                            </div>
                          </div>


                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Upload Product Image</label>
                            <div class="col-sm-10">
                              <input type="file" class="form-control" id="product_img"  name="product_img"  />
                            </div>
                          </div>






                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Add Product</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
</div>


@endsection
