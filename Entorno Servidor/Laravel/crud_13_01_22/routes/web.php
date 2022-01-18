<?php

use App\Http\Controllers\{PostController,CategoryController};
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
Route::resource('post', PostController::class);
Route::resource('categories', CategoryController::class);
Route::get('post1/{id}', "App\Http\Controllers\PostController@index1")->name("post.index1");
