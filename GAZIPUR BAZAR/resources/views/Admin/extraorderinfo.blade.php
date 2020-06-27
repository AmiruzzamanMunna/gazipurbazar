@extends('layouts.Admin-home')
@section('title')
	Extra Order Information
@endsection
@section('css')
@endsection
@section('script')
@endsection
@section('container')
<div class="col-md-8 m-auto">
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<div class="card orderinfo">
			<div class="card-header">
				<h2>Customer info</h2>
			</div>
			<div class="card-body">
				@forelse($orders as $order)
				<div class="form-group row">
					<label class="col-md-6">Customer name: </label>
					<label class="col-md-6">{{$order->name}}</label>
					<label class="col-md-6">Customer contact: </label>
					<label class="col-md-6">{{$order->mobile1}}</label>
					<label class="col-md-6">Address: </label>
					<label class="col-md-6">{{$order->address}}</label>
					<label class="col-md-6">Order date: </label>
					<label class="col-md-6">{{date('h:i:s a d-m-y',strtotime($order->orderdate))}}</label>
					<label class="col-md-6">Status: </label>
					<label class="col-md-6">
						@if($order->tbl_extra_status==1)
							<span class="badge badge-primary" style="font-size: medium">Pending</span>
						@elseif($order->tbl_extra_status==2)
							<span class="badge badge-success" style="font-size: medium">Delivered</span>
						@elseif($order->tbl_extra_status==3)
							<span class="badge badge-warning" style="font-size: medium">Received</span>
						@else
							<span class="badge badge-danger" style="font-size: medium">Cancel</span>
						@endif
					</label>
				</div>
				@break
				@empty
				@endforelse
			</div>
		</div>
		<div class="card">
			<div class="card-header"><h2>All All Order</h2></div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered table-md table-striped">
						<tr>
							<th>Image</th>
							<th>Item Name</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Status</th>
						</tr>
						@php
							$total=0
						@endphp
						@forelse($orders as $order)
						<tr>
							<td><img src="{{asset('images/extra')}}/{{$order->tbl_extra_image}}" id="orderimage"></td>
							<td>{{$order->tbl_extra_name}}</td>
							<td>{{$order->tbl_extra_quantity}}</td>
							<td><input type="text" value="{{$order->tbl_extra_price}}" id="amount" class="form-control"><input type="hidden" id="id" value="{{$id}}" class="form-control"><button type="button" onclick="updateOrderPrice()" class="btn btn-success">Submit</td>
							<td>
								@if($order->tbl_extra_status==1)
                                	<span class="badge badge-primary" style="font-size: medium">Pending</span>
								@elseif($order->tbl_extra_status==2)
									<span class="badge badge-success" style="font-size: medium">Delivered</span>
								@elseif($order->tbl_extra_status==3)
									<span class="badge badge-warning" style="font-size: medium">Received</span>
								@else
									<span class="badge badge-danger" style="font-size: medium">Cancel</span>
								@endif
							</td>
							@php
								$total+=$order->tbl_extra_price
							@endphp
						</tr>
						@empty
						@endforelse
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td>Total Price: {{$total}} TK</td>
							<td></td>
						</tr>
					</table>
				</div>
			</div>
			<div class="card-footer">
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							
							<div class="col-md-3 ml-auto">
								<button type="button" class="btn btn-danger"><a href="{{route('order.extraStatusCancel',[$id])}}">Canceled</a></button>
							</div>
							<div class="col-md-3 m-auto">
								<button type="button" class="btn btn-warning"><a href="{{route('order.extraStatusReceived',[$id])}}">Received</a></button>
							</div>
							<div class="col-md-2 mr-auto">
								<button type="button" class="btn btn-success"><a href="{{route('order.extraStatusdelivered',[$id])}}">Delivered</a></button>
							</div>
							
						</div>
					</div>
				</div>	
			</div>
		</div>
	</div>
</div>

<script>

    function updateOrderPrice(){

        var id=$("#id").val();
        var amount=$("#amount").val();

        $.ajax({

            type:"get",
            url:"{{route('order.updateOrderPrice')}}",
            data:{
                id:id,
                amount:amount
            },
            success:function(data){

                if(data.status=='ok'){

                    location.reload();
                }
            }
        })
    }
</script>
@endsection