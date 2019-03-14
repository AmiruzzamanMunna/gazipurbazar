@extends('layouts.User-home')
@section('title')
	Household Accessories Index Page
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
						<a class="m-auto" href="{{route('user.cushions','cushions')}}">Cushions</a>
					</div>
					<div class="itemcontain">
						<a href="{{route('user.cushions','cushions')}}"><img class="img-fluid" id="itemcontain-img" src="{{asset('images/uploads')}}/{{$event->image1}}"></a>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 m-auto">
					<div class="col-md-7 col-sm-6 section-item-name m-auto">
						<a class="m-auto" href="{{route('user.throwsBlankets','Throws & Blankets')}}">Throws & Blankets</a>
					</div>
					<div class="itemcontain">
						<a href="{{route('user.throwsBlankets','Throws & Blankets')}}"><img class="img-fluid" id="itemcontain-img" src="{{asset('images/uploads')}}/{{$event->image2}}"></a>
					</div>
				</div>
				<div class="col-md-6 col-sm-4 m-auto">
					<div class="col-md-8 col-sm-6 section-item-name m-auto">
						<a class="m-auto" href="{{route('user.mirrors','mirrors')}}">Mirrors</a>
					</div>
					<div class="itemcontain">
						<a href="{{route('user.mirrors','mirrors')}}"><img class="img-fluid" id="itemcontain-img" src="{{asset('images/uploads')}}/{{$event->image3}}"></a>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 m-auto">
					<div class="col-md-5 col-sm-6 section-item-name m-auto">
						<a class="m-auto" href="{{route('user.curtains','curtains')}}">Curtains</a>
					</div>
					<div class="itemcontain">
						<a href="{{route('user.curtains','curtains')}}"><img class="img-fluid" id="itemcontain-img" src="{{asset('images/uploads')}}/{{$event->image4}}"></a>
					</div>
				</div>
			</div>
		</div>
		@empty
		@endforelse
	</div>
</div>
@endsection