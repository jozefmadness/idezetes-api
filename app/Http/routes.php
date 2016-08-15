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
Route::get('/', function () {
    return redirect('welcome');
});
Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/quote','QuotesController@showquotes');
Route::get('/quotemanage','QuotesController@quotemanage');
Route::post('/addquoted','QuotesController@addquoted');
Route::post('/addquotes','QuotesController@addquotes');
Route::get('{all}', function ($all) {
    return Redirect::to('/');
})->where('all', '.*');