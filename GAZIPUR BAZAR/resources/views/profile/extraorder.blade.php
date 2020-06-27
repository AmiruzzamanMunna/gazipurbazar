@extends('layouts.profile')
@section('title')
    Extra Order
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
        <div class="card-header"><h2>Extra Item Order</h2></div>
        <div class="card-body">
            <table class="table table-bordered table-md table-striped table-responsive-md">
                <tbody>
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
                        <td><img src="{{asset('images/extra')}}/{{$order->tbl_extra_image}}" height="100px" width="100px"></td>
                        <td>{{$order->tbl_extra_name}}</td>
                        <td>{{$order->tbl_extra_quantity}}</td>
                        <td>{{$order->tbl_extra_price}}</td>
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
                
                    </tr>
                </tbody>
                <tfoot>
                    
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