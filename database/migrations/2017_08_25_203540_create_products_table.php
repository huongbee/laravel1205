<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //tạo bảng
        Schema::create('products',function($table){ //product: tên bảng
            $table->increments('id');
            $table->integer('id_type')->unsigned();
            $table->string('name',255);
            $table->text('desc');
            $table->double('price');
            $table->foreign('id_type')->references('id')->on('type_products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //xóa bảng
        Schema::dropIfExists('products');
    }
}
