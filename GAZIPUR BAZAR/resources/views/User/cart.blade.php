@extends("layouts.User-home")
@section('title')
	Cart
@endsection
@section('container')
<div class="row" id="cartDetails">
	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Product Update</h5>
				
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="">Product Name</label>
						<input type="text" name="" id="upname" readonly class="form-control">
						<input type="hidden" id="upid">
					</div>
					<div class="form-group">
						<label for="">Quantity</label>&nbsp;<label id="avail"></label>
						<input type="text" name="" id="upquantity" class="form-control">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" @click="cartSave()">Save changes</button>
				</div>
			</div>
		</div>
  	</div>
    <div class="col-md-12 col-sm-12">
        <div class="row">
        	<div class="col-md-7 col-sm-12 m-auto">
        		<div class="card cartcard">
        			<form method="">
        				{{csrf_field()}}
		            	<div class="card-header">Cart</div>
		            	<div class="card-body col-md-12 col-sm-10">
		            		<div class="table-responsive">
		            			<table class="table table-bordered table-striped table-hover">
				                    <tr>
				                        <th>Sl No</th>
				                        <th>Image</th>
				                        <th>Name</th>
				                        <th>Quantity</th>
				                        <th>Size</th>
				                        <th>Unit Price</th>
				                        <th>Subtotal</th>
				                        <th>Action</th>
				                    </tr>
				                    
				                    <tr v-for="data in getData">

										<td>@{{data.key}}</td>
										<td><img id="td1" class="cartimg img-fluid" v-bind:src="data.image" alt="td1"></td>
				                    	<td>@{{data.name}}</td>
				                    	<td>@{{data.quantity}}</td>
				                    	<td>@{{data.size}}</td>
				                    	<td>@{{data.unit_price}}</td>
										<td>@{{data.subtotal}}</td>
				                    	<td>
											<div class="row">
												<div class="row m-auto">
													<i class="fas fa-trash-alt" @click="cartRemove(data.id)"></i>
												</div>
												<div class="row m-auto">
													<i class="fas fa-edit" @click="cartUpdate(data.id)"></i>
												</div>
											</div>
										</td>
				                    	
				                    </tr>

		           			 	</table>
		           			 	<div class="row">
		           			 		<div class="col-md-12">
		           			 			<div class="row">
		           			 				<div class="col-md-5 ml-auto">
		           			 					<label class="pull-right" id="total">Total Price:  TK</label>
		           			 				</div>
		           			 			</div>
		           			 		</div>
		           			 	</div>
		            		</div>
            			</div>
            			<div class="card-footer">
            				<div class="row m-auto">
								<div class="col-6 ml-auto">
									<a href="{{route('user.index')}}" class="btn btn-primary cart_link">Go Shopping</a>
								</div>
								<div class="col-5" id="order">
									
								</div>
							</div>
            			</div>	
            		</form>
       			</div>
        		</div>
        	</div>
        </div>
	</div>
	
</div>

@section('vue')

	<script>

		var app=new Vue({

			el:"#cartDetails",
			data:{

				getData:[],
			},

			methods:{

				getAllCart:function(){


					axios.get('/cart/getAllCart').then(response=>{

						this.getData=response.data.data,

						(this.getData.length>0)?
						
						
						$("#order").html('<a href="{{route('order.checkOut')}}" class="btn btn-success cart_link">Check Out</a>')
						:
						$("#order").html(''),

						(response.data.total)?
						$("#total").html('Total Price:'+response.data.total+' Tk')	
						:
						$("#total").html('Total Price:'+0+' Tk'),

						(response.data.status=='error')?$("#bladeshow").html(response.data.error):$("#bladeshow").html(response.data.error)
						
					});
					

				
				},
				cartUpdate:function(id){

					console.log(id);
					$('#exampleModal').modal('show');

					$("#upid").val(id);
					axios.post('/cart/edit',{

						id:id,

					}).then(response=>{

						$("#upname").val(response.data.data.productname),
						$("#upquantity").val(response.data.data.quantity),
						$("#avail").html('<label> (Available)</label>'),
						(response.data.status=='error')?$("#bladeshow").html(response.data.error):$("#bladeshow").html(response.data.error)
					});
				},
				cartSave:function(){

					id=$("#upid").val();
					upquantity=$("#upquantity").val();

					

					axios.post('/cart/update',{
						id:id,
						upquantity:upquantity,
					}).then(response=>{

						(response.data.status=='error')?$("#bladeshow").html(response.data.error):$("#bladeshow").html(response.data.error)
					});

					$('#exampleModal').modal('hide');

					this.getAllCart();
				},
				cartRemove:function(id){

					console.log(id);
					axios.post('/cart/remove',{id:id}).then(response=>{
						$(".cartVal").html(response.data.data),
						$("#total").html('Total Price:'+response.data.total+' Tk'),
						(response.data.status=='error')?$("#bladeshow").html(response.data.error):$("#bladeshow").html(response.data.error)
					});
					this.getAllCart();
				}
			},
			mounted:function(){

				console.log('hello');
				this.getAllCart();
			}
		});

	
	</script>
	
@endsection
@endsection