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


/*===== ПРОИЗВОДИТЕЛИ ======*/
Route::group([
    'prefix' => '/player',
    'as'     => 'player::',
], function () {
    Route::get('/', 'PlayerController@index')->name('player');
    Route::get('/create', "PlayerController@create")->name('create');
    Route::post('/save', "PlayerController@save")->name('save');
    Route::post('/delete/{id}', "PlayerController@delete")->name('delete');
});


/* ADMINISTRATOR SECTION */

Route::group([
    'prefix'     => '/administrator',
    'middleware' => 'auth',
    'as'         => 'admin::',
], function () {

    /*===== ПРОИЗВОДИТЕЛИ ======*/
    Route::group([
        'prefix' => '/countries',
        'as'     => 'countries::',
    ], function () {
        Route::get('/', "CountryController@index")->name('index');
        Route::get('/create', "CountryController@create")->name('create');
        Route::get('/edit/{id}', "CountryController@edit")->name('edit');
        Route::any('/save', "CountryController@save")->name('save');
        Route::any('/delete/{id}', "CountryController@delete")->name('delete');
    });


});
