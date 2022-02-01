<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Models\Post;
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

Route::get('/', 'App\Http\Controllers\InicioController@index')->name('inicio');
Route::resource('posts', PostController::class);
Route::resource('categories', CategoryController::class);
Route::resource('tags', TagController::class);
//Ruta para post que llevan tags (para cuando vengamos del show)
Route::get('post1/{tag}', 'App\Http\Controllers\PostController@index1')->name('post.index1');
//Ruta para contacto
Route::get('contacto', 'App\Http\Controllers\ContactoController@index')->name('contacto.index');
Route::post('enviar', 'App\Http\Controllers\ContactoController@enviar')->name('contacto.enviar');
