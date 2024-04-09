<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\facades\schema;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
       paginator::useBootstrap();
       $setting = Setting::checkSettings();
       $categories = Category::with('childern')->where('parent',0)->orwhere('parent', null)->get();
       $lastfiveposts = Post::with('category','user')->orderBy('id')->limit(5)->get();

       view()->share([

         'settings'=>$setting,
         'categories'=>$categories,
         'lastfiveposts'=>$lastfiveposts,
       ]);
    }
}
