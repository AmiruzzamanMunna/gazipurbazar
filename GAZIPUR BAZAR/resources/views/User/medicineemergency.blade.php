@extends('layouts.User-home')
@section('title')
	Medicine & Emergency
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
						<a class="m-auto" href="{{route('user.medicine','medicine')}}">Medicine</a>
					</div>
					<div class="itemcontain">
						<a href="{{route('user.medicine','medicine')}}"><img class="img-fluid" id="itemcontain-img" src="{{asset('images/uploads')}}/{{$event->image1}}"></a>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 m-auto">
					<div class="col-md-10 col-sm-6 section-item-name m-auto">
						<a class="m-auto" href="{{route('user.fastAidKit','fast aid')}}">First-Aid Kit</a>
					</div>
					<div class="itemcontain">
						<a href="{{route('user.fastAidKit','fast aid')}}"><img class="img-fluid" id="itemcontain-img" src="{{asset('images/uploads')}}/{{$event->image2}}"></a>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection