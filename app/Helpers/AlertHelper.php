<?php
	
	/**
	 * Simple send Sweet Alert Message
	 * @param string $icon success | warning | error | info
	 * @param string $message
	 * @return void
	 */
	function sweetAlert(string $icon, string $message): void
	{
		session()->flash('alert.status', $icon);
		session()->flash('alert.message', $message);
	}