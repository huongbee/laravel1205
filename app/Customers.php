<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $table = "customer";

    public function Bills(){
    	return $this->hasMany('App\Bills','id_customer','id');
    }
}
