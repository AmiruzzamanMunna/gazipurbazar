@extends('layouts.User-home')
@section('title')
	CheckOut
@endsection
@section('container')
<div class="container">
	<div class="row">
		<div class="col-md-8 m-auto">
			<form action="" method="POST">
				{{csrf_field()}}
				<div class="card checkout_form">
					<div class="card-header"><h2>Checkout Details</h2></div>
					<div class="card-body">
						<div class="form-group row">
							<label class="col-md-3">Name:</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="name" value="{{$user->name}}">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3">Mobile No 1:</label>
							<div class="col-md-8">
								<input type="number" class="form-control" value="{{$user->mobile}}" name="mobile1">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3">Mobile No 2:</label>
							<div class="col-md-8">
								<input type="number" class="form-control" name="mobile2" value="{{$user->mobile2}}">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3">Address:</label>
							<div class="col-md-8">
								<input type="text" class="form-control" value="{{$user->address}}" name="address">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3">E-Mail:</label>
							<div class="col-md-8">
								<input type="email" class="form-control" value="{{$user->email}}" name="email">
							</div>
						</div>
						@if($errors->any())
							<ul>
								@foreach($errors->all() as $error)
									<li>{{$error}}</li>
								@endforeach
							</ul>
						@endif
						<div class="row">
							{{-- <div class="col-md-9">
								<input type="reset" class="btn btn-danger" name="" value="Reset">
							</div> --}}
							<div class="col-md-3 ml-auto">
								<input type="submit" class="btn btn-success" name="" value="Confirm">
							</div>
						</div>
					</div>
				</div>			
			</form>
		</div>
	</div>
</div>
@endsection