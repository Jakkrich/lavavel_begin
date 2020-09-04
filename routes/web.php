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

Route::get('/hello/{id}', 'Home\HomeController@hello');
Route::get('/hello2/{id}', 'Home\HomeController@hello2');
Route::get('/helloadmin', 'Home\HomeController@helloadmin');


Route::get('/create', 'Home\HomeController@create');
Route::get('/edit', 'Home\HomeController@edit');
Route::get('/read', 'Home\HomeController@read');
Route::get('/delete', 'Home\HomeController@delete');

Route::resource('user', 'Home\UserController');

// Route::get('/contact_us', function () {
//     return 'test@gmail.com';
// });

// Route::get('/about_us', function () {
//     return 'Hi About';
// });

// Route::get('/post/{id}', function ($id) {
//     return 'POST ID: ' . $id;
// });

Route::get('/post/{catagory}/{id}', function ($catagory, $id) {
    return 'POST CATAGORY: ' . $catagory . ' ID: ' . $id;
});
