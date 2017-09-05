<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = "products";
    public $timestamps = false;  


    public function TypeProduct(){
    	return $this->belongsTo('App\TypeProduct','id_type','id');
    	//id ? TypeProduct
    }


    public function BillDetail(){
    	return $this->hasMany('App\BillDetail','id_product','id');
    	//id ? Products
    }
}
