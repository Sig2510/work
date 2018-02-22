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

<<<<<<< HEAD
Auth::routes();

Route::get('/', 'HomeController@index');
Route::resource('todos', 'HomeController', ['only' => ['index', 'store', 'create']]);
Route::put('/toggle', 'HomeController@toggle')->name('toggle_status');

Route::get('/users/{id}', 'UserController@show')->name('users.show');
=======
Route::get('/', function () {
    return view('welcome');
});
>>>>>>> 2bd4b52c81fd863965042e230063075ffd36b477
