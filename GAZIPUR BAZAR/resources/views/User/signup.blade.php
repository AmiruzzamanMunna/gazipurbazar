@extends('layouts.User-home')
@section('title')
	User Registration
@endsection
@section('container')
<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-8 m-auto">
						<div class="card userregistration">
							<div class="card-header">User Registration</div>
							<div class="card-body">
								<form method="POST">
									{{csrf_field()}}
									<div class="form-group row">
										<label class="col-md-4">Name:</label>
										<div class="col-md-8">
											<input type="text" name="name" class="form-control">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-4">User Name:</label>
										<div class="col-md-8">
											<input type="text" name="username" class="form-control">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-4">E-mail:</label>
										<div class="col-md-8">
											<input type="email" name="email" class="form-control">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-4">Mobile:</label>
										<div class="col-md-8">
											<input type="text" name="mobile" class="form-control">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-4">Address:</label>
										<div class="col-md-8">
											<input type="text" name="address" class="form-control">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-4">Password:</label>
										<div class="col-md-8">
											<input type="password" name="password" class="form-control">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-4">Confirm Password:</label>
										<div class="col-md-8">
											<input type="password" name="confirm_password" class="form-control">
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
										<div class="col-md-9">
											<input type="reset" class="btn btn-primary" name="reset" value="Reset">
										</div>
										<div class="col-md-3 ml-auto">
											<input type="submit" class="btn btn-success" name="submit" value="Register">
										</div>
										@if(session('message'))
											<div class="alert alert-success m-auto">
												{{session('message')}}
											</div>
										@endif
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection