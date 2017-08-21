<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{

	//C1
    /*function getName($ten,$lop){
    	echo 'Chào Bạn '.$ten;
    	echo '<br>';
    	echo 'Lớp: '.$lop;
    }*/

    //C2
    function getName(Request $request){
    	$ten = $request->name;
    	$lop = $request->class;

    	echo 'Chào Bạn '.$ten;
    	echo '<br>';
    	echo 'Lớp: '.$lop;
    }


    function getIndex(){
    	echo 'Đây là trang chủ';
    }


    public function getLogin(){
    	return view('login');
    }


    public function postLogin(Request $request){
    	//echo $username = $request->input('username.0');
    	//print_r($username[0]);
    	//echo '<br>';
    	//echo $password = $request->password;
    	$this->validate($request,
    		[

	    		'username[0]'	=>'required|min:6', //required:bắt buộc phải nhập
	    		'username[1]'	=>'required|min:6',
	    		'password'		=>'required|min:6|max:10'
	    	],
	    	[
	    		'username[0].required' => "Vui lòng nhập tên 1",
	    		'username[1].required' => "Vui lòng nhập tên 2",
	    		'username[0].min' 		=> "Tên 1 phải ít nhất 6 kí tự",
	    		'username[1].min' 		=> "Tên 2 phải ít nhất 6 kí tự",
	    		'password.required' => 'Vui lòng nhập mk',
	    		'password.min' 		=> "MK phải ít nhất 6 kí tự",
	    		'password.max' 		=> 'MK phải ko quá 10 kí tự'
	    	]
    	);

    	$data = $request->all();
    	echo "<pre>";
    	print_r($data);
    	echo "</pre>";
    }
}
