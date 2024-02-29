<?php

use App\Http\Controllers\PagesContoller;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Auth;

// Route using shorthand syntax
//below not work
Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');

// Route using array syntax
Route::get('/', [PagesContoller::class, 'index']);
Route::get('/about', [PagesContoller::class, 'about']);
Route::get('/services', [PagesContoller::class, 'services']);


Route::get('/hello', function () {
    return '<h1>Hello Earth!</h1>';
});

Route::get('/users/{id}', function ($id) {
    return 'This is a user' . $id ;
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('posts', 'App\Http\Controllers\PostsController');

// routes/web.php
Route::put('/posts/{id}', [PostsController::class, 'update']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
