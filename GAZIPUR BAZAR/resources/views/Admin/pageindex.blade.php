@extends('layouts.Admin-home')
@section('title')
	Page Index
@endsection
@section('script')
<script src="{{asset('js')}}/script.js"></script>
@endsection
@section('container')
<div class="col-md-6 m-auto">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-12 containitem">
					<div class="card">
					<div class="card-header"><h2>Add Page Image</h2></div>
					<div class="card-body">
					<form action="" method="post" id="addproduct-form" enctype="multipart/form-data">
						{{csrf_field()}}
						
						<div class="form-group row">
							<label class="col-md-3">Image1:</label>
							<div class="col-md-8">
								<input type="file" class="form-control" name="image1" id="img1">
								<img id="src1">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3">Image2:</label>
							<div class="col-md-8">
								<input type="file" class="form-control" name="image2" id="img2">
								<img id="src2">
							</div>
						</div>
		
						<div class="row">
							<div class="col-md-8">
								<input type="reset" class="btn btn-danger" name="" value="Reset">
							</div>
							<div class="col-md-3">
								<input type="submit" class="btn btn-success" name="" value="Save">
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
@endsection