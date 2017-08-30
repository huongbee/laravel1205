
@extends('pages.layout')

@section('content_2')
	<h2>Đây là phần 2</h2>
@endsection

@section('content')
	<h2>Đây là trang chủ</h2>


	@if(1>2)
		{{'đúng'}}
	@else
		sai
	@endif
	

	@for($i=0;$i<10;$i++)
		{{$i}}
		@continue($i>=6)
	@endfor


	<?php

	$users = [];

	foreach($users as $user):
		echo $user;
	endforeach

	?>
	@if(empty($users))
		Mảng rỗng, kiểm tra lại
	@else
		@foreach($users as $user)
			{{$user}}
		@endforeach
	@endif


	@forelse($users as $user)
		{{$user}}
	@empty
		Mảng rỗng, kiểm tra lại
	@endforelse

@endsection






