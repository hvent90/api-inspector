# Real time streaming API Inspector for Laravel 5 with Pusher.
___

## Installation
___
Require the hvent90/api-inspector package in your composer.json.

`$ composer require hvent90/api-inspector`

Add `Hvent90/ApiInspector/ApiInspectorServiceProvider` to the Providers array in `config/app.php`.

Publish the `views` and `configuration file` for easy modifications.

`php artisan vendor:publish`

Enter in your Pusher access keys in `config/api-inspector.php`.

## Default Usage
___
The URI endpoint of `api/inspect` will now load a view that streams all API requests in real time without refreshing the browser. Enjoy!

## Configuration
___

You can configure the behavior of ApiInspector via `config/api-inspector.php`.
* `active` accepts either `true` or `false` and will enable or disable ApiInspector
* `public`, `secret`, and `app_id` take your Pusher keys
* `uri` will determine what URI endpoint is associated with the route
* `prefix` will add a prefix to the route
* `subdomain` will add a subdomain to the route

You can locate and customize the default views found in `resources/views/vendors/hvent90/api-inspector`.