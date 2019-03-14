@extends('layouts.User-home')
@section('title')
	CheckOut Voucher
@endsection
@section('css')
@endsection
@section('script')
@endsection
@section('container')
<div class="col-md-8 m-auto">
	<div class="row">
		<div class="col-md-12">
			<form class="form" method="GET">
				<div class="card cardinvoice">
					<div class="card-header">Order Information</div>
						<div class="card-body">
							@forelse($users as $user)
							<div class="form-group row">
								<label class="col-md-6">Name:</label>
								<label class="col-md-6">{{$user->name}}</label>
							</div>
							<div class="form-group row">
								<label class="col-md-6">Address:</label>
								<label class="col-md-6">{{$user->address}}</label>
							</div>
							<div class="form-group row">
								<label class="col-md-6">E-Mail:</label>
								<label class="col-md-6">{{$user->email}}</label>
							</div>
							@break
							@empty
							@endforelse
							@forelse($users as $user)
							<div class="form-group row">
								<label class="col-md-6">Order No:</label>
								<label class="col-md-6">{{$user->id}}</label>
							</div>
							<div class="form-group row">
								<label class="col-md-6">Product Category</label>
								<label class="col-md-6">{{$user->category_name}}</label>
							</div>
							<div class="form-group row">
								<label class="col-md-6">Product Name</label>
								<label class="col-md-6">{{$user->product_name}}</label>
							</div>
							<div class="form-group row">
								<label class="col-md-6">Order Date</label>
								<label class="col-md-6">{{$user->orderdate}}</label>
							</div>
							@empty
							@endforelse
							<div class="form-group row">
								<label class="col-md-6">Total Price</label>
								<label class="col-md-6">{{$totalprice}} TK</label>
							</div>
						</div>
					<div class="card-footer">Thank You for your Order</div>
				</div>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3 ml-auto">
					@foreach($users as $user)
					<a href="{{route('pdf.pdfdownload',[$id])}}" class="btn btn-success col-md-12">Download</a>
					@break
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@endsection