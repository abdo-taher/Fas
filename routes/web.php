<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::group(['namespace'=>'App\Http\Controllers\Auth','prefix'=>'login','middleware'=>'guest:admin'],function (){
Route::get('/','loginController@login')->name('login');
Route::post('/checkup','loginController@checkup')->name('checkup');
});

Route::group(['middleware'=>'auth:admin','namespace'=>'App\Http\Controllers'],function (){
    Route::get('/','indexController@index')->name('index');
Route::group(['namespace'=>'Admin','prefix'=>'GeneralSettings'],function(){
    Route::get('/','general_settingsController@index')->name('general_settings_view');
    Route::get('/Edit_settings','general_settingsController@index')->name('settings_edit');
    Route::get('/Edit/{slug?}','general_settingsController@edit_view')->name('edit_view');
    Route::get('/EditRules','general_settingsController@edit_rules')->name('settings_edit_rules');
});
});

