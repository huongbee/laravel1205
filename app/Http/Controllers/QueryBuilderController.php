<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class QueryBuilderController extends Controller
{
    function index(){
    	//1
    	//SELECT * FROM products
    	//$products = DB::table('products')->get();


    	//1.1: SELECT name,unit_price, image FROM products
    	$products = DB::table('products')
    				//->selectRaw('count(id) as total')
                    //->select(DB::raw('sum(unit_price)/count(id) as total'))
                    ->selectRaw('avg(unit_price) as total')
    				->first();
    	dd($products);
    }


    function customer(){
    	//2
    	$customer = DB::table('customer')
    				->select('name','gender','address','phone_number')
    				->orderBy('name','ASC')
    				->get();

    	dd($customer);
    }

    function relation(){
        //2
        /*$products = DB::table('products')
                    ->join('type_products','type_products.id','=','products.id_type' )
                    ->select('type_products.name as TenLoai', 'products.name as tenSP', 'unit_price')
                    ->orderBy('type_products.name','ASC')
                    ->get();*/

        //3
        /*$products = DB::table('products')
                    ->join( 'type_products',
                            'type_products.id',
                            '=',
                            'products.id_type' 
                    )
                    ->selectRaw('avg(unit_price) as min,
                                type_products.name'
                    )
                    ->groupBy('id_type', 'type_products.name')
                    ->get();
        //echo $products[0]->name;

        foreach($products as $sp){
            echo 'Name: '.$sp->name;
            echo '. Price: '. $sp->min;
            echo "<hr>";
        }
        echo '<br><br><br><br>';
        for($i=0; $i<count($products); $i++){
            echo 'Name: '.$products[$i]->name;
            echo '. Giá: '.$products[$i]->min;
            echo "<hr>";
        }*/
        //dd($products);


        //4
         /*SELECT sum(unit_price) as tongGia,
                count(products.id) as tongSP, 
                type_products.name
        FROM products
        INNER JOIN type_products
        ON type_products.id = products.id_type
        GROUP BY type_products.name*/

        /*$products = DB::table('products')
                        ->join( 'type_products',
                            'type_products.id',
                            '=',
                            'products.id_type' 
                        )
                        ->selectRaw('sum(unit_price) as tongGia, 
                                     count(products.id) as tongSP, type_products.name')
                        ->groupBy('type_products.name')
                        ->get();
        */
       
        /*$products = DB::table('products')
            ->select('type_products.name')
            ->addSelect(DB::raw('sum(unit_price) as tongGia'))
            ->addSelect(DB::raw('count(products.id) as tongSP'))
            ->join('type_products', function($join) {
                $join->on('type_products.id', '=', 'products.id_type', 'and');
                })
            ->groupBy('type_products.name')
            ->get();
    
        dd($products);*/

        /*$bill = DB::table('bills')
                    ->join('bill_detail','bills.id','=','bill_detail.id_bill')
                    ->selectRaw('bills.id, date_order, total, sum(quantity)')
                    ->groupBy('bills.id', 'date_order','total')
                    ->get();
        dd($bill);*/

        $products = DB::table('products')
                    ->join( 'type_products',
                            'type_products.id',
                            '=',
                            'products.id_type' 
                        )
                    ->selectRaw('avg(unit_price) as tb')
                    ->where('type_products.name','=','Bánh ngọt')
                    ->first();
        echo $products->tb;

    }





    
}
