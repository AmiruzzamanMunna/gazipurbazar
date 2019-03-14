@extends('layouts.User-home')
@section('title')
	Event Management
@endsection
@section('container')
<div class="container itemwrapper">
	<div class="item-heading">
		@foreach($events as $event)
		<h1 class="headingelement">{{$event->heading1}}</h1>
		<p>{{$event->paragraph}}</p>
	</div>
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<div class="row">
				<div class="col-md-6 col-sm-4 m-auto">
					<div class="col-md-8 col-sm-6 section-item-name m-auto">
						<a class="m-auto" href="{{route('user.weddingEventPage')}}">Wedding Event</a>
					</div>
					<div class="itemcontain">
						<a href="{{route('user.weddingEventPage')}}"><img class="img-fluid" id="itemcontain-img" src="{{asset('images/uploads')}}/{{$event->image1}}"></a>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 m-auto">
					<div class="col-md-7 col-sm-6 section-item-name m-auto">
						<a class="m-auto" href="{{route('user.birthdayEventPage')}}">Birthday Event</a>
					</div>
					<div class="itemcontain">
						<a href="{{route('user.birthdayEventPage')}}"><img class="img-fluid" id="itemcontain-img" src="{{asset('images/uploads')}}/{{$event->image2}}"></a>
					</div>
				</div>
				<div class="col-md-6 col-sm-4 m-auto">
					<div class="col-md-11 col-sm-6 section-item-name m-auto">
						<a class="m-auto" href="{{route('user.HospitalityEventPage')}}">Hospitality Event</a>
					</div>
					<div class="itemcontain">
						<a href="{{route('user.HospitalityEventPage')}}"><img class="img-fluid" id="itemcontain-img" src="{{asset('images/uploads')}}/{{$event->image3}}"></a>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 m-auto">
					<div class="col-md-6 col-sm-6 section-item-name m-auto">
						<a class="m-auto" href="{{route('user.othersEventPage')}}">Others</a>
					</div>
					<div class="itemcontain">
						<a href="{{route('user.othersEventPage')}}"><img class="img-fluid" id="itemcontain-img" src="{{asset('images/uploads')}}/{{$event->image4}}"></a>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>
@endsection