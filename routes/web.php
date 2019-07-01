<?php
use App\Http\Controllers\HomeController;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/api/geodata', 'UniversityController@getGeodata')->name('geodata');
Route::get('/info', 'UniversityController@index')->name('UnievrsityInfo');
Route::get('/api/langs','UniversityController@getLangs')->name('avalibleLangs');