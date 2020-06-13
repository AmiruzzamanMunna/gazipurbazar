@extends('layouts.Admin-home')
@section('title')
	All Product
@endsection
@section('container')
	<div class="col-md-9 m-auto">
		<div class="row">
			<div class="card viewproduct">
				<div class="card-header">
					<h2>All Products</h2>
				</div>
				<div class="card-body">
					<table class="table table-bordered table-hover table-striped" id="product-list">
						<tr>
							<th>Image</th>
							<th>Name</th>
							<th>Code</th>
							<th>Category</th>
							<th>Size</th>
							<th>Price</th>
							<th>Discount %</th>
							<th>Quantity</th>
							<th>New Arrival</th>
						</tr>
						@forelse($products as $product)
						<tr>
							<td><a href="{{route('product.productEdit',[$product->id])}}"><img src="{{asset('images/product')}}/{{$product->image1}}" class="productimage"></a></td>
							<td><a href="{{route('product.productEdit',[$product->id])}}" class="imagelink">{{$product->product_name}}</a></td>
							<td>{{$product->product_code}}</td>
							<td>{{$product->category_name}}</td>
							<td>{{$product->size}}</td>
							<td>{{$product->price}}</td>
							<td>{{$product->discount}}%</td>
							<td>{{$product->quantity}}</td>
							<td>@if($product->newarrival==1)
									Yes
								@else
									No
								@endif
							</td>
						</tr>
						@empty
						@endforelse
					</table>
				</div>
				<div class="card-footer">
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-5 m-auto">
									{{$products->appends(Request::all())->links()}}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
@endsection