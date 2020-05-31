@extends('layouts.Admin-home')
@section('title')
	Admin Home
@endsection
@section('css')
	
@endsection
@section('script')
@endsection
@section('container')
<div class="col-md-8 col-sm-12 m-auto">
	<div class="row">
		<div class="col-md-12">
			<div class="card ordercard">
				<div class="card-header">Dash Board</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-3">
							<div class="card">
								<div class="card-header">Current Order</div>
								<div class="card-body">
									<img src="{{asset('images')}}/order1.png" class="orderimage">
									<div><h1>{{$current_order}}</h1></div>
								</div>
								<div class="card-footer">
									<a href="{{route('order.orderShow')}}" class="orderlink">Details....</a>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="card">
								<div class="card-header">Order Pending</div>
								<div class="card-body">
									<img src="{{asset('images')}}/cart4.png" class="orderimage">
									<div><h1>{{$current_pending}}</h1></div>
								</div>
								<div class="card-footer">
									<a href="{{route('admin.orderPending')}}" class="orderlink">Details....</a>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="card">
								<div class="card-header">Total Delivered</div>
								<div class="card-body">
									<img src="{{asset('images')}}/cart6.png" class="orderimage">
									<div><h1>{{$current_deliver}}</h1></div>
								</div>
								<div class="card-footer">
									<a href="{{route('admin.orderDelivered')}}" class="orderlink">Details....</a>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="card">
								<div class="card-header">Total Canceled</div>
								<div class="card-body">
									<img src="{{asset('images')}}/cart5.png" class="orderimage">
									<div><h1>{{$current_cancel}}</h1></div>
								</div>
								<div class="card-footer">
									<a href="{{route('admin.orderCanceled')}}" class="orderlink">Details....</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
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
							<td>{{date('h:i:s a d-m-y',strtotime($order->Order_date))}}</td>
							<td>
								@if($order->status==1)
                                	<span class="badge badge-primary" style="font-size: medium">Pending</span>
								@elseif($order->status==2)
									<span class="badge badge-success" style="font-size: medium">Delivered</span>
								@elseif($order->status==3)
									<span class="badge badge-warning" style="font-size: medium">Received</span>
								@else
									<span class="badge badge-danger" style="font-size: medium">Cancel</span>
								@endif
							</td>
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