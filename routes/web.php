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
Route::get('/patients/{id}/exams/create', 'ExamsController@create')->name('exams.create');
Route::get('/patients/{id}/exams', 'PatientsController@exams')->name('patients.exams');
Route::get('/patients/{id}/sales', 'PatientsController@sales')->name('patients.sales');
Route::get('/exams/{id}/sales/create', 'SalesController@create')->name('sales.create');
Route::resource('exams', 'ExamsController')->except([
    'create', 'show'
]);
Route::post('/sales/{id}/payment', 'SalesController@payment')->name('sales.payment');
Route::resource('sales', 'SalesController')->except([
    'create'
]);
