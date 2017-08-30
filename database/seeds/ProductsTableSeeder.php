<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
    		'id_type' =>  1,
    		'name' => str_random(10),
    		'desc' =>  str_random(100),
    		'price' => 234567
    	]);
    }
}
