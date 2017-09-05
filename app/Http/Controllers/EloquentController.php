<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\TypeProducts;

class EloquentController extends Controller
{
    public function index(){
    	//$products = Products::get();
    	$products = Products::select('name', 'unit_price', 'image')
    				->get()
    				->toJson()
    				;
    	dd($products);

    	/*foreach($products as $sp){
            echo 'Name: '.$sp->name;
            echo '. Price: '. $sp->unit_price;
            echo "<hr>";
        }*/
    }


    public function insertProduct(){
    	$product = new Products;
    	$product->name = "Sản phẩm vừa thêm";
    	$product->id_type = 3;
    	$product->description = "Mô tả cho sản phẩm này";
    	$product->unit_price = 20000;
    	$product->promotion_price = 20000;
    	$product->image = 'hinh.jpg';
    	$product->unit = 'hộp';
    	$product->save();
    	echo 'inserted';

    }

    public function updateProduct(){
    	//$product = new Products;
    	$product = Products::where('id',64)->first();

    	if($product){
    		$product->name = "Sản phẩm vừa update";
	    	$product->id_type = 5;

	    	$product->save();
	    	echo 'updated';
    	}
    	else{
    		echo 'không tìm thấy sp này';
    	}
    	

    }
    public function deleteProduct(Request $req){
  //   	$product = Products::where('id',$req->id)->first();

  //   	if($product){
  //   		$product->delete();
		// }
		// else{
		// 	echo 'không tìm thấy sp này';
		// }
		Products::destroy(63);
    }


    //Thống kê sản phẩm theo Loại, gồm các thông tin: Tên Loại sản phẩm, danh sách sản phẩm, tổng số sp, có sắp tăng theo tổng số sản phẩm
    public function index23(){

    	$type_products = TypeProducts::with('Products')->get();

    	//dd($type_products);

    	foreach ($type_products as $type) {
    		echo "Tên loại: ".$type->name;
    		echo "<br>";

    		foreach($type->Products as $sanpham){
    			echo '- Tên sp: '. $sanpham->name . ' Giá: '. $sanpham->unit_price;
    			echo "<br>";
    		}


    		echo  ' => Tổng số sp tương ứng là: '.count($type->Products);
    		echo "<hr>";
       	}
    }
}
