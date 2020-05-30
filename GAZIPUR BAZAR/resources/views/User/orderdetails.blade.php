@extends('layouts.User-Home')
@section('title')
    User
@endsection
@section('css')
@endsection
@section('script')
@endsection
@section('container')
    <div class="col-md-8 m-auto">
        <div class="card userorder">
            <div class="card-header">
                <h2>Customer info</h2>
            </div>
            <div class="card-body">
                @forelse($users as $order)
                <div class="form-group row">
                    <label class="col-md-6">Customer name: </label>
                    <label class="col-md-6">{{$order->name}}</label>
                    <label class="col-md-6">Customer contact: </label>
                    <label class="col-md-6">{{$order->mobile}}</label>
                    <label class="col-md-6">Address: </label>
                    <label class="col-md-6">{{$order->address}}</label>
                </div>
                @break
                @empty
                @endforelse
            </div>
        </div>
        <div class="card">
            <div class="card-header"><h2>All Order</h2></div>
            <div class="card-body">
                <table class="table table-bordered table-md table-striped">
                    <tr>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Product Size</th>
                        <th>Status</th>
                    </tr>
                    @forelse($orders as $order)
                    <tr>
                        <td><img src="{{asset('images/product')}}/{{$order->image1}}" id="accountimage"></td>
                        <td>{{$order->product_name}}</td>
                        <td>{{$order->cart_quantity}}</td>
                        <td>{{$order->cart_size}}</td>
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
                    @empty
                    <h2>Sorry No Product Order is Available</h2>
                    @endforelse
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
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