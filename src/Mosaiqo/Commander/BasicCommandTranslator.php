<?php namespace Mosaiqo\Commander;
use Exception;

/**
 * Class BasicCommandTranslator
 * @package Mosaiqo\Commander
 */
class BasicCommandTranslator implements CommandTranslator
{
	/**
	 * @param $command
	 * @return string
	 * @throws \Exception
	 */
	public function toCommandHandler($command)
	{
		$command = new \ReflectionClass($command);

		$namespace = $command->getNamespaceName();
		$handler = str_replace('Command',"CommandHandler" , $command->getShortName());
		$fullClass = $namespace . "\\" . $handler;

		if( !class_exists($fullClass))
		{
			$message = "Command handler [$fullClass] does not exist.";

			throw new Exception($message);
		}

		return $fullClass;
	}
} 