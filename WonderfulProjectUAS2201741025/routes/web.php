<?php

use App\Http\Controllers\HomeController;
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


Route::get('/','HomeController@index')->name('home');

Route::get('/aboutus', function () {
    return view('aboutus');
})->name('aboutus');

Route::get('/greeting', function () {
    return view('greeting');
})->name('greeting')->middleware(['auth']);

Auth::routes();


Route::resource('articles', 'ArticleController');

Route::resource('categories', 'CategoryController');

Route::resource('users', 'UserController')->only([
    'edit', 'update'
])->middleware(['auth']);

Route::resource('users', 'UserController')->only([
    'index', 'show', 'destroy'
])->middleware(['auth', 'role:Admin']);



