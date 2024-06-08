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
//
Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('user', \App\Http\Controllers\UserController::class)->middleware('auth');
Route::resource('member', \App\Http\Controllers\MemberController::class)->middleware('auth');
Route::resource('book', \App\Http\Controllers\BookController::class)->middleware('auth');
Route::resource('record', \App\Http\Controllers\RecordController::class)->middleware('auth');

Route::put('record/return/{record}', [\App\Http\Controllers\RecordController::class, 'return'])->name('record.return')->middleware('auth');
Route::get('search/record',[\App\Http\Controllers\SearchController::class, 'search'])->name('search.record')->middleware('auth');
Route::get('search', [\App\Http\Controllers\SearchController::class, 'keyword'])->name('search.keyword')->middleware('auth');
Route::get('available/book', [BookController::class, 'available'])->name('book.available')->middleware('auth');
Route::get('profile/user', [\App\Http\Controllers\UserController::class, 'profile'])->name('user.profile')->middleware('auth');
Route::put('profile/update/{user}', [\App\Http\Controllers\UserController::class, 'updateProfile'])->name('user.updateProfile')->middleware('auth');
