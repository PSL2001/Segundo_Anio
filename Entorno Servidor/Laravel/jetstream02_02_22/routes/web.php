<?php

use App\Http\Controllers\ContactoController;
use App\Http\Livewire\ShowPosts;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('/posts', ShowPosts::class)->name('posts.show');
Route::middleware(['auth:sanctum', 'verified'])->get('/contacto', [ContactoController::class, 'pintarFormulario'])->name('contacto.index');
Route::middleware(['auth:sanctum', 'verified'])->post('/contacto', [ContactoController::class, 'procesarFormulario'])->name('contacto.procesar');
