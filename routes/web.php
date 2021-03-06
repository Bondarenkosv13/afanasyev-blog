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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Blog')->prefix('blog')->name('blog.')->group(function() {
    Route::resource('/posts', 'PostsController');
});

Route::namespace('Blog\Admin')->prefix('admin/blog')->name('blog.admin.')->group(function() {
    Route::resource('/categories', 'CategoryController')->except('show', 'destroy');
    Route::resource('/posts', 'PostController')->except('show');
});
