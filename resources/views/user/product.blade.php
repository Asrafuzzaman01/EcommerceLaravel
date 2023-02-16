@extends('user.layouts.user_template')

@section('user_page-title')


product-page

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="box_main  shadow p-1 mb-2 bg-body rounded">
                <div class="tshirt_img"><img  src="{{asset($products->product_img)}}"></div>

            </div>
        </div>


        <div class="col-lg-8">
            <div class="box_main">
                <div class="product">
                    <h4 class="shirt_text text-left text-success">{{ $products->product_name}} </h4>
                    <p class="price_text text-left ">Price  <span style="color: #262626;">${{ $products->price}} </span></p>

                </div>

                <div class="my-3 product_details">

                    <p class="lead">
                        {{ $products->product_long_des }}

                    </p>

                    <ul class="p-2 bg-light my-2">
                        <li>Category Name:{{ $products-> product_category_name}}</li>
                        <li>Sub Category Name:{{ $products->product_subcategory_name }}</li>
                        <li>Quantity:{{ $products->productquantity }}</li>

                    </ul>
                    <div class="main">

                        <form action="{{ route('proaddtocart') }}" method="post">
                            @csrf

                            <div class="form-group">
                                <input type="hidden" name="product_id" value="{{ $products->id }}">
                                <label for="product_quantity ">How Many Pics?</label>
                                <input class="form-control" type="number" min="1" name="quantity" placeholder="1" >
                                <input type="hidden" name="price" value="{{ $products->price }}">


                            </div>

                            <input class="btn btn-warning" type="submit" value="Add to Cart">

                        </form>


                    </div>


                </div>

            </div>
        </div>

    </div>
</div>


<div class="fashion_section">

    <div id="electronic_main_slider" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <h1 class="fashion_taital color-info">Related Products</h1>
                        <div class="fashion_section_2">

            <div class="row">

                @foreach ( $related_products as $product )



                <div class="col-lg-4 col-sm-4">
                   <div class="box_main  shadow p-1 mb-2 bg-body rounded">
                      <h4 class="shirt_text">{{ $product->product_name }}</h4>
                      <p class="price_text">Price  <span style="color: #262626;">$ {{ $product->price }}</span></p>
                      <div class="tshirt_img"><img  src={{asset($product->product_img)}}></div>
                      <div class="btn_main">


                        <form action="{{ route('proaddtocart') }}" method="post">
                            @csrf

                            <div class="form-group">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="price" value="{{ $product->price }}">
                                <input type="hidden" name="quantity" value="1">



                            </div>

                            <input class="btn btn-warning" type="submit" value="Buy Now">

                        </form>


                         <div class="seemore_bt"><a href="{{route('singleproduct',[$product->id, $product->slug])}}">See More</a></div>
                      </div>
                   </div>
                </div>

                @endforeach




            </div>
                    </div>
                    </div>
                </div>
            </div>





    </div>


</div>




@endsection
