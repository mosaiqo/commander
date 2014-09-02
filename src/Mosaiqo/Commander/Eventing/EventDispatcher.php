<?php namespace Mosaiqo\Commander\Eventing;

use Illuminate\Events\Dispatcher;
use Illuminate\Log\Writer;

/**
 * Class EventDispatcher
 * @package Mosaiqo\Commander\Eventing
 */
class EventDispatcher {

	/**
	 * @var Dispatcher
	 */
	protected $event;

	/**
	 * @var Writer
	 */
	private $log;

	/**
	 * @param Dispatcher $event
	 * @param Writer $log
	 */
	public function __construct(Dispatcher $event, Writer $log)
	{
		$this->event = $event;
		$this->log = $log;
	}

	/**
	 * @param array $events
	 */
	public function dispatch(array $events)
	{
		foreach($events as $event)
		{
			$eventName = $this->getEventName($event);

			$this->event->fire($eventName, $event);

			$this->log->debug("$eventName was fired");

		}
	}

	/**
	 * @param $event
	 * @return mixed
	 */
	protected function getEventName($event)
	{
		return str_replace("\\", ".", get_class($event));
	}
} 