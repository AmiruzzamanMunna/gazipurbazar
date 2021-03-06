@extends('layouts.Admin-home')
@section('title')
	Edit Product
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
					<div class="card-header"><h2>Update Product</h2></div>
					<div class="card-body">
					<form action="" method="post" id="addproduct-form" enctype="multipart/form-data">
						{{csrf_field()}}
						<div class="form-group row">
							<label class="col-md-3">Product Code:</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="product_code" value="{{$products->product_code}}">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3">Product Name:</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="product_name" value="{{$products->product_name}}">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3">Category:</label>
							<div class="col-md-8">
								<select class="form-control" name="category">
									<option>Select---</option>
									@foreach($catogories as $catogory)
										@if ($products->category_fk==$catogory->id)

										<option value="{{$catogory->id}}" selected>{{$catogory->category_name}}</option>
											
										@else

										<option value="{{$catogory->id}}">{{$catogory->category_name}}</option>
											
										@endif
										
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3">Size:</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="seze[]" value="{{$products->size}}">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3">Unit:</label>
							<div class="col-md-8">
								<select class="form-control" name="unit">
									<option value="0">Select---</option>
									@if ($products->unit=='kg')

										<option value="kg" selected>kg</option>
										<option value="ltr">ltr</option>
										<option value="gm">gm</option>
										<option value="Piece">Piece</option>
										
									@elseif($products->unit=='ltr')

										<option value="kg">kg</option>
										<option value="ltr" selected>ltr</option>
										<option value="gm">gm</option>
										<option value="Piece">Piece</option>

									@elseif($products->unit=='gm')

										<option value="kg">kg</option>
										<option value="ltr">ltr</option>
										<option value="gm" selected>gm</option>
										<option value="Piece">Piece</option>
									
									@elseif($products->unit=='Piece')
										<option value="kg">kg</option>
										<option value="ltr">ltr</option>
										<option value="gm">gm</option>
										<option value="Piece" selected>Piece</option>
									@else

										<option value="kg">kg</option>
										<option value="ltr">ltr</option>
										<option value="gm">gm</option>
										<option value="Piece">Piece</option>

										
									@endif
		
									
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3">Price:</label>
							<div class="col-md-8">
								<input type="number" class="form-control" name="price" value="{{$products->price}}">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3">Selling Price:</label>
							<div class="col-md-8">
								<input type="number" class="form-control" name="sellingPrice" value="{{$products->sellingPrice}}">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3">Discount:</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="discount" placeholder="%" value="{{$products->discount}}">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3">Quantity:</label>
							<div class="col-md-8">
								<input type="number" class="form-control" name="quantity" value="{{$products->quantity}}">
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
                                <textarea type=text rows="4" cols="35" class="cols" name="specifications">{{$products->specifications}}</textarea>
                            </div>
						</div>
						<div class="form-group row">
							<label class="col-md-3">Product Status:</label>
							<div class="col-md-8">
								<select class="form-control" name="product_status">
									<option value="">Select---</option>
									@if ($products->product_status==0)

										<option value="0" selected>Active</option>
										<option value="1">De-Active</option>
										
									@elseif($products->product_status==1)

									<option value="0">Active</option>
									<option value="1" selected>De-Active</option>

									@else

									<option value="0">Active</option>
									<option value="1">De-Active</option>
										
									@endif
		
									
								</select>
							</div>
						</div><br>
						@if($errors->any())
							<ul>
								@foreach($errors-> all() as $error)
									<li>{{$error}}</li>
								@endforeach
							</ul>
						@endif
						<div class="row">
							<div class="col-md-5">
								<input type="reset" class="btn btn-warning" name="" value="Reset">
							</div>
							<div class="col-md-4">
								<a href="{{route('product.deleteProduct',[$products->id])}}" class="btn btn-danger">Delete</a>
							</div>
							<div class="col-md-2">
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