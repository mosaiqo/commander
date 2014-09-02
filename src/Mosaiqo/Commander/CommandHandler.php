<?php namespace Mosaiqo\Commander;

/**
 * Interface CommandHandler
 * @package Mosaiqo\Commander
 */
interface CommandHandler
{
	/** Handle the command.
	 *
	 * @param $command
	 * @return mixed
	 */
	public function handle($command);
} 