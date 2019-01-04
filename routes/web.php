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

Route::get('/', 'Web\HomeController@index');

Route::post('/chat/send', 'Web\ChatController@sendMessage');
Route::post('/email/send', 'Web\MailController@send');

Route::group(['prefix' => 'cards'], function () {
    Route::get('/{card_id}', 'Web\CardsController@index');
    Route::get('/', 'Web\CardsController@index');
});

Route::group(['prefix' => 'cases'], function () {
    Route::get('/', 'Web\CasesController@index');
    Route::get('/{case_id}', 'Web\CasesController@index');
});

Route::group(['prefix' => 'users'], function () {
    Route::get('/', 'Web\UsersController@index');
});


Route::any('{query}', function () {
    return redirect('/');
})->where('query', '.*');


/* Storage */

Route::group(['prefix' => 'storage'], function () {
    Route::group(['prefix' => 'cards'], function () {
        Route::get('/', 'Web\CardsController@getCards');
        Route::get('/{card_id}', 'Web\CardsController@getCard');
        Route::post('/', 'Web\CardsController@store');
        Route::put('/{card_id}', 'Web\CardsController@store');
        Route::delete('/{card_id}', 'Web\CardsController@destroy');
    });
    Route::group(['prefix' => 'cases'], function () {
        Route::get('/', 'Web\CasesController@getCases');
        Route::get('/{id}', 'Web\CasesController@getCase');
        Route::post('/', 'Web\CasesController@store');
        Route::put('/{case_id}', 'Web\CasesController@store');
        Route::delete('/{case_id}', 'Web\CasesController@destroy');
    });
});




