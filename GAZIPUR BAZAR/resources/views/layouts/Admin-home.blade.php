<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link rel="shortcut icon" type="text/css" href="{{asset('images')}}/logo.jpg">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="{{asset('js')}}/adminscript.js"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css')}}/admin.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    @yield('script')
</head>
<style>
    /* body {
      font-family: "Lato", sans-serif;
    } */
    
    .sidenav {
      height: 100%;
      width: 0;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: #111;
      overflow-x: hidden;
      transition: 0.5s;
      padding-top: 60px;
    }
    
    .sidenav a {
      padding: 8px 8px 8px 32px;
      text-decoration: none;
      font-size: 25px;
      color: #818181;
      display: block;
      transition: 0.3s;
    }
    
    .sidenav a:hover {
      color: #f1f1f1;
    }
    
    .sidenav .closebtn {
      position: absolute;
      top: 0;
      right: 25px;
      font-size: 36px;
      margin-left: 50px;
    }
    
    @media screen and (max-height: 450px) {
      .sidenav {padding-top: 15px;}
      .sidenav a {font-size: 18px;}
    }
</style>
<body>
   
    @if(Session::has('loggedAdmin'))
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <ul style="margin-top:50px">
                <li class="nav-item">
                    <a href="{{route('admin.index')}}" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    
                    <a class="nav-link" data-toggle="collapse" data-target="#demo18" href="#">Admin<i id="listicon" class="fa fa-caret-down"></i></a>
                    <div class="collapse" id="demo18">
                        @forelse($admins as $admin)
                        
                            <a href="{{route('admin.edit',[$admin->id])}}" class="nav-link">Profile</a>
                            <a href="{{route('admin.logOut')}}" class="nav-link">Logout</a>
                            
                        @break
                        @empty
                        @endforelse
                    </div>
                </li>
                <li class="nav-item">
                    
                    <a class="nav-link" data-toggle="collapse" data-target="#demo19" href="#">Users<i id="listicon" class="fa fa-caret-down"></i></a>
                    <div class="collapse" id="demo19">
                        
                        <a href="{{route('admin.premiumUsers')}}" class="nav-link">Premium Users</a>
                            
                    </div>
                </li>
                <li class="nav-item">
                    
                    <a class="nav-link" data-toggle="collapse" data-target="#demo17" href="#">Order<i id="listicon" class="fa fa-caret-down"></i></a>
                    <div class="collapse" id="demo17">
                        <a href="{{route('order.todayOrder')}}" class="nav-link">Today's Order</a>
                        <a href="{{route('order.orderShow')}}" class="nav-link">All Order</a>
                        <a href="{{route('order.searchOrder')}}" class="nav-link">Search Order</a>
                        <a href="{{route('order.adminExtraOrder')}}" class="nav-link">Extra Order</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" data-target="#demo16" href="#">Page Index<i id="listicon" class="fa fa-caret-down"></i></a>
                    <div class="collapse" id="demo16">
                        <a href="{{route('admin.pageIndex')}}" class="nav-link">Add Page Index Image</a>
                        <a href="{{route('admin.viewPageIndex')}}" class="nav-link">View Page Image</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" data-target="#demo15" href="#">Product<i id="listicon" class="fa fa-caret-down"></i></a>
                    <div class="collapse" id="demo15">
                        <a href="{{route('product.index')}}" class="nav-link">Add Product</a>
                        <a href="{{route('product.viewAllproduct')}}" class="nav-link">View Product</a>
                        <a href="{{route('product.productWiseOrdered')}}" class="nav-link">Product Wise Ordered</a>
                        <a href="{{route('product.profitReport')}}" class="nav-link">Profit Report</a>
                    </div>
                </li>
                <li class="nav-item">
                    @forelse($events as $event)
                    <a class="nav-link" data-toggle="collapse" data-target="#demo1" href="#">Ladis<i id="listicon" class="fa fa-caret-down"></i></a>
                    <div class="collapse" id="demo1">
                        <a href="{{route('admin.ladiesIndexEdit',[$event->id])}}" class="nav-link">Ladis Index</a>
                    </div>
                    @empty
                    @endforelse
                </li>
                <li class="nav-item">
                    @forelse($events as $event)
                    <a class="nav-link" data-toggle="collapse" data-target="#demo2" href="#">Gents<i id="listicon" class="fa fa-caret-down"></i></a>
                    <div class="collapse" id="demo2">
                        <a href="{{route('admin.gentsIndexEdit',[$event->id])}}" class="nav-link">Gents Index</a>
                    </div>
                    @empty
                    @endforelse
                </li>
                <li class="nav-item">
                    @forelse($events as $event)
                    <a class="nav-link" data-toggle="collapse" data-target="#demo3" href="#">Leather<i id="listicon" class="fa fa-caret-down"></i></a>
                    <div class="collapse" id="demo3">
                        <a href="{{route('admin.leatherIndexEdit',[$event->id])}}" class="nav-link">Leather Index</a>
                    </div>
                    @empty
                    @endforelse
                </li>
                <li class="nav-item">
                    @forelse($events as $event)
                    <a class="nav-link" data-toggle="collapse" data-target="#demo4" href="#">Electric & Electronics<i id="listicon" class="fa fa-caret-down"></i></a>
                    <div class="collapse" id="demo4">
                        <a href="{{route('admin.electricIndexEdit',[$event->id])}}" class="nav-link">Electric & Electronics Index</a>
                    </div>
                    @empty
                    @endforelse
                </li>
                <li class="nav-item"><a href="" class="nav-link">Gadget</a></li>
                <li class="nav-item">
                    @forelse($events as $event)
                    <a class="nav-link" data-toggle="collapse" data-target="#demo5" href="#">Household & Accessories<i id="listicon" class="fa fa-caret-down"></i></a>
                    <div class="collapse" id="demo5">
                        <a href="{{route('admin.houseIndexEdit',[$event->id])}}" class="nav-link">Household & Accessories Index</a>
                    </div>
                    @empty
                    @endforelse
                </li>
                <li class="nav-item">
                    @forelse($events as $event)
                    <a class="nav-link" data-toggle="collapse" data-target="#demo6" href="#">Furniture<i id="listicon" class="fa fa-caret-down"></i></a>
                    <div class="collapse" id="demo6">
                        <a href="{{route('admin.furnitureIndexEdit',[$event->id])}}" class="nav-link">Furniture Index</a>
                    </div>
                    @empty
                    @endforelse
                </li>
                <li class="nav-item">
                    @forelse($events as $event)
                    <a class="nav-link" data-toggle="collapse" data-target="#demo7" href="#">Toys & Show Pieces<i id="listicon" class="fa fa-caret-down"></i></a>
                    <div class="collapse" id="demo7">
                        <a href="{{route('admin.toysIndexEdit',[$event->id])}}" class="nav-link">Toys & Show Pieces  Index</a>
                    </div>
                    @empty
                    @endforelse
                </li>
                <li class="nav-item">
                    @forelse($events as $event)
                    <a class="nav-link" data-toggle="collapse" data-target="#demo8" href="#">Flowers & Bouquets<i id="listicon" class="fa fa-caret-down"></i></a>
                    <div class="collapse" id="demo8">
                        <a href="{{route('admin.flowersIndexEdit',[$event->id])}}" class="nav-link">Flowers & Bouquets Index</a>
                    </div>
                </li>
                @empty
                @endforelse
                <li class="nav-item">
                    @foreach($events as $event)
                    <a class="nav-link" data-toggle="collapse" data-target="#demo9" href="#">Books & Magazine<i id="listicon" class="fa fa-caret-down"></i></a>
                    <div class="collapse" id="demo9">
                        <a href="{{route('admin.booksIndexEdit',[$event->id])}}" class="nav-link">Books & Magazine Index</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" data-target="#demo10" href="#">Food & Grocery<i id="listicon" class="fa fa-caret-down"></i></a>
                    <div class="collapse" id="demo10">
                        <a href="{{route('admin.foodIndexEdit',[$event->id])}}" class="nav-link">Food & Grocery Index</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" data-target="#demo13" href="#">Event Management<i id="listicon" class="fa fa-caret-down"></i></a>
                    <div class="collapse" id="demo13">
                        <a href="{{route('admin.eventIndexEdit',[$event->id])}}" class="nav-link">Event Management Index</a>
                        <a href="{{route('admin.weddingEdit',[$event->id])}}" class="nav-link">Wedding Item</a>
                        <a href="{{route('admin.eventBirthdayEdit',[$event->id])}}" class="nav-link">Birthday Item</a>
                        <a href="{{route('admin.eventHospitalityEdit',[$event->id])}}" class="nav-link">Hospitality Item</a>
                        <a href="{{route('admin.eventOthersEdit',[$event->id])}}" class="nav-link">Others</a>
                    </div>
                </li>
                <li class="nav-item"><a href="{{route('admin.lightIndexEdit',[$event->id])}}" class="nav-link">Lighting & Decoration</a></li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" data-target="#demo11" href="#">Famous & Traditional<i id="listicon" class="fa fa-caret-down"></i></a>
                    <div class="collapse" id="demo11">
                        <a href="{{route('admin.famousTraditionalEdit',[$event->id])}}" class="nav-link">Famous & Traditional Index</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" data-target="#demo14" href="#">Parts & Accessories of Bikes & Cars<i id="listicon" class="fa fa-caret-down"></i></a>
                    <div class="collapse" id="demo14">
                        <a href="{{route('admin.partsAccessoriesEdit',[$event->id])}}" class="nav-link">Bikes & Cars Index</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" data-target="#demo12" href="#">Medicine<i id="listicon" class="fa fa-caret-down"></i></a>
                    <div class="collapse" id="demo12">
                        <a href="{{route('admin.medicineAccessoriesEdit',[$event->id])}}" class="nav-link">Medicine Index</a>
                    </div>
                </li>
                @endforeach
                <li class="nav-item">
                    @forelse($events as $event)
                    <a class="nav-link" data-toggle="collapse" data-target="#demo16" href="#">Footer<i id="listicon" class="fa fa-caret-down"></i></a>
                    <div class="collapse" id="demo16">
                        <a href="{{route('admin.aboutUsEdit',[$event->id])}}" class="nav-link">About Us</a>
                        <a href="{{route('admin.policyEdit',[$event->id])}}" class="nav-link">Policy</a>
                        <a href="{{route('admin.contactUsEdit',[$event->id])}}" class="nav-link">Contact Us</a>
                    </div>
                    @empty
                    @endforelse
                </li>
            </ul>
        </div>
        <span style="font-size:30px;cursor:pointer;" onclick="openNav()">&#9776; open</span>

    @endif
    @yield('container')
</body>
</html>
<script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
    }
    
    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
    }
</script>