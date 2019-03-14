@extends('layouts.User-home')
@section('title')
	Furniture Index Page
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
						<a class="m-auto" href="{{route('user.sofas','furniture-sofa')}}">Sofas</a>
					</div>
					<div class="itemcontain">
						<a href="{{route('user.sofas','furniture-sofa')}}"><img class="img-fluid" id="itemcontain-img" src="{{asset('images/uploads')}}/{{$event->image1}}"></a>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 m-auto">
					<div class="col-md-7 col-sm-6 section-item-name m-auto">
						<a class="m-auto" href="{{route('user.chairs','furniture-chairs')}}">Chairs</a>
					</div>
					<div class="itemcontain">
						<a href="{{route('user.chairs','furniture-chairs')}}"><img class="img-fluid" id="itemcontain-img" src="{{asset('images/uploads')}}/{{$event->image2}}"></a>
					</div>
				</div>
				<div class="col-md-6 col-sm-4 m-auto">
					<div class="col-md-8 col-sm-6 section-item-name m-auto">
						<a class="m-auto" href="{{route('user.ottomans','furniture-ottomans')}}">Ottomans</a>
					</div>
					<div class="itemcontain">
						<a href="{{route('user.ottomans','furniture-ottomans')}}"><img class="img-fluid" id="itemcontain-img" src="{{asset('images/uploads')}}/{{$event->image3}}"></a>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 m-auto">
					<div class="col-md-5 col-sm-6 section-item-name m-auto">
						<a class="m-auto" href="{{route('user.tables','furniture-tables')}}">Tables</a>
					</div>
					<div class="itemcontain">
						<a href="{{route('user.tables','furniture-tables')}}"><img class="img-fluid" id="itemcontain-img" src="{{asset('images/uploads')}}/{{$event->image4}}"></a>
					</div>
				</div>
				<div class="col-md-6 col-sm-4 m-auto">
					<div class="col-md-10 col-sm-6 section-item-name m-auto">
						<a class="m-auto" href="{{route('user.entertainmentCenter','furniture-entertainment center')}}">Entertainment Center</a>
					</div>
					<div class="itemcontain">
						<a href="{{route('user.entertainmentCenter','furniture-entertainment center')}}"><img class="img-fluid" id="itemcontain-img" src="{{asset('images/uploads')}}/{{$event->image5}}"></a>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 m-auto">
					<div class="col-md-5 col-sm-6 section-item-name m-auto">
						<a class="m-auto" href="{{route('user.bedRooms','furniture-bed rooms')}}">Bed Rooms</a>
					</div>
					<div class="itemcontain">
						<a href="{{route('user.bedRooms','furniture-bed rooms')}}"><img class="img-fluid" id="itemcontain-img" src="{{asset('images/uploads')}}/{{$event->image6}}"></a>
					</div>
				</div>
			</div>
			@empty
			@endforelse
		</div>
	</div>
</div>
@endsection