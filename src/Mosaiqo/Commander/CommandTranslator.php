<?php namespace Mosaiqo\Commander;

/**
 * Interface CommandTranslator
 * @package Mosaiqo\Commander
 */
interface CommandTranslator
{
	/**
	 * @param $command
	 * @return mixed
	 */
	public function toCommandHandler($command);
}