<?php
return [

	/*
	|--------------------------------------------------------------------------
	| API Inspector Quick Enable/Disable
	|--------------------------------------------------------------------------
	|
	| Enter a value of 'false' to quickly disable this package.
	| Valid options are 'true' and 'false' (without quotes).
	|
	*/

	'active' => true,


	/*
	|--------------------------------------------------------------------------
	| Pusher Integration
	|--------------------------------------------------------------------------
	|
	| This package uses Pusher for showing data on the view
	| without refreshing the browser.
	|
	| Visit https://pusher.com for more details.
	|
	| Enter your Pusher keys below.
	|
	*/
	'public' => getenv('PUSHER_PUBLIC'),
	'secret' => getenv('PUSHER_SECRET'),
	'app_id' => getenv('PUSHER_APP_ID'),


	/*
	|--------------------------------------------------------------------------
	| Route Configuration
	|--------------------------------------------------------------------------
	|
	| You can customize the route endpoint
	| for accessing the API Inspector.
	|
	| The default endpoint is '/api/inspect'.
	|
	*/
    'uri' => 'api/inspect',
    'route-modifiers' => [
	    // 'prefix' => '',
	    // 'subdomain' => '',
    ],

];