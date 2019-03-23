@extends('layout')
@section('content')

<h2 class="title text-center">Features Items {{ $cat_details->cat_name }}</h2>

@foreach($all_product_by_cat as $all_product_data)
<div class="col-sm-4">
    <div class="product-image-wrapper">
        <div class="single-products">
            <div class="productinfo text-center">
                <img src="{{ URL::to($all_product_data->product_image) }}" alt="" style="height: 200px;width: 100%" />
                <h2>{{ $all_product_data->product_price }}</h2>
                <p>{{ $all_product_data->product_name }}</p>
                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
            </div>
            <div class="product-overlay">
                <div class="overlay-content">
                    <h2>{{ $all_product_data->product_price }}</h2>
                    <p>{{ $all_product_data->product_name }}</p>
                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                </div>
            </div>
        </div>
        <div class="choose">
            <ul class="nav nav-pills nav-justified">
                <li><a href="#"><i class="fa fa-plus-square"></i>{{ $all_product_data->brand_name }}</a></li>
                <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
            </ul>
        </div>
    </div>
</div>
@endforeach

</div><!--features_items-->



<div class="recommended_items"><!--recommended_items-->
<h2 class="title text-center">recommended items</h2>

	<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
	    <div class="carousel-inner">
	        <div class="item active">   
	            <div class="col-sm-4">
	                <div class="product-image-wrapper">
	                    <div class="single-products">
	                        <div class="productinfo text-center">
	                            <img src="images/home/recommend1.jpg" alt="" />
	                            <h2>$56</h2>
	                            <p>Easy Polo Black Edition</p>
	                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                        </div>
	                        
	                    </div>
	                </div>
	            </div>
	            <div class="col-sm-4">
	                <div class="product-image-wrapper">
	                    <div class="single-products">
	                        <div class="productinfo text-center">
	                            <img src="images/home/recommend2.jpg" alt="" />
	                            <h2>$56</h2>
	                            <p>Easy Polo Black Edition</p>
	                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                        </div>
	                        
	                    </div>
	                </div>
	            </div>
	            <div class="col-sm-4">
	                <div class="product-image-wrapper">
	                    <div class="single-products">
	                        <div class="productinfo text-center">
	                            <img src="images/home/recommend3.jpg" alt="" />
	                            <h2>$56</h2>
	                            <p>Easy Polo Black Edition</p>
	                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                        </div>
	                        
	                    </div>
	                </div>
	            </div>
	        </div>
	        <div class="item">  
	            <div class="col-sm-4">
	                <div class="product-image-wrapper">
	                    <div class="single-products">
	                        <div class="productinfo text-center">
	                            <img src="images/home/recommend1.jpg" alt="" />
	                            <h2>$56</h2>
	                            <p>Easy Polo Black Edition</p>
	                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                        </div>
	                        
	                    </div>
	                </div>
	            </div>
	            <div class="col-sm-4">
	                <div class="product-image-wrapper">
	                    <div class="single-products">
	                        <div class="productinfo text-center">
	                            <img src="images/home/recommend2.jpg" alt="" />
	                            <h2>$56</h2>
	                            <p>Easy Polo Black Edition</p>
	                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                        </div>
	                        
	                    </div>
	                </div>
	            </div>
	            <div class="col-sm-4">
	                <div class="product-image-wrapper">
	                    <div class="single-products">
	                        <div class="productinfo text-center">
	                            <img src="images/home/recommend3.jpg" alt="" />
	                            <h2>$56</h2>
	                            <p>Easy Polo Black Edition</p>
	                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                        </div>
	                        
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	     <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
	        <i class="fa fa-angle-left"></i>
	      </a>
	      <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
	        <i class="fa fa-angle-right"></i>
	      </a>          
	</div>
</div><!--/recommended_items-->

@endsection('content')