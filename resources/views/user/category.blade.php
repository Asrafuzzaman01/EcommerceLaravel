@extends('user.layouts.user_template')

@section('user_page-title')


Category-page

@endsection

@section('content')



<div class="fashion_section">

    <div id="electronic_main_slider" class="carousel slide" data-ride="carousel">

                <div class="carousel-item active">
                    <div class="container">
                        <h1 class="fashion_taital text-info">{{ $category->category_name }}- ({{ $category->product_count }})</h1>
                        <div class="fashion_section_2">

            <div class="row">

                @foreach ( $products as $product )

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

@endsection
