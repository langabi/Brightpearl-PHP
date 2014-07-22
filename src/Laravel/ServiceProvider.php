<?php namespace Brightpearl\Laravel;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider {

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
    }

}
