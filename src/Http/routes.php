<?php
$config = $this->app['config']->get('api-inspector');
$routeModifiers = $config['route-modifiers'];

Route::group($routeModifiers ? $routeModifiers : [], function() {
	$config = $this->app['config']->get('api-inspector');

	Route::get($config['uri'], 'ApiInspectorController@stream');
});