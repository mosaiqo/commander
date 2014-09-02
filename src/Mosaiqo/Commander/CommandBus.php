<?php namespace Mosaiqo\Commanding;

/**
 * Interface CommandBus
 * @package Mosaiqo\Commanding
 */
interface CommandBus
{
	/**
	 * @param $command
	 * @return mixed
	 */
	public function execute($command);
}