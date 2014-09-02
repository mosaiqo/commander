<?php namespace Mosaiqo\Commanding;

/**
 * Interface CommandTranslator
 * @package Mosaiqo\Commanding
 */
interface CommandTranslator
{
	/**
	 * @param $command
	 * @return mixed
	 */
	public function toCommandHandler($command);
}