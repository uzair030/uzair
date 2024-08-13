<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/tags', [App\Http\Controllers\TagController::class, 'index'])->name('tag.index');
Route::get('/tag/create', [App\Http\Controllers\TagController::class, 'create'])->name('tag.create');
Route::post('/tag/store', [App\Http\Controllers\TagController::class, 'store'])->name('tag.store');
Route::get('/tag/edit/{id}', [App\Http\Controllers\TagController::class, 'edit'])->name('tag.edit');
Route::get('/tag/delete/{id}', [App\Http\Controllers\TagController::class, 'delete'])->name('tag.delete');
Route::post('/tag/update/{id}', [App\Http\Controllers\TagController::class, 'update'])->name('tag.update');


Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');
Route::get('/categorycreate', [App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');
Route::post('/category/store', [App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');
Route::get('/category/edit/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category/update/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');
Route::get('/category/delete/{id}', [App\Http\Controllers\CategoryController::class, 'delete'])->name('category.delete');



Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');
Route::get('/post/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
Route::post('/post/store', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
Route::post('/post/update/{id}', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');
Route::get('/post/edit/{id}', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
Route::get('/post/delete/{id}', [App\Http\Controllers\PostController::class, 'delete'])->name('post.delete');
