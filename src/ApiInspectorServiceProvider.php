<?php namespace Hvent90\ApiInspector;

use App;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class ApiInspectorServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		// Views
		$this->loadViewsFrom(realpath(__DIR__.'/resources/views'), 'api-inspector');
		$this->publishes([
	        __DIR__.'/resources/views' => base_path('resources/views/vendor/api-inspector'),
	    ]);

		// Routes
		$this->setupRoutes($this->app->router);

		// Catch the request
		$this->app['router']->before([$this, 'onBefore']);
	}

	/**
	 * Define the routes for the application.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function setupRoutes(Router $router)
	{
		$router->group(['namespace' => 'Hvent90\ApiInspector\Http\Controllers'], function($router)
		{
			require __DIR__.'/Http/routes.php';
		});
	}

	public function register()
	{
		$this->registerContact();
		// config(['config/api-inspector.php']);

		$configPath = __DIR__ . '/config/api-inspector.php';
        $this->publishes([$configPath => config_path('/api-inspector.php')]);

         /** @var \Illuminate\Http\Request $request */
        $request = $this->app['request'];

        $this->app->singleton('Hvent90\ApiInspector\ApiInspectorServiceProvider', function($app)
        {
            return new Connection($app['config']['api-inspector']);
        });
	}
	private function registerContact()
	{
		$this->app->bind('Hvent90\ApiInspector',function($app){
			return new ApiInspector($app);
		});
	}

	/**
     * Check the Request before running it through the router.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response|null
     */
    public function onBefore($request)
    {
    	$keys = $this->app['config']->get('api-inspector');

        App::bind('Pusher', function($app) {
        	$keys = $this->app['config']->get('api-inspector');

            return new \Pusher($keys['public'], $keys['secret'], $keys['app_id']);
        });

    	if ($keys['active'] == false) {
    		return;
    	}

        App::make('Pusher')->trigger('apiChannel', 'apiCall', [
            'method'  => $request->method(),
            'root'    => $request->root(),
            'url'     => $request->url(),
            'path'    => $request->path(),
            'ajax'    => $request->ajax(),
            'ip'      => $request->ip(),
            'input'   => $request->all(),
            'is-json' => $request->isJson(),
            'format'  => $request->format(),
            'session' => json_encode($request->session()),
            'header'  => $request->header()
            'input-json' => json_encode($request->json()),
            'wants-json' => $request->wantsJson(),
        ]);

        return;
    }

}
