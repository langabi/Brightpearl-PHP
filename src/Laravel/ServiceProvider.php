<?php namespace Brightpearl\Laravel;

use Brightpearl\Exception\UnauthorizedException;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = true;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bindShared('brightpearl', function($app) { 
            
            if (isset($app['config']['services']['brightpearl'])) {
            	
            	$config = array_filter($app['config']['services']['brightpearl']);
            	
                return new \Brightpearl\Client($config);
            
            } else return new \Brightpearl\Client();
            
        });
        
        $app = $this->app;
        
        $this->app->error(function(UnauthorizedException $exception) use ($app) {
			$app['log']->warning($exception);
		});
    }

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('brightpearl');
	}

}
