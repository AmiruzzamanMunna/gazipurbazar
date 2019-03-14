@extends('layouts.Admin-home')
@section('title')
	Toys & Show Index
@endsection
@section('container')
<div class="row">
  	<div class="container itemhome">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-9 m-auto">
                    <div class="card">
                        <div class="card-header">Toys & Show Index Page</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <form method="post" enctype="multipart/form-data">
                                    	{{csrf_field()}}
                                        @foreach($events as $event)
                                        <div class="form-group row">
                                            <label class="col-md-2 m-auto">Heading 1</label>
                                            <div class="col-md-6 m-auto">
                                                <input type="text" class="form-control" name="heading1" value="{{$event->heading1}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 m-auto">Paragraph</label>
                                            <div class="col-md-6 m-auto">
                                                <input type="text" class="form-control" name="paragraph" value="{{$event->paragraph}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 m-auto">Toys Image 1</label>
                                            <div class="col-md-6 m-auto">
                                                <input type="file" class="form-control" name="image1">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 m-auto">Show Piece Image 2</label>
                                            <div class="col-md-6 m-auto">
                                                <input type="file" class="form-control" name="image2">
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