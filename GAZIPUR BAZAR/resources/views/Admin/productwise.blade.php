@extends('layouts.Admin-home')
@section('title')
	Product Wise Ordered
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
							<th>Sl No</th>
							<th>Image</th>
							<th>Product Name</th>
							<th>Product Ordered</th>
						</tr>
						@foreach($datas as $order)
						<tr>
							<td>{{$order->id}}</td>
							<td><img src="{{asset('images/product')}}/{{$order->image1}}" alt="" height="60px" width="60px"></td>
							<td>{{$order->product_name}}</td>
                            <td>
                                @if ($order->productOrdered>=2)

                                    <span class="badge badge-success">{{$order->productOrdered}}</span>
                                    
                                @else

                                    {{$order->productOrdered}}
                                    
                                @endif
                                
                            </td>
							
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