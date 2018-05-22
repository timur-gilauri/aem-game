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
Route::get('/', 'HomeController@index')->name('home');

Auth::routes();


/*===== ИГРОК ======*/
Route::group([
    'prefix' => '/player',
    'as'     => 'player::',
], function () {
    Route::get('/', 'PlayerController@index')->name('player');
    Route::get('/bag', 'PlayerController@bag')->name('bag');
    Route::get('/create', "PlayerController@create")->name('create');
    Route::post('/save', "PlayerController@save")->name('save');
    Route::post('/delete/{id}', "PlayerController@delete")->name('delete');
});

/*===== Локации ======*/

Route::get('/locations/{location}', 'LocationController@goToLocation')->name('location');
/*Route::group([
    'prefix'     => '/locations',
    'middleware' => ['auth', 'user'],
    'as'         => 'locations::',
], function () {
    Route::get('/square', 'LocationController@square')->name('square');
    Route::get('/smith', 'LocationController@smith')->name('smith');
    Route::get('/healer', 'LocationController@healer')->name('healer');
    Route::get('/armorer', 'LocationController@armorer')->name('armorer');
});*/

Route::group([
    'prefix' => 'market',
    'as'     => 'market::',
], function () {
    Route::get('/{type}/{operation}/{id}', 'MarketController@buyItem')->name('buy-item');
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
