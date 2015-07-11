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

Route::get('/{locale?}', function ($locale = 'fr') {
    App::setLocale($locale);
    return view('welcome');
});
Route::get('/{locale?}/contact', [
    'as' => 'contact_show',
    function ($locale = 'fr') {
        App::setLocale($locale);
        return view('contact.show');
    }
]);
Route::post('/contact',  [
    'as' => 'contact_send', 
    'uses' => 'ContactController@send'
]);
