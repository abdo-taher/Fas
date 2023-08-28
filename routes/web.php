<?php

use Illuminate\Support\Facades\Route;

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
    Route::get('/logout','Auth\loginController@logout')->name('logout');
Route::group(['namespace'=>'Admin','prefix'=>'GeneralSettings'],function(){
    Route::get('/','general_settingsController@index')->name('general_settings_view');
    Route::post('/Edit_settings/{id?}','general_settingsController@edit')->name('settings_edit');
    Route::get('/Edit/{slug?}','general_settingsController@edit_view')->name('edit_view');
    Route::post('/EditRules/{id?}','general_settingsController@edit_rules')->name('settings_edit_rules');
});
    Route::group(['namespace'=>'Admin','prefix'=>'Finance_Calender'],function(){
        Route::get('/','finance_calenderController@index')->name('finance_calender');
//        Route::get('/Months','finance_calenderController@MonthsIndex')->name('Months');
        Route::get('/add','finance_calenderController@add')->name('finance_calender_add');
        Route::post('/addDone','finance_calenderController@addDone')->name('finance_calender_addDone');
        Route::get('/Edit/{slug?}','finance_calenderController@edit')->name('finance_calender_edit');
        Route::post('/EditDone/{id?}','finance_calenderController@editDone')->name('finance_calender_editDone');
        Route::get('/Is_Open/{id?}','finance_calenderController@openOr')->name('finance_calender_open');
        Route::get('/Delete/{id?}','finance_calenderController@delete')->name('finance_calender_dle');
    });
    Route::group(['namespace'=>'Admin','prefix'=>'Finance_Cel_Periods'],function(){
        Route::get('/{slug?}','finance_cel_periodsController@index')->name('finance_cel_periods');
        Route::get('/add','finance_cel_periodsController@add')->name('finance_cel_periods_add');
        Route::get('/addDone','finance_cel_periodsController@addDone')->name('finance_cel_periods_addDone');
        Route::get('/Edit/{slug?}','finance_cel_periodsController@edit')->name('finance_cel_periods_edit');
        Route::post('/EditDone/{id?}','finance_cel_periodsController@editDone')->name('finance_cel_periods_editDone');
        Route::post('/EditRules/{id?}','finance_cel_periodsController@openOr')->name('finance_cel_periods_open');
    });
    Route::group(['namespace'=>'Admin','prefix'=>'branches'],function(){
        Route::get('/','branchesController@index')->name('branches');
        Route::get('/add','branchesController@add')->name('branches_add');
        Route::post('/addDone','branchesController@addDone')->name('branches_addDone');
        Route::get('/Edit/{slug?}','branchesController@edit')->name('branches_edit');
        Route::post('/EditDone/{id?}','branchesController@editDone')->name('branches_editDone');
        Route::get('/Active/{id?}','branchesController@active')->name('branches_active');
        Route::get('/Delete/{id?}','branchesController@delete')->name('branches_delete');
    });
});

