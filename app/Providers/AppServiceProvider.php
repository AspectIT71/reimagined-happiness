<?php

namespace App\Providers;

use App\Category;
use App\Post;
use Illuminate\Support\ServiceProvider;
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
       view()->composer('pages.slider', function ($view){
           $view->with('slides', Post::where('is_featured', 1)->take(8)->get());
       });
        view()->composer('pages.sidebar', function ($view){
            $view->with('lastPost', Post::orderBy('created_at', 'desc')->take(3)->get());
        });
        view()->composer('pages.sidebar', function ($view){
            $view->with('popular', Post::orderBy('views', 'desc')->take(3)->get());
        });
        view()->composer('layout', function ($view){
            $view->with('menu', Category::all());
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
