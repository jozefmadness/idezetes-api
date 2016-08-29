<?php
	
$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {

	$api->post('auth/login', 'App\Api\V1\Controllers\AuthController@login');
	$api->post('auth/signup', 'App\Api\V1\Controllers\AuthController@signup');
	$api->post('auth/recovery', 'App\Api\V1\Controllers\AuthController@recovery');
	$api->post('auth/reset', 'App\Api\V1\Controllers\AuthController@reset');

	$api->post('user/getversion','App\Api\V1\Controllers\QuoteController@getVersion');
	$api->post('user/getquotename', 'App\Api\V1\Controllers\QuoteController@getQbyname');
	$api->post('user/getquotecategory', 'App\Api\V1\Controllers\QuoteController@getQbycategory');
	$api->post('user/getquotenameid', 'App\Api\V1\Controllers\QuoteController@getQbynameID');
	$api->post('user/getquotecategoryid', 'App\Api\V1\Controllers\QuoteController@getQbycategoryID');
	$api->post('user/addquoted', 'App\Api\V1\Controllers\QuoteController@AddQuoted');
	$api->post('user/addquote', 'App\Api\V1\Controllers\QuoteController@AddQuote');
	$api->post('user/getquoted','App\Api\V1\Controllers\QuoteController@getQuoted');
	$api->post('user/getallquote','App\Api\V1\Controllers\QuoteController@getAllQuote');
	$api->post('user/getallquoted','App\Api\V1\Controllers\QuoteController@getAllQuoted');
	$api->post('user/getallcategory','App\Api\V1\Controllers\QuoteController@getAllCategory');
	$api->post('user/randomquote','App\Api\V1\Controllers\QuoteController@randomquote');
	$api->post('user/randomxquote','App\Api\V1\Controllers\QuoteController@randomxquote');
	$api->post('user/randomquoteid','App\Api\V1\Controllers\QuoteController@randomquoteID');
	// example of protected route
	$api->get('protected', ['middleware' => ['api.auth'], function () {		
		return \App\User::all();
    }]);

	// example of free route
	$api->get('free', function() {
		return \App\User::all();
	});

});
