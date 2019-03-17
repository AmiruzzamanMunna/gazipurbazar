@extends('layouts.User-home')
@section('title')
	Gazipur Bazar
@endsection
@section('script')
<script>
	$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    autoplay:true,
    autoplayTimeout:2000,
    responsiveClass:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:4
        },
        1000:{
            items:3
        }
    }
});
</script>
@endsection
@section('container')
<div class="container">
	<div class="row wrapperelement">
		<div class="col-md-9 col-sm-12 ml-auto">
			<h1 class="contain-head">Men's clothing Collection</h1>
		</div>
		<div class="owl-carousel owl-theme owlitem"">
		    @forelse($gents as $gent)
		    <div class="item">
		    	@if($gent->discount)
		    	<div class="discount">
		    		<div class="col-md-2 col-sm-2 discount_contain">
		    			<span class="mr-auto discount_price">{{$gent->discount}}%</span>
		    		</div>
		    	</div>
		    	@endif
		    	<a href="{{route('productDetails',[$gent->id])}}" class=""><br>
		    		<img src="{{asset('images/product')}}/{{$gent->image1}}" class="imagesize">
		    	</a>
		    	<div class="buyname col-md-12">
		    		<a href="{{route('productDetails',[$gent->id])}}">{{$gent->product_name}}</a>
		    	</div>
		    	<div class="buyprice col-md-12 col-sm-6">
					<div class="row">
						@if($gent->discount)
							<?php
							$result=0;
							$result=$gent->price-($gent->price * $gent->discount/100);
							?>
							<span>Price: <del class="errorprice">{{$gent->price}}</del></span>
							<span>{{$result}} TK</span>
						@else
							<span>Price: {{$gent->price}} TK</span>
						@endif
					</div>
		    	</div>
		    	<a href="{{route('productDetails',[$gent->id])}}" class="btn btn-success col-md-12">Buy Now</a>
		    </div>
		    @empty
		    <h1>Sorry No Product is Available</h1>
		    @endforelse
		</div>
	</div>
	<div class="row">
		<div class="col-md-9 col-sm-12 ml-auto">
			<h1 class="contain-head">Women's clothing Collection</h1>
		</div>
		<div class="owl-carousel owl-theme owlitem">
			@forelse($ladies as $lady)
		    <div class="item">
		    	@if($lady->discount)
		    	<div class="discount">
		    		<div class="col-md-2 col-sm-2 discount_contain">
		    			<span class="mr-auto discount_price">{{$lady->discount}}%</span>
		    		</div>
		    	</div>
		    	@endif
		    	<a href="{{route('productDetails',[$lady->id])}}" class=""><br>
		    		<img src="{{asset('images/product')}}/{{$lady->image1}}" class="imagesize">
		    	</a>
		    	<div class="buyname col-md-12">
		    		<a href="">{{$lady->product_name}}</a>
		    	</div>
		    	<div class="buyprice col-md-12 col-sm-6">
					<div class="row">
						@if($lady->discount)
							<?php
							$result=0;
							$result=$lady->price-($lady->price * $lady->discount/100);
							?>
							<span>Price: <del class="errorprice">{{$lady->price}}</del></span>
							<span>{{$result}} TK</span>
						@else
							<span>Price: {{$lady->price}} TK</span>
						@endif
					</div>
		    	</div>
		    	<a href="{{route('productDetails',[$lady->id])}}" class="btn btn-success col-md-12">Buy Now</a>
		    </div>
		    @empty
		    <h1>Sorry No Product is Available</h1>
		    @endforelse
		</div>
	</div>
	<div class="row">
		<div class="col-md-5 col-sm-3 m-auto">
			<h1 class="contain-head">Popular Gadget Items</h1>
		</div>
		<div class="owl-carousel owl-theme owlitem">
		    @forelse($gadgets as $gadget)
		    <div class="item">
		    	@if($gadget->discount)
		    	<div class="discount">
		    		<div class="col-md-2 col-sm-2 discount_contain">
		    			<span class="mr-auto discount_price">{{$gadget->discount}}%</span>
		    		</div>
		    	</div>
		    	@endif
		    	<a href="{{route('productDetails',[$gadget->id])}}" class=""><br>
		    		<img src="{{asset('images/product')}}/{{$gadget->image1}}" class="imagesize">
		    	</a>
		    	<div class="buyname col-md-12">
		    		<a href="{{route('productDetails',[$gadget->id])}}">{{$gadget->product_name}}</a>
		    	</div>
		    	<div class="buyprice col-md-12 col-sm-8">
					<div class="row">
						@if($gadget->discount)
							<?php
							$result=0;
							$result=$gadget->price-($gadget->price * $gadget->discount/100);
							?>
							<span>Price: <del class="errorprice">{{$gadget->price}}</del></span>
							<span> {{$result}} TK</span>
						@else
							<span>Price: {{$gadget->price}} TK</span>
						@endif
					</div>
		    	</div>
		    	<a href="{{route('productDetails',[$gadget->id])}}" class="btn btn-success col-md-12">Buy Now</a>
		    </div>
		    @empty
		    <h1>Sorry No Product is Available</h1>
		    @endforelse
		</div>
	</div>
</div>
@endsection