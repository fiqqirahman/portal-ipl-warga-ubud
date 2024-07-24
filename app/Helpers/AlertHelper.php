<?php
	
	/**
	 * Simple send Sweet Alert Message
	 * @param string $status success | warning | error | info
	 * @param string $message
	 * @return void
	 */
	function sweetAlert(string $status, string $message): void
	{
		session()->flash('alert.status', $status);
		session()->flash('alert.message', $message);
	}