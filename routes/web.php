<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admins;
use App\Http\Controllers\Front;

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


Route::get('/test',[Admins\AdminController::class,'test'])->name('test');

Route::get('/', function () {
    return view('welcome');
});

Route::name('admins.')->prefix('/admin')->group(function () {
    

    Route::get('/',[Admins\AdminController::class,'dashboard'])->name('dashboard');
    Route::any('/category/{id?}/{delete?}',[Admins\AdminController::class,'category'])->name('category');
    Route::any('/blog_category/{id?}/{delete?}',[Admins\AdminController::class,'blog_category'])->name('blog_category');

    Route::any('/coupon/{id?}/{delete?}',[Admins\AdminController::class,'coupon'])->name('coupon');
    Route::any('/brand/{id?}/{delete?}',[Admins\AdminController::class,'brand'])->name('brand');
    Route::any('/subcategory/{id?}/{delete?}',[Admins\AdminController::class,'subcategory'])->name('subcategory');
    Route::any('/news_letters/{id?}/{delete?}',[Admins\AdminController::class,'news_letters'])->name('news_letters');
    Route::get('/products',[Admins\AdminController::class,'products'])->name('products');
    Route::any('/product_form/{id?}',[Admins\AdminController::class,'product_form'])->name('product_form');
    Route::get('/product/delete/{id}',[Admins\AdminController::class,'product_delete'])->name('product_delete');
    Route::post('/get_subCategory_html',[Admins\AdminController::class,'get_subCategory_html'])->name('get_subCategory_html');
    Route::post('/update_product_status',[Admins\AdminController::class,'update_product_status'])->name('update_product_status');

    Route::get('/posts',[Admins\AdminController::class,'posts'])->name('posts');
    Route::any('/post_form/{id?}',[Admins\AdminController::class,'post_form'])->name('post_form');
    Route::get('/post/delete/{id}',[Admins\AdminController::class,'post_delete'])->name('post_delete');

    Route::any('/slider/{id?}/{delete?}',[Admins\AdminController::class,'slider'])->name('slider');


});


Route::get('/',[Front\FrontController::class,'home'])->name('home');
Route::post('/subcribe_newsletter',[Front\FrontController::class,'subcribe_newsletter'])->name('subcribe_newsletter');

