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
    Route::group(['namespace'=>'Admin','prefix'=>'Branches'],function(){
        Route::get('/','branchesController@index')->name('branches');
        Route::get('/add','branchesController@add')->name('branches_add');
        Route::post('/addDone','branchesController@addDone')->name('branches_addDone');
        Route::get('/Edit/{slug?}','branchesController@edit')->name('branches_edit');
        Route::post('/EditDone/{id?}','branchesController@editDone')->name('branches_editDone');
        Route::get('/Active/{id?}','branchesController@active')->name('branches_active');
        Route::get('/Delete/{id?}','branchesController@delete')->name('branches_delete');
    });
    Route::group(['namespace'=>'Admin','prefix'=>'Shifts'],function(){
        Route::get('/','shifts_typeController@index')->name('shifts');
        Route::get('/add','shifts_typeController@add')->name('shifts_add');
        Route::post('/addDone','shifts_typeController@addDone')->name('shifts_addDone');
        Route::get('/Edit/{slug?}','shifts_typeController@edit')->name('shifts_edit');
        Route::post('/EditDone/{id?}','shifts_typeController@editDone')->name('shifts_editDone');
        Route::get('/Active/{id?}','shifts_typeController@active')->name('shifts_active');
        Route::get('/Delete/{id?}','shifts_typeController@delete')->name('shifts_delete');
        Route::post('/ajaxSearch','shifts_typeController@ajaxSearch')->name('ajaxSearch');
    });
    Route::group(['namespace'=>'Admin','prefix'=>'Departments'],function(){
        Route::get('/','departmentController@index')->name('departments');
        Route::get('/add','departmentController@add')->name('departments_add');
        Route::post('/addDone','departmentController@addDone')->name('departments_addDone');
        Route::get('/Edit/{slug?}','departmentController@edit')->name('departments_edit');
        Route::post('/EditDone/{id?}','departmentController@editDone')->name('departments_editDone');
        Route::get('/Active/{id?}','departmentController@active')->name('departments_active');
        Route::get('/Delete/{id?}','departmentController@delete')->name('departments_delete');
        Route::post('/ajaxSearch','departmentController@departments_Search')->name('departments_Search');
    });
    Route::group(['namespace'=>'Admin','prefix'=>'Job_Categories'],function(){
        Route::get('/','job_categorieController@index')->name('job_categories');
        Route::get('/add','job_categorieController@add')->name('job_categories_add');
        Route::post('/addDone','job_categorieController@addDone')->name('job_categories_addDone');
        Route::get('/Edit/{slug?}','job_categorieController@edit')->name('job_categories_edit');
        Route::post('/EditDone/{id?}','job_categorieController@editDone')->name('job_categories_editDone');
        Route::get('/Active/{id?}','job_categorieController@active')->name('job_categories_active');
        Route::get('/Delete/{id?}','job_categorieController@delete')->name('job_categories_delete');
        Route::post('/ajaxSearch','job_categorieController@ajaxSearch')->name('job_categoriesSearch');
    });
});

