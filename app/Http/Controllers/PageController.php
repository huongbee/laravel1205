<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
use Hash;

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
        // $password = Hash::make(111111);
        // echo $password;
    	return view('login');
    }


    public function postLogin(Request $request){
    	//echo $username = $request->input('username.0');
    	//print_r($username[0]);
    	//echo '<br>';
    	//echo $password = $request->password;

    	$this->validate($request,
    		[

	    		'username'	=>'required|min:6', //required:bắt buộc phải nhập
	    		'password'		=>'required|min:6|max:10'
	    	],
	    	[
	    		'username.required' => "Vui lòng nhập tên ",
	    		'username.min' 		=> "Tên phải ít nhất 6 kí tự",
	    		'password.required' => 'Vui lòng nhập mk',
	    		'password.min' 		=> "MK phải ít nhất 6 kí tự",
	    		'password.max' 		=> 'MK phải ko quá 10 kí tự'
	    	]
    	);
        $array = [
            'email' => $request->username,
            'password' => $request->password
        ];
        if(Auth::attempt($array)){
            //login thành công
            echo "Đăng nhập thành công";
            echo '<br>';

            echo Auth::user()->full_name;
            echo '<br>';


            echo "<a href='logout'>Đăng xuất</a>";
        }
        else{
            return redirect()->back();
        }
    }


    public function getLogout(){
        if(Auth::check()){
            Auth::logout();
            return redirect()->route('login-form')
                             ->with('thanhcong','Đăng xuất thành công');
        }
        else{
            echo 'Bạn chưa đăng nhập';
        }
    }



    public function getFormUpload(){
        $data = array('PHP', 'iOS', 'Android');
        $data2 = 'Laravel';

        //return view('uploadFile',['array_data'=>$data, 'phantu2'=>$data2]);
        return view('uploadFile',compact('data','data2'));
    }


    public function postUploadFile(Request $req){
        if($req->hasFile('hinh')){

            $image = $req->file('hinh');//lấy thông tin file
            //dd($image);
            
            if($image->getClientSize() <= 1024*1024){
                //echo $image->getClientSize(); //lấy file size
                $ext = $image->getClientOriginalExtension(); //lấy đuôi file
                $ext = strtolower($ext); //chuyển chữ hoa -> thường
                //echo $ext;
                $arrayExt = array('jpg','png','gif','jpeg');

                if(in_array($ext, $arrayExt)){
                    //thực hiện upload file

                    $name = $image->getClientOriginalName();
                    
                    //C1
                    $new_name = date('Y-m-d').'-'.time().'-'.$name;
                    //C2
                    /*$new_name = pathinfo($name, PATHINFO_FILENAME).'-'.date('Y-m-d').'-'.time().".$ext";
                    echo $new_name;*/
                    $image->move('images/', $new_name); //nơi lưu, tên file
                    //echo 'upload thành công';
                    return redirect()->route('uploadfile')
                            ->with('success','upload thành công');
                }
                else{
                   return redirect()->route('uploadfile')
                            ->with('error','File ko đúng định dạng');
                }
            }
            else{
                echo 'File quá lớn';
            }

        }
        else{
            echo 'Chưa có file';
        }
    }



    public function setCookie(){
        $cookie = new Response;
        $cookie->withCookie('cookieName','cookieValue', 1);

        return $cookie;

    }

    public function getCookie(Request $req){
        echo date('Y-m-d h:i:s');
        echo $req->cookie('cookieName');
    }


    function testJson(){
        $array = array(
            'ten'=>'Khoa Phạm Training',
            'lop'=>'PHP - Laravel'
            );

        return response()->json($array);
    }


    function setSession(){
        session()->put('sessionName', 'sessionValue');
        echo session('sessionName');
    }



    public function getTrangchu(){
        return view('pages.trangchu');
    }


    public function getDetail(){
        return view('pages.chitiet');
    }
}
