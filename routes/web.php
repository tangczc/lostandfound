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

Route::get('/', function () {
    return view('users.login');
});
Route::get('/sgin_up','UsersController@sgin_up');

Route::get('/lgoin', function () {
    return view('users.login');
});

Route::resource('users','UsersController');
Route::resource('articles','InformationsController');
Route::post('sginup','UsersController@sginUp') -> name('users.sginup');
Route::get('add_artcle/{id}','UsersController@show_add') -> name('article_add');
Route::get('show_article/{id}','UsersController@show_article') -> name('show_article');
Route::get('user_info/{id}','UsersController@user_info') -> name('user_info');