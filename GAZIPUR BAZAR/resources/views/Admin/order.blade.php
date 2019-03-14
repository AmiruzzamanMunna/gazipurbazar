@extends('layouts.Admin-home')
@section('title')
	Order
@endsection
@section('css')
	
@endsection
@section('script')
@endsection
@section('container')
<div class="col-md-8 col-sm-12 m-auto">
	<div class="row">
		<div class="col-md-12 col-sm-12 ordercard">
			<div class="card">
			<div class="card-header"><h2>All Order</h2></div>
			<div class="card-body col-sm-12">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<tr>
							<th>Customer Name</th>
							<th>Mobile</th>
							<th>Address</th>
							<th>Order Date</th>
							<th>Status</th>
							<th>Details</th>
						</tr>
						@foreach($orders as $order)
						<tr>
							<td>{{$order->Username}}</td>
							<td>{{$order->mobile}}</td>
							<td>{{$order->address}}</td>
							<td>{{$order->Order_date}}</td>
							<td>{{$order->name}}</td>
							<td><a href="{{route('order.orderInfoShow',$order->id)}}" class="order btn btn-success">Show</a></td>
						</tr>
						@endforeach
					</table>
				</div>
			</div>
			<div class="card-footer">
				<div class="row">
					<dir class="col-md-12">
						<div class="row">
							<div class="col-md-3 m-auto">
								{{$orders->links()}}
							</div>
						</div>
					</dir>
				</div>
			</div>
		</div>
		</div>
	</div>
</div>
@endsection