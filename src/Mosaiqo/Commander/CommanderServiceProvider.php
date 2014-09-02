<?php namespace Mosaiqo\Commander;

use Illuminate\Support\ServiceProvider;

/**
 * Class CommanderServiceProvider
 * @package Mosaiqo\Commander
 */
class CommanderServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->registerCommandTranslator();

		$this->registerCommandBus();
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return ['commander'];
	}

	/**
	 *
	 */
	public function registerCommandTranslator()
	{
		$this->app->bind('Mosaiqo\Commander\CommandTranslator', 'Mosaiqo\Commander\BasicCommandTranslator');
	}

	/**
	 *
	 */
	public function registerCommandBus()
	{
		$this->app->bindShared('Mosaiqo\Comander\CommandBus', function () {
			$this->app->make('Mosaiqo\Commander\DefaultCommandBus');
		});
	}

}
