<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login</title>
	<link rel="stylesheet" href="">
</head>
<body>
	@if($errors->any())
		@foreach($errors->all() as $err)
			<li>{{$err}}</li>
		@endforeach
	@endif
	<form method="post" action="{{route('login-form')}}">
		{{-- <input type="hidden" name="_token" value="{{csrf_token()}}"> --}}
		{{-- QJjmCFa27WNI40usz4AFAZOEs9jm9WFhi9sq68k5 --}}
		{{csrf_field()}}
		Username1: <input type="text" name="username[]" placeholder="Enter your username 1">
		Username2: <input type="text" name="username[]" placeholder="Enter your username 2">
		<br><br>
		Password: <input type="password" name="password" placeholder="Enter your password">
		<br><br>
		<input type="submit" value="Send">
	</form>
</body>
</html>