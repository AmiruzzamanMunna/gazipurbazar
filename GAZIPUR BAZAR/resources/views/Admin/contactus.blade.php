@extends('layouts.Admin-home')
@section('title')
	Contact Index
@endsection
@section('container')
<div class="row">
  	<div class="container itemhome">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-9 m-auto">
                    <div class="card">
                        <div class="card-header">Contact Page</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <form method="post" enctype="multipart/form-data">
                                    	{{csrf_field()}}
                                        @foreach($events as $event)
                                        <div class="form-group row">
                                            <label class="col-md-2 m-auto">Heading </label>
                                            <div class="col-md-6 m-auto">
                                                <input type="text" class="form-control" name="heading" value="{{$event->heading}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 m-auto">Paragraph</label>
                                            <div class="col-md-6 m-auto">
                                                <textarea rows="4" cols="40" name="paragraph">{{$event->contact}}</textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            @endforeach
                                            <div class="col-sm-3 ml-auto">
                                                <input type="submit" name="" class="btn btn-success" value="Submit">
                                            </div>
                                        </div>
                                        @if($errors->any())
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
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