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

//for member/users
Route::group(['middleware' => 'guest'], function(){

    Route::get('/', 'ArticleController@index');
    Route::get('/login', 'UserController@loginPage');
    Route::get('/register', 'UserController@registerPage');
    Route::get('/aboutus', 'UserController@aboutUsPage');
    Route::get('/article/{id}', 'ArticleController@showDetail');
    Route::get('/article/category/{name}', 'ArticleController@showCategory');

});


//for guest
Route::group(['middleware' => 'myauth'], function(){

    Route::get('/profile', 'UserController@profilePage');
    Route::post('/profile', 'UserController@updateProfile');

    Route::get('/blog/create', 'UserController@createBlogPage');
    Route::post('/blog/create', 'UserController@createNewBlog');

    Route::get('/blog', 'UserController@blogPage');
    Route::delete('/blog/user/delete/{id}', 'UserController@blogDelete');

    Route::get('/home/users', 'UserController@userHomePage');

});

//for admin
Route::group(['middleware' => 'myadm'], function(){

    Route::get('/home/admin', 'AdminController@adminHomePage');

    Route::get('/admin/users/', 'AdminController@userAdminPage');
    Route::delete('/admin/user/delete/{id}', 'AdminController@userAdminDelete');

    Route::get('/admin/posts/', 'AdminController@articlesPage');
    Route::delete('/admin/posts/delete/{id}', 'AdminController@articleDelete');

});

Route::post('/register', 'UserController@registerCheck');

Route::post('/login', 'UserController@loginCheck');

Route::get('/logout', 'UserController@logout');