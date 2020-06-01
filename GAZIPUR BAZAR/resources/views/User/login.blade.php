@extends('layouts.User-home')
@section('title')
	User Login
@endsection
@section('container')
<div class="col-md-6 m-auto">
	<div class="row"></div>
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-10">
					<div class="card userregistration">
						@if(session('message'))
							<div class="alert alert-success m-auto">
								{{session('message')}}
							</div>
						@endif
					<div class="card-header"><h2>User Login</h2></div>
					<div class="card-body">
						<form method="POST" action="">
							{{csrf_field()}}
							<div class="form-group row">
								<label class="col-md-3">Email:</label>
								<div class="col-md-6">
									<input type="email" class="form-control" name="email">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3">Password:</label>
								<div class="col-md-6">
									<input type="password" class="form-control" name="password">
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
								<div class="col-md-12">
									<input type="submit" class="btn btn-success col-md-12" name="" value="Login">
								</div>
							</div>
							<div class="row">
								<div class="col-md-5 linkelement">
									<a href="{{route('user.signUP')}}" class="loginroute">Register as a New User ?</a>
								</div>
								<div class="col-md-5 linkelement ml-auto">
									<a href="{{route('password.userResetForm')}}" class="loginroute">Forgot Password ?</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
@endsection