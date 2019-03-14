@extends('layouts.User-home')
@section('title')
	Electrical & Electronics Index Page
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
					<div class="col-md-9 col-sm-6 section-item-name m-auto">
						<a class="m-auto" href="{{route('user.computerAccessories','computer & accessories')}}">Computer & Accessories</a>
					</div>
					<div class="itemcontain">
						<a href="{{route('user.computerAccessories','computer & accessories')}}"><img class="img-fluid" id="itemcontain-img" src="{{asset('images/uploads')}}/{{$event->image1}}"></a>
					</div>
				</div>
				<div class="col-md-6 col-sm-4 m-auto">
					<div class="col-md-7 col-sm-6 section-item-name m-auto">
						<a class="m-auto" href="{{route('user.electronics','electronics')}}">Electronics</a>
					</div>
					<div class="itemcontain">
						<a href="{{route('user.electronics','electronics')}}"><img class="img-fluid" id="itemcontain-img" src="{{asset('images/uploads')}}/{{$event->image2}}"></a>
					</div>
				</div>
				<div class="col-md-12 col-sm-4 m-auto">
					<div class="col-md-11 col-sm-6 section-item-name m-auto">
						<a class="m-auto" href="{{route('user.securityServillance','Security & Servillance')}}">Security & Servillance</a>
					</div>
					<div class="itemcontain">
						<a href="{{route('user.securityServillance','Security & Servillance')}}"><img class="img-fluid" id="itemcontain-img" src="{{asset('images/uploads')}}/{{$event->image3}}"></a>
					</div>
				</div>
			</div>
			@empty
			@endforelse
		</div>
	</div>
</div>
@endsection