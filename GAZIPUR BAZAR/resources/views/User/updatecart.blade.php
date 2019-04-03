@extends('layouts.User-home')
@section('title')
	Details
@endsection
@section('container')
	<div class="container-fluid">
		<div class="row ml-auto">
			<div class="col-md-12">
				<div class="row ml-auto">
					<div class="col-md-5 m-auto cat">
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-12">
										@foreach($cart as $cart_item)
										<form method="post">
											{{csrf_field()}}
											<div class="card crd">
													<h4 class="m-auto">Product Name:{{$cart_item->productname}}</h4>
												<div class="card-body">
													
													<div class="form-group row">
														<label class="col-md-6">Quantity:</label>
														<input type="number" name="quantity" value="{{$cart_item->quantity}}">
														@if($errors->any())
															<ul class="m-auto">
																@foreach($errors->all() as $error)
																	<li>{{$error}}</li>
																@endforeach
															</ul>
														@endif
													</div>
													<div class=" form-group row">
														<div class="col-md-7 m-auto">
															<button type="submit" id="add-cart-button" class="btn btn-success col-md-8">Update Quantity</button>
														</div>
														@if(Session('message'))
														<div class="alert alert-danger m-auto">
															{{session('message')}}
														</div>
														@endif
													</div>
												</div>
											</div>
											@endforeach
										</form>
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