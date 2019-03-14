@extends('layouts.User-Home')
@section('title')
	User Profile
@endsection
@section('css')
	<link rel="stylesheet" type="text/css" href="{{asset('css')}}/order.css">

@endsection
@section('script')
@endsection
@section('container')
	<div class="col-md-5 m-auto">
        <div class="card userorder">
            <div class="card-header">User info</div>
            <div class="card-body">
                <div class="form-group row">
                    @foreach($users as $customer)
                    <label class="col-md-6">Name</label>
                    <label class="col-md-6">{{$customer->name}}</label>
                    <label class="col-md-6">Email</label>
                    <label class="col-md-6">{{$customer->email}}</label>
                    <label class="col-md-6">Mobile</label>
                    <label class="col-md-6">{{$customer->mobile}}</label>
                    <label class="col-md-6">Address</label>
                    <label class="col-md-6">{{$customer->address}}</label>
                    @endforeach
                </div>
                <div class="row">
                    @forelse($orders as $order)
                    <div class="col-md-6">
                       <a href="{{route('user.customerOrder',[$order->user_id])}}" class="btn btn-primary">All Order</a>
                    </div>
                    @break
                    @empty
                    @endforelse
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <dir class="col-md-12">
                        <div class="row">
                            <div class="col-md-2 m-auto">
                              
                            </div>
                        </div>
                    </dir>
                </div>
            </div>
        </div>
	</div>
@endsection