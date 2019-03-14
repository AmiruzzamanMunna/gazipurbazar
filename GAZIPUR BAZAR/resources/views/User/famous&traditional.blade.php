@extends('layouts.User-home')
@section('title')
	Famous & Traditional Item
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
						<a class="m-auto" href="{{route('user.nakshikatha','nakshikatha')}}">Nakshikatha</a>
					</div>
					<div class="itemcontain">
						<a href="{{route('user.nakshikatha','nakshikatha')}}"><img class="img-fluid" id="itemcontain-img" src="{{asset('images/uploads')}}/{{$event->image1}}"></a>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 m-auto">
					<div class="col-md-10 col-sm-6 section-item-name m-auto">
						<a class="m-auto" href="{{route('user.potteryTerracotta','Pottery and Terracotta')}}">Pottery and Terracotta</a>
					</div>
					<div class="itemcontain">
						<a href="{{route('user.potteryTerracotta','Pottery and Terracotta')}}"><img class="img-fluid" id="itemcontain-img" src="{{asset('images/uploads')}}/{{$event->image2}}"></a>
					</div>
				</div>
				<div class="col-md-11 col-sm-4 m-auto">
					<div class="col-md-10 col-sm-6 section-item-name m-auto">
						<a class="m-auto" href="{{route('user.shitalPati','shital pati')}}">Shital Pati</a>
					</div>
					<div class="itemcontain">
						<a href="{{route('user.shitalPati','shital pati')}}"><img class="img-fluid" id="itemcontain-img" src="{{asset('images/uploads')}}/{{$event->image3}}"></a>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection