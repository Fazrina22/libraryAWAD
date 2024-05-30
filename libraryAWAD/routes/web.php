<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

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

Route::put('record/return/{record}', [\App\Http\Controllers\RecordController::class, 'return'])->name('record.return');
Route::get('search/record',[\App\Http\Controllers\SearchController::class, 'search'])->name('search.record');
Route::get('search', [\App\Http\Controllers\SearchController::class, 'keyword'])->name('search.keyword');
Route::get('available/book', [BookController::class, 'available'])->name('book.available');
