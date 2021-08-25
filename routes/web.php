<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

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

// Route::get('/', function () {
//     // return view('welcome');
//     return "Twitee";
// });

Route::get('/', "App\http\Controllers\PagesController@index");
// Route::get('/posts', "App\http\Controllers\PagesController@posts");
Route::get('/profile', "App\http\Controllers\PagesController@userProfile");


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// All resource routes for posts
Route::resource('/posts', 'App\Http\Controllers\PostsController');
Route::resource('/users', 'App\Http\Controllers\UsersController');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
