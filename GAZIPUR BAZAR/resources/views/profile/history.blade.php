@extends('layouts.profile')
@section('title')
    Order History
@endsection
@section('container')
<div class="col-md-10 m-auto">
    <div class="card userorder" style="margin-top: 20px">
        <div class="card-header">
            <h2>Customer info</h2>
        </div>
        <div class="card-body">

            <div class="form-group row">
                <label class="col-md-6">Customer name: </label>
                <label class="col-md-6">{{$users->name}}</label>
                <label class="col-md-6">Customer contact: </label>
                <label class="col-md-6">{{$users->mobile}}</label>
                <label class="col-md-6">Address: </label>
                <label class="col-md-6">{{$users->address}}</label>
            </div>
    
        </div>
    </div>
    <div class="card">
        <div class="card-header"><h2>All Order</h2></div>
        <div class="card-body">
            <table class="table table-bordered table-md table-striped table-responsive-md">
                <tbody>
                    <tr>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Size</th>
                        <th>price</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                    @php
                        $total=0
                    @endphp
                    @forelse($orders as $order)
                    <tr>
                        <td><img src="{{asset('images/product')}}/{{$order->image1}}" height="100px" width="100px"></td>
                        <td>{{$order->product_name}}</td>
                        <td>{{$order->cart_quantity}}</td>
                        <td>{{$order->cart_size}}</td>
                        <td>{{$order->cart_totalprice}}</td>
                        <td>{{$order->orderdate}}</td>
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
                    </tr>
                    @php
                        $total+=$order->cart_totalprice
                    @endphp
                    @empty
                    <h2>Sorry No Product Order is Available</h2>
                    @endforelse
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td colspan="4">Total Price: {{$total}}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="card-footer">
            </div>
            <div class="row">
                <dir class="col-md-12">
                    <div class="row">
                        <div class="col-md-2 m-auto">
                            <!--  -->
                        </div>
                    </div>
                </dir>
            </div>
        </div>
    </div>
</div>    
@endsection