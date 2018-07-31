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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resources([
    'patients' => 'PatientsController'
]);
Route::prefix('/patients')->group(function(){
    Route::get('/{id}/exams/create', 'ExamsController@create')->name('exams.create');
    Route::get('/{id}/exams', 'PatientsController@exams')->name('patients.exams');
    Route::get('/{id}/sales', 'PatientsController@sales')->name('patients.sales');

});

Route::prefix('/exams')->group(function(){
    Route::get('/{id}/sales/create', 'SalesController@create')->name('sales.create');
});
Route::resource('exams', 'ExamsController')->except([
    'create', 'show'
]);

Route::prefix('/sales')->group(function(){
    Route::post('/{id}/payment', 'SalesController@payment')->name('sales.payment');
    Route::get('/{id}/payments', 'SalesController@payments')->name('sales.payments');
});

Route::resource('sales', 'SalesController')->except([
    'create'
]);
