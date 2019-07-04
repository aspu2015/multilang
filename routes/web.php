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
})->name('main');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/api/geodata', 'UniversityController@getGeodata')->name('geodata');
Route::get('/university/info', 'UniversityController@index')->name('UniversityController.index');
Route::get('/api/langs','UniversityController@getLangs')->name('UniversityController.getLangs');

Route::get('/university/create','UniversityController@create')->name('UniversityController.create');
Route::post('/university/store','UniversityController@store')->name('UniversityController.store');

Route::get('/university/{id}/edit', 'UniversityController@edit')->middleware('auth')->name('UniversityControllerEdit');
Route::post('/university/{id}/update', 'UniversityController@update')->middleware('auth')->name('UniversityController.update');

Route::post('/university/{id}/destroy', 'UniversityController@destroy')->middleware('auth')->name('UniversityController.delete');

Route::get('/university/{id}/translation/create', 'TranslationController@create')->middleware('auth')->name('TranslationController.create');
Route::post('/university/{id}/translation/store', 'TranslationController@store')->middleware('auth')->name('TranslationController.store');

Route::get('/translation/{id}/edit', 'TranslationController@edit')->middleware('auth')->name('TranslationController.edit');
Route::post('/translation/{id}/update', 'TranslationController@update')->middleware('auth')->name('TranslationController.update');