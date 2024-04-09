<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\HomeController;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\PostsController;
use App\Http\Controllers\website\categoriesController;
use App\Http\Controllers\website\postController;
use LaravelLocalization;
use App\Http\Controllers\website\IndexController;
use App\Models\Post;
use App\Models\Category;
use Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

//================ website ===========//

route::get('/',[IndexController::class,'index'])->name('index');

route::get('/categories/{Category}',[categoriesController::class,'show'])->name('category');

route::get('/post/{Post}',[postController::class,'show'])->name('post');

route::get('/category/allcategories',[categoriesController::class,'show_all_categories'])->name('all.categories');













//===================== Dashboard ===================//
route::group(['prefix'=>'dashboard' ,'as'=>'dashboard.','middleware'=>['auth','ckecklogin','localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],function(){

     route::get('/',function(){
        return view('dashboard.layouts.layout');
    })->name('setting');

    route::get('/settings',[SettingController::class,'index'])->name('settings');
   
    route::post('settings/update/{setting}',[SettingController::class,'Update'])->name('setting.update');

    route::get('/users/all',[UserController::class,'getUserData'])->name('users.all');
    route::post('/users/delete',[UserController::class,'delete'])->name('users.delete');

    route::get('/category/all',[CategoryController::class,'getCategoriesData'])->name('category.all');
    route::post('/category/delete',[CategoryController::class,'delete'])->name('category.delete');

    route::get('/posts/all',[PostsController::class,'getpostsData'])->name('post.all');
    route::post('/posts/delete',[PostsController::class,'delete'])->name('post.delete');

    Route::resources([
        'users'=> UserController::class,
        'category'=> CategoryController::class,
        'posts'=>PostsController::class,
    ]);

    



    
});


Route::get('/home', [HomeController::class,'index'])->name('home');
// route::get('user',function(){
//     return view('index');
// });
