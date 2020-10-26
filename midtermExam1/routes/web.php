<?php

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

Route::get('/employees','EmployeeController@Index');

Route::view('/home', 'home');

Route::put('/employees/{id}/edit',[\App\Controllers\EmployeeController::class, 'edit'])->name('employees.edit');

Route::put('/employees/{employees}/update',[\App\Controllers\EmployeeController::class, 'update'])->name('employees.update');
