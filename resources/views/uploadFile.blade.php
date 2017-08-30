<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Upload file</title>
	<link rel="stylesheet" href="">
</head>
<body>

<?php
echo '<pre>';
print_r($data);
echo '</pre>';
echo $data2;
echo '<br>';

echo $name;
?>



@if(Session::has('success')) {{-- kiểm tra --}}
	{{Session::get('success')}} {{-- in ra màn hình --}}
@endif 
@if(Session::has('error')) {{-- kiểm tra --}}
	{{Session::get('error')}} {{-- in ra màn hình --}}
@endif 

	<form method="POST" action="{{route('uploadfile')}}" enctype="multipart/form-data">
		{{csrf_field()}}
		<input type="file" name="hinh" accept="image/*">
		<button type="submit">Upload</button>
	</form>
</body>
</html>