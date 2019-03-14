@extends('layouts.User-home')
@section('title')
	Food Index Page
@endsection
@section('container')
<div class="container itemwrapper">
	<div class="item-heading">
		@forelse($events as $event)
		<h1 class="headingelement">{{$event->heading1}}</h1>
		<p>{{$event->paragraph}}</p>
	</div>
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<div class="row">
				
				<div class="col-md-6 col-sm-4 m-auto">
					<div class="col-md-8 col-sm-6 section-item-name m-auto">
						<a class="m-auto" href="{{route('user.groceries','food-groceries')}}">Groceries</a>
					</div>
					<div class="itemcontain">
						<a href="{{route('user.groceries','food-groceries')}}"><img class="img-fluid" id="itemcontain-img" src="{{asset('images/uploads')}}/{{$event->image1}}"></a>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 m-auto">
					<div class="col-md-7 col-sm-6 section-item-name m-auto">
						<a class="m-auto" href="{{route('user.breadBakery','food-bread&bakery')}}">Bread & Bakery</a>
					</div>
					<div class="itemcontain">
						<a href="{{route('user.breadBakery','food-bread&bakery')}}"><img class="img-fluid" id="itemcontain-img" src="{{asset('images/uploads')}}/{{$event->image2}}"></a>
					</div>
				</div>
				<div class="col-md-6 col-sm-4 m-auto">
					<div class="col-md-9 col-sm-6 section-item-name m-auto">
						<a class="m-auto" href="{{route('user.fruitsVegitables','food-fruits&vegitable')}}">Fruits & Vegitables			
					</div>
					<div class="itemcontain">
						<a href="{{route('user.fruitsVegitables','food-fruits&vegitable')}}"><img class="img-fluid" id=itemcontain-img src="{{asset('images/uploads')}}/{{$event->image3}}"></a>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 m-auto">
					<div class="col-md-7 col-sm-6 section-item-name m-auto">
						<a class="m-auto" href="{{route('user.meatFish','food-meat&fish')}}">Meat & Fish</a>
					</div>
					<div class="itemcontain">
						<a href="{{route('user.meatFish','food-meat&fish')}}"><img class="img-fluid" id="itemcontain-img" src="{{asset('images/uploads')}}/{{$event->image4}}"></a>
					</div>
				</div>
				<div class="col-md-11 col-sm-4 m-auto">
					<div class="col-md-11 col-sm-6 section-item-name m-auto">
						<a class="m-auto" href="{{route('user.freshMilk','food-freshmilk')}}">Fresh Dairy Milk</a>
					</div>
					<div class="itemcontain">
						<a href="{{route('user.freshMilk','food-freshmilk')}}"><img class="img-fluid" id="itemcontain-img" src="{{asset('images/uploads')}}/{{$event->image5}}"></a>
					</div>
				</div>
				@empty
				@endforelse
			</div>
		</div>
	</div>
</div>
@endsection