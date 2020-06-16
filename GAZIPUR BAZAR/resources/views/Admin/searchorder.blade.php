@extends('layouts.Admin-home')
@section('title')
	Search Order
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
                <form action="{{route('order.searchOrderResult')}}">
                    @if ($date)

                    <input type="date" name="search" id="" class="form-control col-md-6" value="{{$date}}">
                    @else
                    <input type="date" name="search" id="" class="form-control col-md-6">
                    @endif
                    @if ($name)

                    <input type="text" name="name" id="" class="form-control col-md-6" value="{{$name}}">
                    @else
                    <input type="text" name="name" id="" class="form-control col-md-6">
                    @endif
                    
                    <input type="submit" name="" id="" class="btn btn-success col-md-6" value="Search">
                </form>
			<div class="card-header"><h2>Search Order</h2></div>
			<div class="card-body col-sm-12">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<tr>
							<th>Sl No</th>
							<th>Customer Name</th>
							<th>Mobile</th>
							<th>Address</th>
							<th>Order Date</th>
							<th>Status</th>
							<th>Details</th>
						</tr>
						@foreach($orders as $key=>$order)
						<tr>
							<td>{{$key+1}}</td>
							<td>{{$order->name}}</td>
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
								{{$orders->appends(Request::all())->links()}}
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