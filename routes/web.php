<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeControllre;
use App\Http\Controllers\AdminControllre;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\UserController;

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



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/redirect',[HomeControllre::class,'redirect']);
Route::get('/',[HomeControllre::class,'index']);
Route::get('/men',[HomeControllre::class,'men']);
Route::get('/women',[HomeControllre::class,'women']);
Route::get('/kids',[HomeControllre::class,'kids']);
Route::get('/product',[AdminControllre::class,'product']);
Route::post('/uploadproduct',[AdminControllre::class,'uploadproduct']);
Route::get('/showproduct',[AdminControllre::class,'showproduct']);
Route::get('/deleteproduct/{id}',[AdminControllre::class,'deleteproduct']);
Route::get('/updateview/{id}',[AdminControllre::class,'updateview']);
Route::post('/updateproduct/{id}',[AdminControllre::class,'updateproduct']);
Route::get('/search',[HomeControllre::class,'search']);
Route::post('/addcart/{id}',[HomeControllre::class,'addcart']);
Route::get('/showcart',[HomeControllre::class,'showcart']);
Route::get('/delete/{id}',[HomeControllre::class,'deletecart']);
Route::post('/confirm_order',[CheckoutController::class,'confirmorder']);
Route::get('/showorder',[AdminControllre::class,'showorder']);
Route::get('/orderview/{id}',[AdminControllre::class,'orderview']);
Route::get('/detail/{id}',[HomeControllre::class,'detail']);
Route::get('/about',[HomeControllre::class,'about']);
Route::get('/contact',[HomeControllre::class,'contact']);
Route::get('/our_product',[HomeControllre::class,'our_product']);
Route::get('/all_product',[HomeControllre::class,'all_product']);
Route::get('/showuser',[AdminControllre::class,'showuser']);
Route::get('/deleteuser/{id}',[AdminControllre::class,'deleteuser']);
Route::get('/addadmin/{id}',[AdminControllre::class,'addadmin']);
Route::get('checkout',[CheckoutController::class,'checkout']);
Route::get('/my-order',[UserController::class,'myorder']);
Route::get('view-order/{id}',[UserController::class,'view']);
Route::put('/update-order/{id}',[AdminControllre::class,'updateorder']);
Route::get('/order-histroy',[AdminControllre::class,'orderhistroy']);





