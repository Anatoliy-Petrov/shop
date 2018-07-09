<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.app', function($view){

            //$view->with('categories', \App\Category::all());

            $view->with('rootCategories', \App\Category::whereNull('parent_id')->get());

            $categories = \App\Category::where('parent_id', '>', 0)->get()->groupBy('parent_id');
            
            $view->with(compact('categories'));
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
