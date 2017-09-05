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
}
