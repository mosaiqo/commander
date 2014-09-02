<?php namespace Mosaiqo\Commander;

/**
 * Interface CommandBus
 * @package Mosaiqo\Commander
 */
interface CommandBus
{
	/**
	 * @param $command
	 * @return mixed
	 */
	public function execute($command);
}