<?php

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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/blog/search', 'BlogPostsController@search');
Route::get('blog/author/posts/{id}', 'BlogPostsController@viewPostsByAuthorId');
Route::resource('/blog', 'BlogPostsController');

Auth::routes();
Route::get('/home', 'DashboardController@index')->name('dashboard');
