@extends('layouts.Admin-home')
@section('title')
	Add Product
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
					<div class="card-header"><h2>Add New Product</h2></div>
					<div class="card-body">
					<form action="" method="post" id="addproduct-form" enctype="multipart/form-data">
						{{csrf_field()}}
						<div class="form-group row">
							<label class="col-md-3">Product Code:</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="product_code">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3">Product Name:</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="product_name">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3">Category:</label>
							<div class="col-md-8">
								<select class="form-control" name="category">
									<option>Select---</option>
									@foreach($catogories as $catogory)
										<option value="{{$catogory->id}}">				{{$catogory->category_name}}
										</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3">Size:</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="seze[]">
								<input type="text" class="form-control" name="seze[]">
								<input type="text" class="form-control" name="seze[]">
								<input type="text" class="form-control" name="seze[]">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3">Unit:</label>
							<div class="col-md-8">
								<select class="form-control" name="unit">
									<option>Select---</option>
									<option value="kg">kg</option>
									<option value="ltr">ltr</option>
									<option value="gm">gm</option>
									
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3">Price:</label>
							<div class="col-md-8">
								<input type="number" class="form-control" name="price">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3">Discount:</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="discount" placeholder="%">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3">Quantity:</label>
							<div class="col-md-8">
								<input type="number" class="form-control" name="quantity">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3">New Arrival:</label>
							<div class="col-md-8">
								<label class="radio-inline">
									<input type="radio" name="newarrival" value="1" checked>Yes
									<input type="radio" name="newarrival" value="0">No
								</label>
							</div>
						</div>
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
						<div class="form-group row">
							<label class="col-md-3">Image3:</label>
							<div class="col-md-8">
								<input type="file" class="form-control" name="image3" id="img3">
								<img id="src3">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-5">Specifications:</label>
							<div class="col-md-6">
                                <textarea type=text rows="4" cols="35" class="cols" name="specifications"></textarea>
                            </div>
						</div>
						@if($errors->any())
							<ul>
								@foreach($errors-> all() as $error)
									<li>{{$error}}</li>
								@endforeach
							</ul>
						@endif
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