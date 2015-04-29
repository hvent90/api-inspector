# Real time streaming API Inspector for Laravel with Pusher.
___


## Table of Contents
- [In a Nutshell](#in-a-nutshell)
- [Installation](#installation)
- [Default Usage](#default-usage)
- [Configuration](#configuration)
- [Pusher Info](#pusher-info)


## In a Nutshell
___
Go to /api/inspect and see requests being made on your Laravel application in real time without refreshing the browser.

Okay, that was the elevator schpiel. Here is the walkthrough of what is happening:

`Hvent90/ApiInspector/ApiInspectorServiceProvider::boot()` intercepts the `$request` object with `$this->app[‘router’]->before([$this, ‘onBefore’]);`.

`Hvent90/ApiInspector/ApiInspectorServiceProvider::onBefore($request)` takes the `$request` object and, after instantiating `Pusher`, uses Pusher to feed the data directly to `hvent90/api-inspector/src/Http/views/stream.blade.php`.


## Installation
___
Require the hvent90/api-inspector package in your composer.json.

`$ composer require hvent90/api-inspector`

Add `'Hvent90\ApiInspector\ApiInspectorServiceProvider'` to the Providers array in `config/app.php`.

Publish the `views` and `configuration file` for easy modifications.

`$ php artisan vendor:publish`

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


## Pusher Info
___
Visit http://pusher.com for more information on the Pusher service. It is quick, easy, and awesome.
My implementation of Pusher in this package can be understood through Jeffrey Wayes' (of Laracasts.com) great video tutorial [great video tutorial](https://laracasts.com/lessons/pusher-awesomeness)
