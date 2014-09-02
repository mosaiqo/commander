<?php namespace Mosaiqo\Commander\Eventing;

use Illuminate\Log\Writer;
use ReflectionClass;

/**
 * Class EventListener
 * @package Mosaiqo\Commandor\Eventing
 */
class EventListener
{
	/**
	 * @var Writer
	 */
	protected $log;

	/**
	 * @param Writer $log
	 */
	public function __construct(Writer $log)
	{
		$this->log = $log;
	}

	/**
	 * @param $event
	 * @return mixed
	 */
	public function handle($event)
	{
		$eventName = $this->getEventName($event);

		if ($this->listenerIsRegistered($eventName))
		{
			return call_user_func([$this, 'when'.$eventName], $event);
		}
	}

	/**
	 * @param $event
	 * @return string
	 */
	public function getEventName($event)
	{
		return (new ReflectionClass($event))->getShortName();
	}

	/**
	 * @param $eventName
	 * @return bool
	 */
	public function listenerIsRegistered($eventName)
	{
		$method = "when{$eventName}";
		return method_exists($this, $method);
	}
} 