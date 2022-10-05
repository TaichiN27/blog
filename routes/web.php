<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController; 
use App\Http\Controllers\CategoryController; 

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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__.'/auth.php';

Route::get('/', [PostController::class, 'index'])->name('index')->middleware('auth');
Route::get('/create', [PostController::class, 'create'])->name('create')->middleware('auth');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('edit')->middleware('auth');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('show')->middleware('auth');
Route::post('/posts', [PostController::class, 'store'])->name('store')->middleware('auth');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('update')->middleware('auth');
Route::delete('/posts/{post}', [PostController::class,'delete'])->name('delete')->middleware('auth');
Route::get('/categories/{category}', [CategoryController::class,'index']);