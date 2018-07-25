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
    $gerechts = \Homeserver\Gerecht::all();
    /*return view('welcome', ['gerechts' => $gerechts]);*/
    return view('home')->with('gerechts', $gerechts);
});

/*default auth*/
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

/*midel*/
