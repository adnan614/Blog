<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\postController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::get('/{anypath}', [HomeController::class, 'index'])->where('path', '.*');

Route::post('add', [CategoryController::class, 'store']);
Route::get('/category', [CategoryController::class, 'all_category']);
Route::get('/category/delete/{id}', [CategoryController::class, 'delete_category']);
Route::get('/category/edit/{id}', [CategoryController::class, 'edit_category']);
Route::post('/category/update/{id}', [CategoryController::class, 'update_category']);

//post
Route::get('/post', [postController::class, 'all_post']);
Route::post('/save', [postController::class, 'save_post']);
