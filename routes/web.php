<?php

use App\Http\Controllers\Post;
use App\Http\Controllers\PostController;
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

Route::get('/posts/create',[PostController::class, 'create'])->name('posts.create');
Route::get('/posts/create/{post}',[PostController::class, 'edit'])->name('posts.edit');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/page/{page}', [PostController::class, 'paginate'])->name('posts.paginate');
Route::post('/posts',[PostController::class, 'store'])->name('posts.store');
Route::delete('/posts/{post}/delete', [PostController::class, 'destroy'])->name('posts.destroy');
Route::get('/posts/{post}/restore', [PostController::class, 'restore'])->name('posts.restore');
Route::delete('/posts/{post}/force_delete', [PostController::class, 'force_destroy'])->name('posts.force_destroy');