@extends('layouts.User-home')
@section('title')
	Product Details
@endsection
@section('script')

<script type="text/javascript">
	function change() {
		var img=document.getElementById('td1');
		img.src="{{asset('images/product')}}/{{$products->image1}}";
	}
	function change1() {
		var img=document.getElementById('td1');
		img.src="{{asset('images/product')}}/{{$products->image2}}";
	}
	function change2() {
		var img=document.getElementById('td1');
		img.src="{{asset('images/product')}}/{{$products->image3}}";
	}

</script>
@endsection
@section('container')
<div class="container-fluid" id="addcart">
	<div class="row ml-auto">
		<div class="col-md-12">
			<div class="row ml-auto">
				<div class="table col-md-4 dvtb ml-auto">
					<table class="table-bordered">
						<tr>
							<th>Product</th>
						</tr>
						<tr>
							<td><img id="td1" class="tbimg img-fluid" src="{{asset('images/product')}}/{{$products->image1}}" alt="td1"></td>
						</tr>
					</table>
				</div>
				<div class="col-md-5 m-auto cat">
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-12">
								
									<?php
										$result=0;
									?>
									<div class="card crd">
										<h4 class="m-auto">Product Description</h4>
										<div class="card-body">
											<input type="hidden" name="product_id" id="add-cart-id" value="{{$products->id}}">
											<input type="hidden" name="productimage" id="productimage" value="{{$products->image1}}">
											<input type="hidden" name="productname" id="productname" value="{{$products->product_name}}">
											<div class="form-group row">
												<label class="lbl">Category &nbsp;:</label>
												<label class="lbl">{{$products->category_name}}</label>
											</div>
											<div class="form-group row">
												<label class="lbl">Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</label>
												<label class="lbl">{{$products->product_name}}</label>
											</div>
											@if(count($sizes))
											<div class="form-group row">
												<label class="lbl">Size&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</label>
												<div class="lbl">
													<select name="product_size" id="product_size" class="form-control">
														@forelse($sizes as $size)
														<option value="{{$size}}">{{$size}}</option>
														@empty
														@endforelse
													</select>
												</div>
											</div>
											@endif
											<div class="form-group row">
												<label class="lbl">Available &nbsp;:
												</label>
												@if($products->quantity>0)
												<label class="lbl">
													{{$products->quantity}}
												</label>
												@else
												<label class="lbl">
													Out of Stock
												</label>
												@endif
												@if ($products->unit!='0')

												<label class="lbl">
													({{$products->unit}})
												</label>
													
												@endif
												
											</div>
											@if($products->discount)
											<div class="form-group row">
												<label class="lbl">Discount &nbsp;&nbsp;:</label>
												<label class="lbl">{{$products->discount}}%</label>
											</div>
											@endif
											<div class="form-group row">
												@if($products->discount)
												<?php
												$result=0;
												$result=$products->price-($products->price*$products->discount/100) 
												?>
												<label class="lbl">Price &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
												<label class="lbl">
													<del>{{$products->price}} </del> {{$result}} TK
												</label>
												@else
												<label class="lbl">Price &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
												<label class="lbl">{{$products->price}} TK</label>
												@endif
											</div>
											@if($products->unit!='0')
											<div class="form-group row">
												<label class="lbl">Quantity &nbsp;&nbsp;:</label>
												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button @click="removeNum()" style="font-size:14px"><i class="fas fa-minus"></i></i></button><input type="number" class="form-control col-2" id="quantity" name="quantity" id="quantity" value="1"><button style="font-size:14px" @click="addNum()"><i class="fa fa-plus"></i></button>
												<div id='msg'></div>
											</div>
											<div class=" form-group row">
												<div class="col-md-12">
													<button type="submit" @click="addCart()" id="add-cart-button" class="btn btn-success col-md-12">Add To Cart</button>
												</div>
												@if(session('message'))
												<div class="alert alert-danger m-auto">
													{{session('message')}}
												</div>
												@endif
											</div>
											@endif
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row m-auto">
		<div class="col-md-12">
			<div class="row m-auto">
				<div class="col-md-11 m-auto">
					<div class="row m-auto">

						@if ($products->image1)
							
							<img id="im1" style="margin-top: 15px; margin-left:38px" height="90px" width="70px" class="img-fluid" src="{{asset('images/product')}}/{{$products->image1}}" alt="im1" onclick="change();">
											
						@endif
						@if ($products->image2)
							
							<img id="im1" style="margin-top: 15px; margin-left:38px" height="90px" width="70px" class="img-fluid" src="{{asset('images/product')}}/{{$products->image2}}" alt="im1" onclick="change();">
											
						@endif
						@if ($products->image3)
							
							<img id="im1" style="margin-top: 15px; margin-left:38px" height="90px" width="70px" class="img-fluid" src="{{asset('images/product')}}/{{$products->image3}}" alt="im1" onclick="change();">
											
						@endif
						
						
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row m-auto">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-10 dvpd m-auto">
					{{-- <a href="">Details</a> --}}
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-11 m-auto">
							<div class="card col-md-6 cardcontain">
								<div class="card-header"><h3>Product Specifications</h3></div>
								<div class="card-body">
									<p>{{$products->specifications}}</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>
<style>
	/* Chrome, Safari, Edge, Opera */
	input::-webkit-outer-spin-button,
	input::-webkit-inner-spin-button {
	  -webkit-appearance: none;
	  margin: 0;
	}
	
	/* Firefox */
	input[type=number] {
	  -moz-appearance: textfield;
	}
	</style>
@section('vue')

<script>



	var app=new Vue({

		el:"#addcart",

		data:{

			check:""
		},
	
		methods:{

			addCart:function(){

				console.log("click");

				var product_id=$("#add-cart-id").val();
				var productimage=$("#productimage").val();
				var productname=$("#productname").val();
				var product_size=$("#product_size").val();
				var quantity=$("#quantity").val();
				
				axios.post('/cart/add',{
					'product_id':product_id,
					'productimage':productimage,
					'productname':productname,
					'product_size':product_size,
					'quantity':quantity,
				}).then(response=>{

					(response.data.status=='login')?location.replace("{{route('user.login')}}"):$(".cartVal").html(response.data.qnty),
					(response.data.status=='error')?$("#bladeshow").html(response.data.error):$("#bladeshow").html(response.data.error),
					(response.data.status=='qnty')?$("#msg").html('<div style="margin-top:10px" class="alert alert-warning alert-dismissible fade show qnty" role="alert"><strong>Sorry!</strong> Give a Valid Quantity.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'):$(".qnty").show()
				}).catch(function(e){

					console.log(e);
				});

			},
			addNum:function(){

				var quantity=$("#quantity").val();
				
				$("#quantity").val(parseInt(quantity)+1);

			},
			removeNum:function(){

				var quantity=$("#quantity").val();

				if(quantity>=1){

					$("#quantity").val(parseInt(quantity)-1);

				}else{

					return $("#quantity").val(1);

				}
				
				

			}
		},
		mounted:function(){

			console.log('hahah');
		}
	});
</script>
	
@endsection
@endsection