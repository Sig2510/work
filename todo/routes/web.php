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

Auth::routes();
Route::get('/', 'TodolistController@index');

Route::resource('todos', 'TodoController', ['only' => ['index', 'store']]);
Route::put('/toggle', 'TodoController@toggle')->name('toggle_status');

Route::get('/users/{id}', 'UserController@show')->name('users.show');
Route::get('/todolists/{id}/todos/new', 'TodoController@create')->name('todos.create');
Route::resource('todolists', 'TodolistController');
