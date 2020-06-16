@extends('layouts.User-home')
@section('title')
	2marshop
@endsection
@section('script')
<script>
	$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    autoplay:true,
    autoplayTimeout:6000,
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
<div id="demo" class="carousel slide imageslide" data-ride="carousel">

	<ul class="carousel-indicators">
	  <li data-target="#demo" data-slide-to="0" class="active"></li>
	  <li data-target="#demo" data-slide-to="1"></li>
	  <li data-target="#demo" data-slide-to="2"></li>
	</ul>

   <div class="carousel-inner">
	  @foreach($events as $event)
		<div class="carousel-item active">
			<img class="img-fluid slideimage" src="{{asset('images/index')}}/{{$event->image1}}" alt="Los Angeles">
		</div>
		<div class="carousel-item">
			<img class="img-fluid slideimage" src="{{asset('images/index')}}/{{$event->image2}}" alt="Chicago">
		</div>
	  @endforeach
	</div>
	  
	<a class="carousel-control-prev" href="#demo" data-slide="prev">
	<span class="carousel-control-prev-icon"></span>
	</a>
	<a class="carousel-control-next" href="#demo" data-slide="next">
	<span class="carousel-control-next-icon"></span>
	</a>
	  
</div>

<div class="row" style="margin-top: 20px">
	<div class="col-md-12 col-sm-12 col-lg-12 col-sm-12">
		<div class="row">
				
			<div class="col-md-2 col-sm-2 m-auto">
				<div class="col-md-8 col-sm-6 section-item-name m-auto">
					<a class="m-auto" href="{{route('user.groceries','food-groceries')}}">Groceries</a>
				</div>
				<div class="itemcontain m-auto">
					<a href="{{route('user.groceries','food-groceries')}}"><img class="img-fluid img-thumbnail" id="itemcontain-img" src="{{asset('images/uploads')}}/1551258878foodindex-1.jpg"></a>
				</div>
			</div>
			<div class="col-md-3 col-sm-3">
				<div class="col-md-9 col-sm-6 section-item-name m-auto">
					<a class="m-auto" href="{{route('user.fruitsVegitables','food-fruits&vegitable')}}">Fruits & Vegitables			
				</div>
				<div class="itemcontain m-auto">
					<a href="{{route('user.fruitsVegitables','food-fruits&vegitable')}}"><img class="img-fluid img-thumbnail" id=itemcontain-img src="{{asset('images/uploads')}}/1551274014foodindex-3.jpg"></a>
				</div>
			</div>
			<div class="col-md-3 col-sm-3">
				<div class="col-md-7 col-sm-6 section-item-name m-auto">
					<a class="m-auto" href="{{route('user.meatFish','food-meat&fish')}}">Meat & Fish</a>
				</div>
				<div class="itemcontain m-auto">
					<a href="{{route('user.meatFish','food-meat&fish')}}"><img class="img-fluid img-thumbnail" id="itemcontain-img" src="{{asset('images/uploads')}}/1551258878foodindex-4.jpg"></a>
				</div>
			</div>
			<div class="col-md-3 col-sm-3">
				<div class="col-md-11 col-sm-6 section-item-name m-auto">
					<a class="m-auto" href="{{route('user.freshMilk','food-freshmilk')}}">Fresh Dairy Milk</a>
				</div>
				<div class="itemcontain m-auto">
					<a href="{{route('user.freshMilk','food-freshmilk')}}"><img class="img-fluid img-thumbnail" id="itemcontain-img" src="{{asset('images/uploads')}}/1551258878foodindex-5.jpg"></a>
				</div>
			</div>
			
		</div>
	</div>
</div>
<div class="container">
	<div class="row wrapperelement">
		<div class="col-md-9 col-sm-12 ml-auto">
			<h1 class="contain-head">Popular Products</h1>
		</div>
		<div class="owl-carousel owl-theme owlitem"">
			@php
				$a=0
			@endphp
		    @forelse($fruits as $gent)
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
	{{-- <div class="row">
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
	</div> --}}
</div>
@section('vue')

<script>
	var app=new Vue({

		el:"",

		mounted:function(){

			console.log("hello Vue");
		}
	});
</script>
	
@endsection

@endsection