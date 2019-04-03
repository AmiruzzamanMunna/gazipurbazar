@extends('layouts.User-home')
@section('title')
	Product Details
@endsection
@section('script')

<script type="text/javascript">
	function change() {
		var img=document.getElementById('td1');
		img.src="{{asset('images/product')}}/{{$products->image1}}";
	}
	function change1() {
		var img=document.getElementById('td1');
		img.src="{{asset('images/product')}}/{{$products->image2}}";
	}
	function change2() {
		var img=document.getElementById('td1');
		img.src="{{asset('images/product')}}/{{$products->image3}}";
	}

</script>
@endsection
@section('container')
<div class="container-fluid">
	<div class="row ml-auto">
		<div class="col-md-12">
			<div class="row ml-auto">
				<div class="table col-md-4 dvtb ml-auto">
					<table class="table-bordered">
						<tr>
							<th>Product</th>
						</tr>
						<tr>
							<td><img id="td1" class="tbimg img-fluid" src="{{asset('images/product')}}/{{$products->image1}}" alt="td1"></td>
						</tr>
					</table>
				</div>
				<div class="col-md-5 m-auto cat">
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-12">
									<form method="POST" action="{{route('cart.addCart')}}">
										{{csrf_field()}}
										<?php
											$result=0;
										?>
										<div class="card crd">
											<h4 class="m-auto">Name</h4>
											<div class="card-body">
												<input type="hidden" name="product_id" id="add-cart-id" value="{{$products->id}}">
												<input type="hidden" name="productimage" value="{{$products->image1}}">
												<input type="hidden" name="productname" value="{{$products->product_name}}">
												<div class="form-group row">
													<label class="col-md-6 lbl">Category:</label>
													<label class="col-md-6 lbl">{{$products->category_name}}</label>
												</div>
												<div class="form-group row">
													<label class="col-md-6 lbl">Name:</label>
													<label class="col-md-6 lbl">{{$products->product_name}}</label>
												</div>
												@if(count($sizes))
												<div class="form-group row">
													<label class="col-md-6 lbl">Size:</label>
													<div class="col-md-6">
														<select name="product_size" class="form-control">
															@forelse($sizes as $size)
															<option value="{{$size}}">{{$size}}</option>
															@empty
															@endforelse
														</select>
													</div>
												</div>
												@endif
												<div class="form-group row">
													<label class="col-md-6 lbl">Available:
													</label>
													@if($products->quantity>0)
													<label class="col-md-6 lbl">
														In Stock
													</label>
													@else
													<label class="col-md-6 lbl">
														Out of Stock
													</label>
													@endif
												</div>
												@if($products->discount)
												<div class="form-group row">
													<label class="col-md-6 lbl">Discount:</label>
													<label class="col-md-6 lbl">{{$products->discount}}%</label>
												</div>
												@endif
												<div class="form-group row">
													@if($products->discount)
													<?php
													$result=0;
													$result=$products->price-($products->price*$products->discount/100) 
													?>
													<label class="col-md-6 lbl">Price:</label>
													<label class="col-md-6 lbl">
														<del>{{$products->price}} </del> {{$result}} TK
													</label>
													@else
													<label class="col-md-6 lbl">Price:</label>
													<label class="col-md-6 lbl">{{$products->price}} TK</label>
													@endif
												</div>
												<div class="form-group row">
													<label class="col-md-6 lbl">Quantity:</label>
													<input type="number" id="add-cart-quantity" name="quantity" value="1">
												</div>
												<div class=" form-group row">
													<div class="col-md-12">
														<button type="submit" id="add-cart-button" class="btn btn-success col-md-12">Add To Cart</button>
													</div>
													@if(session('message'))
						                            <div class="alert alert-danger m-auto">
						                                {{session('message')}}
						                            </div>
						                            @endif
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row m-auto">
		<div class="col-md-12">
			<div class="row m-auto">
				<div class="col-md-11 m-auto">
					<div class="row m-auto">
						<div class="col-md-2 dvim">
							<img id="im1" class="simg img-fluid" src="{{asset('images/product')}}/{{$products->image1}}" alt="im1" onclick="change();">
						</div>
						<div class="col-md-2 dvim">
							<img id="#" class="simg img-fluid" src="{{asset('images/product')}}/{{$products->image2}}" onclick="change1();">
						</div>
						<div class="col-md-2 dvim">
							<img id="#" class="simg img-fluid" src="{{asset('images/product')}}/{{$products->image3}}" onclick="change2();">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row m-auto">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-10 dvpd m-auto">
					<a href="">Details</a>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-11 m-auto">
							<div class="card col-md-6 cardcontain">
								<div class="card-header"><h3>Product Specifications</h3></div>
								<div class="card-body">
									<p>{{$products->specifications}}</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>
@endsection