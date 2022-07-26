<?php

use Illuminate\Support\Facades\Route;
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


Route::post('/',[UserController::class, 'store'])->name('auth.register');
Route::get('/register',[UserController::class, 'show'])->name('welcome.register');
Route::get('/', [UserController::class, 'showLogin'])->name('welcome.login');
Route::get('/logout',[UserController::class,'logout'])->name('logout');
Route::post('/index',[UserController::class,'login'])->name('auth.login');


Route::group(['prefix' =>'category'], function(){ 
 Route::get('/',[CategoryController::class,'index'])->name('admin.category.index'); 
Route::get('create/',[CategoryController::class,'getCreate'])->name('admin.category.create'); 
 Route::post('create/',[CategoryController::class,'postCreate']); 
 Route::get('edit/{id}',[CategoryController::class,'getEditCate']); 
Route::post('edit/{id}',[CategoryController::class,'postEditCate']); 
Route::get('delete/{id}',[CategoryController::class,'delete']); 
}); 