<?php

use App\Http\Controllers\HomeController;
use App\Livewire\Counter;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/product-index', [ProductController::class, 'index'])->name('a');
Route::get('/product-create', [ProductController::class, 'index']);
Route::get('/product-edit', [ProductController::class, 'index']);
Route::get('/product-delete', [ProductController::class, 'index']);
Route::resource('users', UserController::class);
Route::get('/', HomeController::class)->name('home');
Route::get('/counter', Counter::class);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
