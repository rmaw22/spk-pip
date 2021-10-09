<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');
Route::get('/app', function () {
    return view('layouts.admin-app', ['name' => 'James']);
});

Route::get('settings/password', 'AdminController@editPassword');
Route::post('settings/password', 'AdminController@updatePassword');
Route::get('settings/profile', 'AdminController@editProfile');
Route::post('settings/profile', 'AdminController@updateProfile');

Route::auth();

Route::get('/pengumuman', 'HomeController@index');
Route::get('/nilai/edit/{id}', 'NilaiController@FaktorAjax');
Route::get('siswa/markComplete', ['as'=>'siswa.completed', 'uses'=>'SiswaController@markComplete']);
Route::post('siswa/markUncomplete', ['as'=>'siswa.uncompleted', 'uses'=>'SiswaController@markUncomplete']);
Route::resource('siswa', 'SiswaController');
Route::delete('categories', ['as'=>'siswa.destroy', 'uses'=>'SiswaController@destroy']);
Route::resource('aspek', 'AspekController');
Route::delete('aspek', ['as'=>'aspek.destroy', 'uses'=>'AspekController@destroy']);
Route::resource('faktor', 'FaktorController');
Route::delete('faktor', ['as'=>'faktor.destroy', 'uses'=>'FaktorController@destroy']);
Route::resource('gap', 'GapController');
Route::delete('gap', ['as'=>'gap.destroy', 'uses'=>'GapController@destroy']);
Route::get('nilai/detail/{id_siswa}', ['as'=>'nilai.detail', 'uses'=>'NilaiController@detail_score']);
Route::resource('nilai', 'NilaiController');
Route::delete('nilai', ['as'=>'nilai.destroy', 'uses'=>'NilaiController@destroy']);
Route::resource('manager', 'ManagerController');
Route::get('hasil/search', ['as'=>'hasil.search', 'uses'=>'HasilController@searchYear']);
Route::resource('hasil', 'HasilController');
Route::get('importExport', 'HasilController@importExport');
Route::get('downloadExcel',  ['as'=>'export.excel', 'uses'=>'HasilController@downloadExcel']);
Route::post('siswa/import', 'SiswaController@postImport');