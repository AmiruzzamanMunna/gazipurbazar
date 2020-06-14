@extends('layouts.profile')
@section('title')
    Update Profile
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
        <div class="card-header"><h2>Update Profile</h2></div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-10 col-xl-10 col-sm-10 col-lg-10 ml-auto">
                    <form method="POST">
                        {{csrf_field()}}
                        
                        <div class="form-group row">
                            <label class="col-md-4">Name:</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{$users->name}}">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-md-4">Email:</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{$users->email}}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4">Mobile:</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="mobile" value="{{$users->mobile}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4">Mobile2:</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="mobile2" value="{{$users->mobile2}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4">Address:</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="address" value="{{$users->address}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4">Password:</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4">Confirm Password:</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="confirm_password">
                            </div>
                            <input type="hidden" name="tokenVal" id="tokenVal" value="{{$users->password}}">
                        </div>
                        
                    </form>
                    <div class="row">
                        <div class="col-md-3 ml-auto">
                            <input type="submit" class="btn btn-success" name="" value="Update">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">

            <div style="color: red">
                @if ($errors->any())
                
                @foreach ($errors->all() as $error)
                    {{$error}}
                @endforeach
                
            @endif
            </div>
            
        </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 m-auto">
                            @if(session('message'))
                                <div class="alert alert-success m-auto">
                                    {{session('message')}}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection