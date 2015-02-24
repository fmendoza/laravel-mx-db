<?php namespace Fmendoza\Mxdb;

use Illuminate\Support\ServiceProvider;

class MxdbServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('fmendoza/mxdb');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->registerState();
		$this->registerCity();
	    $this->registerCommands();
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function registerState()
	{
	    $this->app->bind('state', function($app)
	    {
	        return new State;
	    });
	}

	public function registerCity()
	{
	    $this->app->bind('city', function($app)
	    {
	        return new City;
	    });
	}
	
	/**
	 * Register the artisan commands.
	 *
	 * @return void
	 */
	protected function registerCommands()
	{		    
	    $this->app['command.mxdb'] = $this->app->share(function($app)
	    {
	        return new MigrationCommand;
	    });
	    
	    $this->commands('command.mxdb');
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('state', 'city');
	}

}
