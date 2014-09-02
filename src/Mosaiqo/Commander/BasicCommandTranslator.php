<?php namespace Mosaiqo\Commanding;

use Exception;

class BasicCommandTranslator implements CommandTranslator
{
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