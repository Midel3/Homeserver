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

/*default auth*/
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

/*midel*/
Route::get('/gerechten/pervlees', 'GerechtController@pervlees');
Route::get('/gerechten/perstarch', 'GerechtController@perstarch');
Route::get('/gerechten', 'GerechtController@index');
Route::get('/gerechten/{overzicht}', 'GerechtController@show');
Route::get('/gerechten/{}/getweekdays', 'GerechtController@getWeekDays');
Route::post('/gerechten/{overzicht}/save', 'GerechtController@saveDish');
Route::post('/gerechten/{overzicht}/edit', 'GerechtController@editDish');
Route::post('/gerechten/{gerecht}/delete', 'GerechtController@deleteDish');
Route::post('/gerechten/{gerecht}/storeDishOnDay' , 'GerechtController@storeDinner');
Route::post('/gerechten/{week}/getplanneddinners', 'GerechtController@getPlannedDinners');
Route::post('/gerechten/{plannedmeal}/deletePlannedMeal', 'GerechtController@deletePlannedMeal');