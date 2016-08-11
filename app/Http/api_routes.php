<?php
	
$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {

	$api->post('auth/login', 'App\Api\V1\Controllers\AuthController@login');
	$api->post('auth/signup', 'App\Api\V1\Controllers\AuthController@signup');
	$api->post('auth/recovery', 'App\Api\V1\Controllers\AuthController@recovery');
	$api->post('auth/reset', 'App\Api\V1\Controllers\AuthController@reset');

	$api->group(['middleware' =>['api.auth']], function ($api) {
		$api->post('user/addquoted', 'App\Api\V1\Controllers\QuoteController@AddQuoted');
		$api->post('user/addquote', 'App\Api\V1\Controllers\QuoteController@AddQuote');
		$api->post('user/qetquotename', 'App\Api\V1\Controllers\QuoteController@getQbyname');
		$api->post('user/getquotecategory', 'App\Api\V1\Controllers\QuoteController@getQbycategory');
		$api->get('user/getquoted','App\Api\V1\Controllers\QuoteController@getQuoted');
		$api->get('user/getallquote','App\Api\V1\Controllers\QuoteController@getAllQuote');
		$api->get('user/getallquoted','App\Api\V1\Controllers\QuoteController@getAllQuoted');
		$api->get('user/randomquote','App\Api\V1\Controllers\QuoteController@randomquote');
		$api->post('user/getbysource','App\Api\V1\Controllers\QuoteController@getBySource');
	});
	// example of protected route
	$api->get('protected', ['middleware' => ['api.auth'], function () {		
		return \App\User::all();
    }]);

	// example of free route
	$api->get('free', function() {
		return \App\User::all();
	});

});
