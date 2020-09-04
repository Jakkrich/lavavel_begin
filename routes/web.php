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

Route::get('/contact_us', function () {
    return 'test@gmail.com';
});

Route::get('/about_us', function () {
    return 'Hi About';
});

Route::get('/post/{id}', function ($id) {
    return 'POST ID: ' . $id;
});
