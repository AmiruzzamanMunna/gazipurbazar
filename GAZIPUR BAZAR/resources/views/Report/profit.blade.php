@extends('layouts.Admin-home')
@section('title')
    Profit Report
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
			<div class="card-header"><h2>Report</h2></div>
			<div class="card-body col-sm-12">
				<div class="row">
					<table class="table table-bordered table-responsive table-hover">

                        <thead>

                            <tr>
                                <th>Sl No</th>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Discount</th>
                                <th>Getting Price</th>
                                <th>Selling Price</th>
                                <th>Total Quantity</th>
                                <th>Total Price</th>
                                <th>Total Amount</th>
                                <th>Profit</th>
                            </tr>

                        </thead>
                        <tbody>

                            @php
                            $total=0;
                            @endphp
                            @foreach($datas as $key=>$order)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td><img src="{{asset('images/product')}}/{{$order->image1}}" alt="" height="60px" width="60px"></td>
                                <td>{{$order->product_name}}</td>
                                <td>{{$order->discount}} %</td>
                                <td>{{$order->price}}</td>
                                <td>{{$order->sellingPrice}}</td>
                                <td>{{$order->totalQuantity}}</td>
                                <td>{{$order->total}}</td>
                                <td>{{$order->orderTotal}}</td>
                                <td>{{$order->profit}}</td>
                                @php
                                    $total+=$order->profit
                                @endphp
                            </tr>
                            @endforeach

                        </tbody>
						
                        
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td colspan="4"><h3>Total Profit - {{$total}}</h3></td>
                            </tr>
                        </tfoot>
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