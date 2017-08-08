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
Route::get('/', 'PlaceController@index'); //go to upload page

Route::post('/import', 'PlaceController@store'); //store csv to database function
Route::get('/extract', 'PlaceController@extract'); //go to extract view


Route::post('/place', 'GuzzleController@getRemoteData'); //get place Id using name
Route::post('/process', 'GuzzleController@processPlaceId');  //get results using place Id
Route::get('/store/{item}', 'ResultController@store');

//export
Route::get('/viewExport', 'PlaceController@exportExcel');
Route::post('/export', 'PlaceController@export');
Route::post('/export_xlsx', 'PlaceController@export_xlsx');
