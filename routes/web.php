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

Route::middleware(['auth'])->group(function () {
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('client','ClientsController');
Route::resource('print','PrintController')->except(['show']);
Route::get('counters/snmp','CountersController@snmpCounters');
Route::resource('counters','CountersController');
Route::get('rules/finishing/list','RulesController@finishingList');
Route::get('rules/finishing','RulesController@finishingAccount');
Route::get('rules/finishing/{id}','RulesController@finishingView');
Route::post('/rules/calculate','RulesController@calculatePage');
Route::get('/counter/report','CountersController@reportPrint');
Route::resource('rules','RulesController');
    Route::get('/admin',function(){
        return view('home');
    });
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
