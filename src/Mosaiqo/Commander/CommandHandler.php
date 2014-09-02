<?php namespace Mosaiqo\Commanding;

/**
 * Interface CommandHandler
 * @package Mosaiqo\Commanding
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