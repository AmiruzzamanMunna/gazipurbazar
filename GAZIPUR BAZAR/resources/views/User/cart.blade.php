@extends("layouts.User-home")
@section('title')
	Cart
@endsection
@section('container')
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="row">
        	<div class="col-md-7 col-sm-12 m-auto">
        		<div class="card cartcard">
        			<form method="">
        				{{csrf_field()}}
		            	<div class="card-header">Cart</div>
		            	<div class="card-body col-md-12 col-sm-10">
		            		<div class="table-responsive">
		            			<table class="table table-bordered table-striped table-hover">
				                    <tr>
				                        <th>User id</th>
				                        <th>Product Id</th>
				                        <th>Quantity</th>
				                        <th>Size</th>
				                        <th>Unit Price</th>
				                        <th>Subtotal</th>
				                        <th>Remove</th>
				                        <th>Update</th>
				                    </tr>
				                    @forelse($carts as $cart)
				                    <?php
			                    	$subtotal=0;
			                    	$subtotal=$cart->quantity*$cart->unit_price;
				                    ?>
				                    <tr>
				                    	<td>{{$cart->user_id}}</td>
				                    	<td>{{$cart->product_id}}</td>
				                    	<td>{{$cart->quantity}}</td>
				                    	<td>{{$cart->size}}</td>
				                    	<td>{{$cart->unit_price}}</td>
				                    	<td>{{$subtotal}}</td>
				                    	<td><a href="{{route('cart.cartRemove',[$cart->id])}}" class="cart_link">Remove</a></td>
				                    	<td><a href="{{route('cart.cartEdit',[$cart->id])}}" class="cart_link">Update</a></td>
				                    </tr>
				                	@empty
				                	<h1>Sorry No Product is Available</h1>
				                	@endforelse
		           			 	</table>
		           			 	<div class="row">
		           			 		<div class="col-md-12">
		           			 			<div class="row">
		           			 				<div class="col-md-5 ml-auto">
		           			 					<label class="pull-right">Total Price: {{$totals}} TK</label>
		           			 				</div>
		           			 			</div>
		           			 		</div>
		           			 	</div>
		            		</div>
            			</div>
            			<div class="card-footer">
            				<div class="row">
        					<div class="col-md-6 m-auto">
            					<a href="{{route('user.index')}}" class="btn btn-primary cart_link">Go Shopping</a>
            				</div>
            				<div class="col-md-4 ml-auto">
            					<a href="{{route('order.checkOut')}}" class="btn btn-success col-md-7 cart_link">Check Out</a>
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