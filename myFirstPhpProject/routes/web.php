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

Route :: get ('/ home_user', 'User @ index');

Route :: get ('/ login', 'User @ login');

Route :: post ('/ loginPost', 'User @ loginPost');

Route :: get ('/ register', 'User @ register');

Route :: post ('/ registerPost', 'User @ registerPost');

Route :: get ('/ logout', 'User @ logout');

Route::get('/users/login', [LoginController::class, 'login'])->name('login');

Route::post('/users/post-login', [LoginController::class, 'postLogin'])->name('post_login');

Route::post('/users/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/users/register', [LoginController::class, 'register'])->name('register');

Route::post('/users/post-register', [LoginController::class, 'postRegister'])->name('post_register');

Route::get('/users', [LoginController::class, 'index'])->name('users.all')->middleware('auth');

Route::get('/tags', [TagController::class, 'index'])->name('tags.all');

Route::get('/tags/create', [TagController::class, 'create'])->name('tags.create');

Route::get('/tags/{tag}/edit', [TagController::class, 'edit'])->name('tags.edit');

Route::put('/tags/{tag}/update', [TagController::class, 'update'])->name('tags.update');

Route::post('/tags/save', [TagController::class, 'save'])->name('tags.save');

Route::delete('/tags/{tag}/delete', [TagController::class, 'delete'])->name('tags.delete');

Route:get('Mail/create', [MailController::Class, 'create'])->name('Mail.create');

Rouote::post('Mail/sendMail', [ailController::Class, 'sendMail'])->name('Mail.sendMail');




