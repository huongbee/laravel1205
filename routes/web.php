<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('welcome');
});

//điều kiện biến ten phải là chữ
Route::get('chao/{ten?}', function($name='Hương'){
	echo $name;
	return view('hello');
})->where(['ten'=>'[a-zA-Z]+']);

//điều kiện biến id phải là số
Route::get('sanpham/{id}',function($id){
	echo $id;
})->where(['id'=>'[0-9]+']);

//điều kiện biến ten phải là chữ và giới hạn 5-10 kí tự
Route::get('chao/{ten?}', function($name='Hương'){
	echo $name;
	return view('hello');
})->where(['ten'=>'[a-zA-Z]{5,10}']);

//Định danh Route
//C1:
Route::get('dinhdanh',function(){
	echo "Đây là route 1";
})->name('route_1');


//gọi Route bằng tên định danh
Route::get('goi-route',function(){
	return redirect()->route('route_2');
});

//C2:
Route::get('dinhdanh-2',[
	'as'=>'route_2', //tên route
	function(){
		echo 'Đây là route 2';
	}
]);


Route::group(['prefix'=>'admin'],function(){

	//   admin/demo-group
	Route::get('demo-group',function(){
		echo 'Chào cả lớp';
	});

	//
	Route::get('demo-group2',function(){
		echo 'Chào cả lớp';
	});


	//
	Route::get('trang-chu','PageController@getIndex');

});


// gọi controller
Route::get('test1/{name}/{class}','PageController@getName');

Route::get('login',[
	'as'=>'login-form', //tên route
	'uses'=>'PageController@getLogin' //gọi controller
]);

Route::post('login',[
	'as'=>'login-form', //tên route
	'uses'=>'PageController@postLogin' //gọi controller
]);