@extends('layouts.Admin-home')
@section('title')
	Food Index
@endsection
@section('container')
<div class="row">
  	<div class="container itemhome">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-9 m-auto">
                    <div class="card">
                        <div class="card-header">Flowers & Bouquets Index</div>
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
                                            <label class="col-md-2 m-auto">Romance Image 1</label>
                                            <div class="col-md-6 m-auto">
                                                <input type="file" class="form-control" name="image1">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 m-auto">Roses Image 2</label>
                                            <div class="col-md-6 m-auto">
                                                <input type="file" class="form-control" name="image2">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 m-auto">Birthday Image 3</label>
                                            <div class="col-md-6 m-auto">
                                                <input type="file" class="form-control" name="image3">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 m-auto">Anniversary Image 4</label>
                                            <div class="col-md-6 m-auto">
                                                <input type="file" class="form-control" name="image4">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 m-auto">Thank You Image 5</label>
                                            <div class="col-md-6 m-auto">
                                                <input type="file" class="form-control" name="image5">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 m-auto">Sympathy Image 6</label>
                                            <div class="col-md-6 m-auto">
                                                <input type="file" class="form-control" name="image6">
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