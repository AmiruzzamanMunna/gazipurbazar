@extends('layouts.User-home')
@section('title')
	Footer Page
@endsection
@section('css')

@endsection
@section('container')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-12 footer_aboutus">
						@foreach($footersitem as $footer)
							<h1 class="footer_heading">{{$footer->heading}}</h1>
							<p class="span_paragraph">{{$footer->paragraph}}</p>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection