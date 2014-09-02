<?php namespace Mosaiqo\Commander\Eventing;

use Illuminate\Support\ServiceProvider;

/**
 * Class EventingServiceProvider
 * @package Mosaiqo\Commander\Eventing
 */
class EventingServiceProvider extends ServiceProvider
{

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$listeners = $this->app['config']->get('mosaiqo.listeners');

		foreach($listeners as $listener)
		{
			$this->app['events']->listen('Mosaiqo.*', $listener);
		}
	}
}