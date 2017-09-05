<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeProducts extends Model
{
	//khai báo tên bảng cho model
    protected $table = "type_products";


    //khai báo relation
    public function Products(){
    	return $this->hasMany('App\Products','id_type','id');
    }



}
