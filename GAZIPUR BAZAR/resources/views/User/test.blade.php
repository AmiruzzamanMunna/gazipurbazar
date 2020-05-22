<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post">
		{{csrf_field()}}
		<input type="text" name="test">
		<input type="text" name="test1">
		<input type="text" name="test2">
		<input type="submit" name="">	
	</form>
	@if($errors->any())
		@foreach($errors->all() as $error)
			<li>{{$error}}</li>
		@endforeach
	@endif
</body>
</html>