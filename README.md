# Real time streaming API Inspector for Laravel with Pusher.
___


## Table of Contents
- [In a Nutshell](#in-a-nutshell)
- [Installation](#installation)
- [Default Usage](#default-usage)
- [Configuration](#configuration)
- [Pusher Info](#pusher-info)


## In a Nutshell
After you [install the package](#installation), navigate with your [browser](http://isp.netscape.com/) to /api/inspect and see requests being made on your Laravel application in real time without refreshing the browser.
---
Okay, that was the elevator shpiel. Here is the walkthrough of what is happening:

`Hvent90/ApiInspector/ApiInspectorServiceProvider::boot()` intercepts the `$request` object with `$this->app[‘router’]->before([$this, ‘onBefore’]);`.

`Hvent90/ApiInspector/ApiInspectorServiceProvider::onBefore($request)` takes the `$request` object and, after instantiating `Pusher`, uses Pusher to feed the data directly to `hvent90/api-inspector/src/Http/views/stream.blade.php`.


## Installation
- Add this package to your Laravel project by typing `composer require hvent90/api-inspector` in your command line.
- Add `'Hvent90\ApiInspector\ApiInspectorServiceProvider'` to the Providers array in `config/app.php`.
- Publish the `views` and `configuration file` for easy modifications by typing `php artisan vendor:publish` in your command line. [What does this do?](#configuration)
- Enter in your Pusher access keys in `config/api-inspector.php`.


## Default Usage
The URI endpoint of `api/inspect` will now load a view that streams all API requests in real time without refreshing the browser. Enjoy!


## Configuration
You can configure the behavior of ApiInspector via `config/api-inspector.php`.
* `active` accepts either `true` or `false` and will enable or disable ApiInspector
* `public`, `secret`, and `app_id` take your Pusher keys
* `uri` will determine what URI endpoint is associated with the route
* `prefix` will add a prefix to the route
* `subdomain` will add a subdomain to the route
* `middleware` adds middleware to the route

The array called `route-modifiers` is directly injected in to a [route group](http://laravel.com/docs/5.0/routing#route-groups) that governs the API Inspector's route. You can add custom key/value pairs to the route-modifiers array to suite your application's needs.

You can locate and customize the default views found in `resources/views/vendors/hvent90/api-inspector`.


## Pusher Info
Visit http://pusher.com for more information on the Pusher service. It is quick, easy, and awesome.
My implementation of Pusher in this package can be understood through Jeffrey Wayes' (of Laracasts.com) great video tutorial [great video tutorial](https://laracasts.com/lessons/pusher-awesomeness)
