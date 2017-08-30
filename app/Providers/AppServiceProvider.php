<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use Illuminate\Support\Facades\Schema; 

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Schema::defaultStringLength(191); 


        //View::share('name','Laravel-KhoaPham'); //truyền cho all view

        //chỉ truyền data cho uploadFile, login
        View::composer(['uploadFile','login'],function($view){

            $view->with(['name'=>"Laravel-KhoaPham"]);
        });


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
