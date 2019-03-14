@extends('layouts.User-home')
@section('title')
	Flowers & Bouquets Index Page
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
						<a class="m-auto" href="{{route('user.romance','romance')}}">Romance</a>
					</div>
					<div class="itemcontain">
						<a href="{{route('user.romance','romance')}}"><img class="img-fluid" id="itemcontain-img" src="{{asset('images/uploads')}}/{{$event->image1}}"></a>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 m-auto">
					<div class="col-md-7 col-sm-6 section-item-name m-auto">
						<a class="m-auto" href="{{route('user.roses','roses')}}">Roses</a>
					</div>
					<div class="itemcontain">
						<a href="{{route('user.roses','roses')}}"><img class="img-fluid" id="itemcontain-img" src="{{asset('images/uploads')}}/{{$event->image2}}"></a>
					</div>
				</div>
				<div class="col-md-6 col-sm-4 m-auto">
					<div class="col-md-8 col-sm-6 section-item-name m-auto">
						<a class="m-auto" href="{{route('user.birthday','birthday')}}">Birthday</a>
					</div>
					<div class="itemcontain">
						<a href="{{route('user.birthday','birthday')}}"><img class="img-fluid" id="itemcontain-img" src="{{asset('images/uploads')}}/{{$event->image3}}"></a>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 m-auto">
					<div class="col-md-7 col-sm-6 section-item-name m-auto">
						<a class="m-auto" href="{{route('user.anniversary','anniversary')}}">Anniversary</a>
					</div>
					<div class="itemcontain">
						<a href="{{route('user.anniversary','anniversary')}}"><img class="img-fluid" id="itemcontain-img" src="{{asset('images/uploads')}}/{{$event->image4}}"></a>
					</div>
				</div>
				<div class="col-md-6 col-sm-4 m-auto">
					<div class="col-md-8 col-sm-6 section-item-name m-auto">
						<a class="m-auto" href="{{route('user.thankyou','thank you')}}">Thank You</a>
					</div>
					<div class="itemcontain">
						<a href="{{route('user.thankyou','thank you')}}"><img class="img-fluid" id="itemcontain-img" src="{{asset('images/uploads')}}/{{$event->image5}}"></a>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 m-auto">
					<div class="col-md-7 col-sm-6 section-item-name m-auto">
						<a class="m-auto" href="{{route('user.sympathy','sympathy')}}">Sympathy</a>
					</div>
					<div class="itemcontain">
						<a href="{{route('user.sympathy','sympathy')}}"><img class="img-fluid" id="itemcontain-img" src="{{asset('images/uploads')}}/{{$event->image6}}"></a>
					</div>
				</div>
			</div>
			@empty
			@endforelse
		</div>
	</div>
</div>
@endsection