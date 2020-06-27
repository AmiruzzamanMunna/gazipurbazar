<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<link rel="shortcut icon" type="text/css" href="{{asset('images')}}/logo.jpg">
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="{{asset('vendor')}}/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
	<link rel="stylesheet" type="text/css" href="{{asset('css')}}/user.css">
	<script src="{{asset('vendor')}}/jquery/jquery-3.3.1.min.js"></script>
	
	<script src="{{asset('vendor')}}/bootstrap/js/bootstrap.bundle.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="{{asset('css')}}/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('css')}}/owl.theme.default.min.css">
	<script src="{{asset('js')}}/owl.carousel.min.js"></script>
	  @yield('validate')
  
</head>
<body id="bladeshow">
	<nav class="navbar navbar-expand-md fixed-top" id="navId">
		
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"  aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    		<span style="font-size:28px;cursor:pointer;" >&#9776;</span>
		</button>
		  
		<a href="{{route('user.index')}}" class="navbar-brand droplink m-auto">
			<img src="{{asset('images/2mar')}}/2marshop.svg" class="navbarimage">2marShop
		</a>
  		<div class="collapse navbar-collapse" id="collapsibleNavbar">
		    <ul class="navbar nav m-auto">
				<li class="nav-item dropdown">
					<a href="" class="nav-link dropdown-toggle droplink" data-toggle="dropdown">Department</a>
					 <div class="dropdown-menu dropmenu" style="max-height:350px;;overflow-y: auto;">
					    <a class="dropdown-item dropitem" href="{{route('user.ladiesIndex')}}">Ladies</a>
					    <a class="dropdown-item dropitem" href="{{route('user.gentsIndex')}}">Gents</a>
					    <a class="dropdown-item dropitem" href="{{route('user.leatherIndex')}}">Leather Item</a>
					    <a class="dropdown-item dropitem" href="{{route('user.electricIndex')}}">Electric & Electronics</a>
					    <a class="dropdown-item dropitem" href="{{route('user.gadgetPage','gadget')}}">Gadget</a>
					    <a class="dropdown-item dropitem" href="{{route('user.houseHoldIndex')}}">Household Accessories</a>
					    <a class="dropdown-item dropitem" href="{{route('user.furnitureIndex')}}">Furniture</a>
					    <a class="dropdown-item dropitem" href="{{route('user.toysShowIndex')}}">Toys & Show Pieces</a>
					    <a class="dropdown-item dropitem" href="{{route('user.giftIndex','gifts')}}">Gift Items</a>
					    <a class="dropdown-item dropitem" href="{{route('user.flowersindex')}}">Flower & Bouquets</a>
					    <a class="dropdown-item dropitem" href="{{route('user.booksIndex')}}">Books & Magazine</a>
					    <a class="dropdown-item dropitem" href="{{route('user.foodIndex')}}">Food & Grocery Items</a>
					    <a class="dropdown-item dropitem" href="{{route('user.eventIndex')}}">Event Managment</a>
					    <a class="dropdown-item dropitem" href="{{route('user.lightIndex')}}">Lighting & Decoration</a>
					    <a class="dropdown-item dropitem" href="{{route('user.famousTradionalIndex')}}">Famous & Traditional Item</a>
					    <a class="dropdown-item dropitem" href="{{route('user.partsAccessoriesIndex')}}">Parts and Accessories of Bikes & Cars</a>
					    <a class="dropdown-item dropitem" href="{{route('user.medicineEmergencyIndex')}}">Medicine & Emergency</a>
					    <a class="dropdown-item dropitem" href="{{route('user.eidSpecial','Eid Special')}}">Eid Special</a>
					    <a class="dropdown-item dropitem" href="{{route('user.other','other')}}">Other</a>
					    <a class="dropdown-item dropitem" href="{{route('order.getExtraOrder')}}">Looking for something else that we don't have!!</a>
				  	</div>
				</li>
			</ul>
			<div class="col-md-4 col-sm-6">
				<form action="{{route('user.searchItem')}}" >
					{{csrf_field()}}
					<div class="input-group row">
						<input type="search" class="form-control col-md-12" placeholder="search" name="search">
					<span class="input-group-btn">
						<button type="submit" class="btn btn-default">
							<span class="fa fa-search srchicon"></span>
						</button>
					</span>
					</div>
				</form>
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<ul class="navbar nav">
								<li class="nav-item">
									<a href="{{route('user.newarrival')}}" class="nav-link droplink">New Arrival</a>
								</li>
								<li class="nav-item">
									<a href="{{route('user.discount')}}" class="nav-link droplink">Top Discount</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
 			<ul class="navbar nav m-auto">
 				@if(Session::has('loggedUser'))
 				<li class="nav-item dropdown">
 					<a href="" class="nav-link dropdown-toggle droplink" data-toggle="dropdown">Account</a>
 					<div class="dropdown-menu">
 						<a class="dropdown-item dropitem" target="_blank" href="{{route('user.updateProfile')}}">Profile</a><a class="dropdown-item dropitem" href="{{route('user.logout')}}">Logout</a>
 					</div>
 				</li>
 				@else
 				<li class="nav-item dropdown">
 					<a href="" class="nav-link dropdown-toggle droplink" data-toggle="dropdown">Accounts</a>
 					<div class="dropdown-menu">
 						<a class="dropdown-item dropitem" href="{{route('user.login')}}">Login</a>
 						<a class="dropdown-item dropitem" href="{{route('user.signUP')}}">Sign-Up</a>
 					</div>
 				</li>
 				@endif
 			</ul>
		</div>
		<ul class="navbar nav">
			<li class="nav-item">
				<div class="row">
				   <a href="{{route('cart.cartIndex')}}" class="nav-link">
						@if ($quantity)
						<span class="cartitem"><div class="cartVal" style="margin-left: 20px">{{$quantity}}</div>
							<i class="fas fa-cart-arrow-down cart droplink fa-2x"></i>
						</span>
						@else

						<span class="cartitem"><div class="cartVal" style="margin-left: 10px"></div>
							<i class="fas fa-cart-arrow-down cart droplink fa-2x"></i>
						</span>
							
						@endif
						
					</a>
				</div>
			</li>
		</ul>
	</nav>
	@yield('container')
	@yield('script')
	
	<div class="row footerbody">
		<div class="col-md-12 col-sm-12">
			<div class="row">
				<div class="col-md-4 col-sm-6">
					<span class="footer_contain">Get to Know Us</span>
					<div class="itemelement">
						<p class="footeritem"><a href="{{route('user.aboutUs')}}" class="linkcolor">About Us</a></p>
						<p class="footeritem"><a href="{{route('user.policy')}}" class="linkcolor">Privacy Policy</a></p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<span class="footer_contain">Get in touch with</span>
					<div class="itemelement">
						<p class="footeritem"><a href="{{route('user.contactus')}}" class="linkcolor">Contact Us</a></p>
					</div>
					<div class="itemelement">
						<p style="color: black;margin-left:75px">Follow Us on -&nbsp;<a target="_blank" href="https://www.facebook.com/2marshop-113692250340726/" class="linkcolor"><i class="fab fa-facebook-square fa-2x"></i></a></p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="col-md-8 m-auto">
						<span class="footer_contain">2marShop.com</span>
					</div>
					<div class="itemelement">
						@forelse($footers as $footer)
						<p class="footeritemparagraph">{{$footer->contact}}</p>
						@empty
						@endforelse
					</div>
				</div>
			</div><hr><br>
			<div class="row">
				<div class="col-12">
					<div class="row">
						<div class="col-5 ml-auto">
							<div class="row">
								<span>&copy; 2019 All Rights Reserved by 2marShop.com</span>
							</div>
						</div>
						<div class="col-4 m-auto">
							<div class="row">
								<span>Design & Developed by <a target="blank" href="https://www.facebook.com/md.amiruzzaman.12">Amiruzzaman Bin Ali</a></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</body>
<script src="{{asset('script/vuejs.js')}}"></script>
{{-- <script src="{{asset('script/jquery.min.js')}}"></script> --}}
<script src="{{asset('script/vue.min.js')}}"></script>
<script src="{{asset('script/axios.min.js')}}"></script>
@yield('vue')
</html>