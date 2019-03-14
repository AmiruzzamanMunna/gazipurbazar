@extends('layouts.Admin-home')
@section('title')
	Hospitality Event
@endsection
@section('container')
<div class="row">
  	<div class="container itemhome">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-9 m-auto">
                    <div class="card">
                        <div class="card-header">Hospitality Event Page</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <form method="post" enctype="multipart/form-data">
                                    	{{csrf_field()}}
                                        @foreach($events as $event)
                                        <div class="form-group row">
                                            <label class="col-md-2 m-auto">Image 1</label>
                                            <div class="col-md-6 m-auto">
                                                <input type="file" class="form-control" name="image1">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 m-auto">Image 2</label>
                                            <div class="col-md-6 m-auto">
                                                <input type="file" class="form-control" name="image2">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 m-auto">Image 3</label>
                                            <div class="col-md-6 m-auto">
                                                <input type="file" class="form-control" name="image3">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 m-auto">Heading 1</label>
                                            <div class="col-md-6 m-auto">
                                                <input type="text" class="form-control" name="heading1" value="{{$event->heading1}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 m-auto">Paragraph 1</label>
                                            <div class="col-md-6 m-auto">
                                                <textarea type=text rows="4" cols="45" class="col" name="paragraph1">{{$event->paragraph1}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 m-auto">Heading 2</label>
                                            <div class="col-md-6 m-auto">
                                                <input type="text" class="form-control" name="heading2" value="{{$event->heading2}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 m-auto">Paragraph 2</label>
                                            <div class="col-md-6 m-auto">
                                                <textarea type=text rows="4" cols="45" class="col" name="paragraph2">{{$event->paragraph2}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 m-auto">Heading 3</label>
                                            <div class="col-md-6 m-auto">
                                                <input type="text" class="form-control" name="heading3" value="{{$event->heading3}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 m-auto">Paragraph 3</label>
                                            <div class="col-md-6 m-auto">
                                                <textarea type=text rows="4" cols="45" class="col" name="paragraph3">{{$event->paragraph3}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 m-auto">Heading 4</label>
                                            <div class="col-md-6 m-auto">
                                                <input type="text" class="form-control" name="heading4" value="{{$event->heading4}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 m-auto">Paragraph 4</label>
                                            <div class="col-md-6 m-auto">
                                                <textarea type=text rows="4" cols="45" class="col" name="paragraph4">{{$event->paragraph4}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 m-auto">Heading 5</label>
                                            <div class="col-md-6 m-auto">
                                                <input type="text" class="form-control" name="heading5" value="{{$event->heading5}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 m-auto">Paragraph 5</label>
                                            <div class="col-md-6 m-auto">
                                                <textarea type=text rows="4" cols="45" class="col" name="paragraph5">{{$event->paragraph5}}</textarea>
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