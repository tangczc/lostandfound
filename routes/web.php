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

Route::get('/login', function () {
    return view('users.login');
});
Route::get('/sgin_up',function(){
    return view('users.sgin_up');
});

Route::resource('users','UsersController');
Route::post('sginup','UsersController@sginUp') -> name('users.sginup');