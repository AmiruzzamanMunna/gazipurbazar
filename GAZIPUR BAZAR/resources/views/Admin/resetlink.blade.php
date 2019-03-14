<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Reset Password</h1>
	<span>We Have Received a Password Reset Request from Your Account.Click The Link Below</span><br>
	<a href="{{ route('password.reset', [$data->token]) }}">Click here to reset your Password</a>
</body>
</html>