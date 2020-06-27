@extends('layouts.User-home')
@section('title')
	Extra Order
@endsection
@section('validate')
	<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery/jquery-1.4.4.min.js"></script>
	<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
	

@endsection
@section('container')
<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-8 col-sm-10 col-xl-8 col-lg-8 m-auto">
						<div class="card userregistration">
							<div class="card-header">
								<h2>Extra Order</h2>
							</div>
							<div class="card-body">
								<form id="validate" method="post" enctype="multipart/form-data">
									@csrf
									<div class="form-group row">
										<label class="col-md-4">Item Name:</label>
										<div class="col-md-8">
											<input type="text" name="name" value="{{old('name')}}" class="form-control">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-4">Image(for our better understanding):</label>
										<div class="col-md-8">
											<input type="file" name="tbl_extra_image" id="image" class="form-control" value="{{old('tbl_extra_image')}}">
											<img id="src1" height="100px" width="100px">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-4">Quantity:</label>
										<div class="col-md-8">
											<input type="number" name="quantity" class="form-control" value="{{old('address')}}">
										</div>
									</div>
									<div class="error">
										@if($errors->any())
											<ul>
												@foreach($errors->all() as $error)
													<li>{{$error}}</li>
												@endforeach
											</ul>
										@endif
									</div>
									<div class="row">
										<div class="col-md-12 col-lg-12 col-sm-12 col-xl-12">
											<div class="row">
												
												<input type="reset" class="btn btn-primary col-4 m-auto" name="reset" value="Reset">
												
												<input type="submit" class="btn btn-success col-4 m-auto"  id="submitForm" name="submit" value="Order">
												
											</div>
										</div>
									</div>
								</form>
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
	<style>
		.error{

			color: red;
		}
	</style>
	<script>

		$("#exist").hide();

		$("#validate").validate({

			rules:{

				name:{

					required:true,

				},
				quantity:{
					required:true,
				},
				

			}
		});

	$(document).ready(function() {

		$('#image').change(function (event) {
		var output = $("#src1")[0];
			output.src = URL.createObjectURL(event.target.files[0]);
		});

	});

		function validEmailCheck(){

			var email=$("#email").val();
			console.log(email);

			$.ajax({

				type:'get',
				url:"{{route('user.emailValidate')}}",
				data:{
					
					email:email,
				},
				success:function(data){

					if(data.status=='exist'){

						$("#exist").show();
					}else{

						$("#exist").hide();
					}
				},
				error:function(error){

					console.log(error);
				}
			});

		}
		
	</script>
@endsection