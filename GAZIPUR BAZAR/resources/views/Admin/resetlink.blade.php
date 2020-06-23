<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Admin Reset Password</h1>
	<img src="{{asset('images/2mar')}}/2marshopcover-01-01-01.jpg" alt=""><br>
	<span>We Have Received a Password Reset Request from Your Account.Click The Link Below</span><br>
	<a href="{{ route('password.reset', [$data->token]) }}">Click here to reset your Password</a>
</body>
</html>