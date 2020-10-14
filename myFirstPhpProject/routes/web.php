<?php

use App\Controllers\PostController;
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

Route::get('/posts','PostController@Index');

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

Route::get('/posts/{post}',[PostController::class, 'show']);

Route::post('/posts/save_post', [PostController::class, 'save'])->name('posts.save');

Route::put('/posts/{id}/edit',[PostController::class, 'edit'])->name('posts.edit');

Route::put('/posts/{post}/update',[PostController::class, 'update'])->name('posts.update');

Route::delete('/posts/{post}/delete', [PostController::class, 'delete'])->name('posts.delete');

