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

Route::resource('user', \App\Http\Controllers\UserController::class);
Route::resource('member', \App\Http\Controllers\MemberController::class);
Route::resource('book', \App\Http\Controllers\BookController::class);
Route::resource('record', \App\Http\Controllers\RecordController::class);
