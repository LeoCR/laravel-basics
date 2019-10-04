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
    return view('home');
});
Route::get('/greet/{name?}', function ($name=null) {
    return view('actions/greet',['name'=>$name]);
})->name('greet');
Route::get('/hug', function () {
    return view('actions/hug');
})->name('hug');
Route::get('/kiss', function () {
    return view('actions/kiss');
})->name('kiss');
