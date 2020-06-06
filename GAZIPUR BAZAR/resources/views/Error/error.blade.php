<!DOCTYPE html>
<html>
<head>
    <title>2marshop</title>
    <link rel="stylesheet" href="{{asset('vendor')}}/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
	<link rel="stylesheet" type="text/css" href="{{asset('css')}}/user.css">
	<script src="{{asset('vendor')}}/jquery/jquery-3.3.1.min.js"></script>
	
	<script src="{{asset('vendor')}}/bootstrap/js/bootstrap.bundle.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="{{asset('css')}}/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('css')}}/owl.theme.default.min.css">
</head>
<body>

	<div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="row">
                    <div class="col-md-6 col-xl-6 col-lg-6 col-sm-6 m-auto">
                        <img src="{{asset('images/2mar')}}/2marshop404.png" class="img-fluid">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 col-xl-5 col-lg-5 col-sm-5 m-auto">
                        <h2 class="text-responsive" style="font-family:ans-serif;font-size:1.65rem">Oops! Something Went Wrong!!</h2>
                    </div>
                </div>
                <div class="row" style="margin-top: 14px">

                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="row">
                            <div class="col-md-3 col-xl-3 col-lg-3 col-sm-3 ml-auto">
                                <a href="{{url()->previous()}}"  class="btn btn-info">Previous Page</a>
                            </div>
                            <div class="col-md-5 col-xl-5 col-lg-5 col-sm-5 ml-auto">
                                <a href="{{route('user.index')}}" class="btn btn-info">Back To Home</a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>

</body>
</html>