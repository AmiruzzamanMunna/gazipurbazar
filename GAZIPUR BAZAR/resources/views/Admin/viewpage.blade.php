@extends('layouts.Admin-home')
@section('title')
	Page Index
@endsection
@section('container')
	<div class="col-md-8 m-auto">
		<div class="row">
			<div class="card" style="margin-top: 90px">
				<div class="card-header">
					<h2>All Page Cover Photo</h2>
				</div>
				<div class="card-body">
					<table class="table table-bordered table-hover table-striped table-responsive-md" id="product-list">
						<tr>
							<th>Sl No</th>
							<th>Image1</th>
							<th>Image2</th>
							
						</tr>
						@forelse($pages as $key=>$product)
						<tr>
                            <td>{{$key+1}}</td>
							<td><a href="{{route('admin.updatePageIndex',[$product->id])}}"><img src="{{asset('images/index')}}/{{$product->image1}}" class="img-fluid" height="400px" width="400px"></a></td>
							<td><a href="{{route('admin.updatePageIndex',[$product->id])}}"><img src="{{asset('images/index')}}/{{$product->image2}}" class="img-fluid" height="400px" width="400px"></a></td>
						</tr>
						@empty
						@endforelse
					</table>
				</div>
				<div class="card-footer">
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-5 m-auto">
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
@endsection