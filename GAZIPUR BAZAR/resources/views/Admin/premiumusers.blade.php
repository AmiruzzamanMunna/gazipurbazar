@extends('layouts.Admin-home')
@section('title')
	Premium Users
@endsection
@section('css')
	
@endsection
@section('script')
@endsection
@section('container')
<div class="col-md-8 col-sm-12 m-auto">
	<div class="row">
		<div class="col-md-12 col-sm-12 ordercard">
			<div class="card">
			<div class="card-header"><h2>All Premium Users</h2></div>
			<div class="card-body col-sm-12">
				<div class="row">
					From Date:<input type="date" class="form-control" id="from">
					To Date:<input type="date" id="to" class="form-control" value="{{date('Y-m-d')}}">
					<button type="button" class="btn btn-success" onclick="premiumUsersData()">Search</button>
				</div><br>
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<tr>
							<th>Sl No</th>
							<th>Customer Name</th>
							<th>Mobile</th>
							<th>Mobile2</th>
							<th>Address</th>
							<th>Purchased</th>
							<th>Total Amount</th>
						</tr>
						<tbody id="tableData">

						</tbody>
						
					</table>
				</div>
			</div>
			<div class="card-footer">
				<div class="row">
					<dir class="col-md-12">
						<div class="row">
							<div class="col-md-3 m-auto">
								
							</div>
						</div>
					</dir>
				</div>
			</div>
		</div>
		</div>
	</div>
</div>
<script>
	function premiumUsersData(){

		var from=$("#from").val(); 
		var to=$("#to").val();
		
		$.ajax({

			type:'get',
			url:"{{route('admin.premiumUsersData')}}",
			data:{
				from:from,
				to:to
			},
			success:function(data){

				var html='';

				if(data.data.length>0){

					for($i=0;$i<data.data.length;$i++){

						var getData=data.data[$i];
						html+='<tr>';
						html+='<td>'+($i+1)+'</td>';
						html+='<td>'+getData.name+'</td>';
						html+='<td>'+getData.mobile+'</td>';
						html+='<td>'+getData.mobile2+'</td>';
						html+='<td>'+getData.address+'</td>';
						html+='<td>'+getData.count+'</td>';
						html+='<td>'+getData.cart_totalprice+'</td>';
						html+='</tr>';
					}

				}else{

					html+='<tr><td colspan="7" class="text-center">Sorry No Data</td></tr>';

				}
				

				$("#tableData").html(html);
			},
			error:function(error){

				console.log(error);
			}
		})
	}
</script>
@endsection