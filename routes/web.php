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

// Static home page
Route::get('/', 'PagesController@index');

// Static about page
Route::get('/about', 'PagesController@about');

// Get a listing of all blog posts
Route::get('/blog', 'BlogPostsController@index');

// Show the view to create a new blog post
Route::get('/blog/create', 'BlogPostsController@create');

// Store a newly created blog post in storage
Route::post('/blog', 'BlogPostsController@store');

// Display the specified blog post
Route::get('/blog/{post}', 'BlogPostsController@show');

// Show the form to edit a blog post
Route::get('/blog/{post}/edit', 'BlogPostsController@edit');

// Update a blog post in storage
Route::patch('/blog/{post}', 'BlogPostsController@update');

// Delete a blog post in storage
Route::delete('/blog/{post}', 'BlogPostsController@destroy');

// Search for a blog post matching the query
Route::get('/blog/search', 'BlogPostsController@search');

// Show all blog posts from a specified user
Route::get('/blog/author/{user}/posts', 'BlogPostsController@viewPostsByAuthorId');

// User authentication routes
Auth::routes();
Route::get('/home', 'DashboardController@index')->name('dashboard');
