<?php
$config = $this->app['config']->get('api-inspector');

Route::group($config['route-modifiers'], function() {
	$config = $this->app['config']->get('api-inspector');

	Route::get($config['uri'], 'ApiInspectorController@stream');
});