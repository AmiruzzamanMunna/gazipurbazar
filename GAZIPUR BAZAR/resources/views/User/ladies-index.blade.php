@extends('layouts.User-home')
@section('title')
	Ladies Index Page
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
						<a class="m-auto" href="{{route('user.ladiesClothing','ladies clothing')}}">Clothing</a>
					</div>
					<div class="itemcontain">
						<a href="{{route('user.ladiesClothing','ladies clothing')}}"><img class="img-fluid" id="itemcontain-img" src="{{asset('images/uploads')}}/{{$event->image1}}"></a>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 m-auto">
					<div class="col-md-5 col-sm-6 section-item-name m-auto">
						<a class="m-auto" href="{{route('user.ladiesJuwellay','ladies Juwellary')}}">Juwellary</a>
					</div>
					<div class="itemcontain">
						<a href="{{route('user.ladiesJuwellay','ladies Juwellary')}}"><img class="img-fluid" id="itemcontain-img" src="{{asset('images/uploads')}}/{{$event->image2}}"></a>
					</div>
				</div>
				<div class="col-md-6 col-sm-4 m-auto">
					<div class="col-md-8 col-sm-6 section-item-name m-auto">
						<a class="m-auto" href="{{route('user.ladiesCosmatic','ladies cosmatic')}}">Cosmatic</a>
					</div>
					<div class="itemcontain">
						<a href="{{route('user.ladiesCosmatic','ladies cosmatic')}}"><img class="img-fluid" id="itemcontain-img" src="{{asset('images/uploads')}}/{{$event->image3}}"></a>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 m-auto">
					<div class="col-md-5 col-sm-6 section-item-name m-auto">
						<a class="m-auto" href="{{route('user.ladiesShoes','ladies shoes')}}">Shoes</a>
					</div>
					<div class="itemcontain">
						<a href="{{route('user.ladiesShoes','ladies shoes')}}"><img class="img-fluid" id="itemcontain-img" src="{{asset('images/uploads')}}/{{$event->image4}}"></a>
					</div>
				</div>
			</div>
			@empty
			@endforelse
		</div>
	</div>
</div>
@endsection