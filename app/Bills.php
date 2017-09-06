<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    protected $table = "bills";

    public function BillDetail(){
    	return $this->hasMany('App\BillDetail','id_bill','id');
    }
    

    public function Customers(){
    	return $this->belongsTo('App\Customers','id_customer','id');
    }


    public function Products(){
    	return $this->belongsToMany('App\Products','bill_detail','id_bill','id_product');
    	//model_lienket_den,'table_trung_gian,khoa_ngoai_table_htai,khoangoai_table_lienket'
    }
}
