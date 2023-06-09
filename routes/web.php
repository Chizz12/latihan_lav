<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', [BlogController::class, 'welcome'])->name('welcome');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('show');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('dashboard')->group(function () {
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::get('/category', [CategoryController::class, 'index']);

    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');

    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.create.store');

    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');

    Route::patch('/category/update/{id}', [CategoryController::class, 'update'])->name('category.edit.update');

    Route::get('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.index.destroy');

    Route::get('/post', [PostController::class, 'index']);

    Route::get('/post/create', [PostController::class, 'create']);
    Route::post('/post/store', [PostController::class, 'store'])->name('posts.create.store');
    Route::get('/post/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
    Route::patch('/post/update/{id}', [PostController::class, 'update'])->name('posts.edit.update');
    Route::get('/post/delete/{id}', [PostController::class, 'destroy'])->name('posts.index.destroy');
});
