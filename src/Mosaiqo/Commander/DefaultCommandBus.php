<?php namespace Mosaiqo\Commander;


use Illuminate\Foundation\Application;

class DefaultCommandBus implements CommandBus
{
	/**
	 * @var
	 */
	private $app;
	/**
	 * @var
	 */
	private $commandTranslator;

	public function __construct(Application $app, CommandTranslator $commandTranslator)
	{
		$this->app = $app;
		$this->commandTranslator = $commandTranslator;
	}

	public function execute($command)
	{
		$handler = $this->commandTranslator->toCommandHandler($command);

		return $this->app->make($handler)->handle($command);
	}
} 