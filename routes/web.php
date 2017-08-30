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


Route::get('upload-file',[
	'as' => 'uploadfile',
	'uses' => 'PageController@getFormUpload'
]);

Route::post('upload-file',[
	'as' => 'uploadfile',
	'uses' => 'PageController@postUploadFile'
]);


Route::get('set-cookie',"PageController@setCookie");
Route::get('get-cookie',"PageController@getCookie");


Route::get('test-json','PageController@testJson');


Route::get('session',"PageController@setSession");





Route::get('home','PageController@getTrangchu');
Route::get('detail','PageController@getDetail');

Route::group(['prefix'=>'database'],function(){

	Route::get('create-product-table',function(){

		Schema::create('products',function($table){ //product: tên bảng
			$table->increments('id');
			$table->string('name',255);
			$table->text('desc');
			$table->double('price');
		});
		echo 'Đã tạo bảng';
	});

	Route::get('create-type-product-table',function(){

		Schema::create('type_products',function($table){ //product: tên bảng
			$table->increments('id');
			$table->string('name',255);
			$table->text('desc');
		});
		echo 'Đã tạo bảng loại sp';
	});

	Route::get('modify-product-table',function(){

		Schema::table('products',function($table){
			$table->integer('id_type')->unsigned();
		});
		echo 'đã thêm cột thành công';
	});

	Route::get('add-foreignkey-product',function(){

		Schema::table('products',function($table){
			$table->foreign('id_type')->references('id')->on('type_products');
		});
		echo 'đã tạo khóa ngoại';
	});

	Route::get('delete-d',function(){
		Schema::drop('d');
	});

	Route::get('delete-products',function(){
		Schema::dropIfExists('products');
	});
});


Route::group(['prefix'=>'query-builder'], function(){

	Route::get('products','QueryBuilderController@index');

	Route::get('customer','QueryBuilderController@customer');


	Route::get('relation','QueryBuilderController@relation');


});
