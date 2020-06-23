@extends('layouts.User-home')
@section('title')
	All Product
@endsection
@section('script')
<script>
	$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    autoplay:true,
    autoplayTimeout:8000,
    responsiveClass:true,
    responsive:{
        0:{
            items:2
        },
        600:{
            items:4
        },
        1000:{
            items:5
        }
    }
});
</script>
@endsection
@section('container')
<div class="container productwrapper">
	<div class="row">
		<div class="owl-carousel owl-theme owlitem">
		    @forelse($products as $product)
		    <div class="item">
		    	@if($product->discount)
		    	<div class="discount">
		    		<div class="col-md-2 col-sm-2 discount_contain">
		    			<span class="mr-auto discount_price">{{$product->discount}}%</span>
		    		</div>
		    	</div>
		    	@endif
		    	<a href="{{route('productDetails',[$product->id])}}" class=""><br>
		    		<img src="{{asset('images/product')}}/{{$product->image1}}" class="allproductsize">
				</a>
				<div class="row">
					<div class="buyname" style="margin-left: 50px">
						<a href="{{route('productDetails',[$product->id])}}">{{$product->product_name}}</a>
					</div>
				</div>
		    	
		    	<div class="row">
		    		<div class="buyprice" style="margin-left: 40px">
			    		@if($product->discount)
			    		<?php
			    			$result=0;
			    			$result=$product->price-($product->price * $product->discount/100);
			    		?>
			    		<span>Price:<del class="errorprice">{{$product->price}} </del>{{$result}} TK</span>
			    		@else
			    		<span>Price: {{$product->price}} TK</span>
			    		@endif
		    		</div>
		    	</div>
		    	<a href="{{route('productDetails',[$product->id])}}" class="btn btn-success col-md-12">Buy Now</a>
		    </div>
		    @empty
		    <h1>Sorry No Product is Available</h1>
		    @endforelse
		</div>
	</div>
</div>
@endsection