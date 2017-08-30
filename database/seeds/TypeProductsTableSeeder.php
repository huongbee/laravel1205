<?php

use Illuminate\Database\Seeder;

class TypeProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_products')->insert([
    		'name' =>  str_random(10),
    		'desc' =>  str_random(100)
    	]);
    }
}
