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
	
	/**
	 * Send Error Sweet Alert Message with Logging to Channel Exception
	 * @param string $message
	 * @param string|Throwable|null $throw
	 * @param array|null $context
	 * @param bool $log
	 * @return void
	 */
	function sweetAlertException(string $message, string|null|Throwable $throw = null, array|null $context = [], bool $log = true): void
	{
		$throwMessage = '-';
		if($throw instanceof Throwable){
			if($log) {
				$relativeFilePath = Str::after($throw->getFile(), base_path() . DIRECTORY_SEPARATOR);
				$context = [
					'context' => $context,
					'trace' => [
						'file' => $relativeFilePath,
						'line' => $throw->getLine()
					]
				];
			}
			$throwMessage = $throw->getMessage();
		} else if(is_string($throw)){
			$throwMessage = $throw;
		}
		
		if(app()->environment('production')){
			session()->flash('alert.message', $message);
		} else {
			session()->flash('alert.message', trim($message) . ' [' . $throwMessage . ']');
		}
		
		session()->flash('alert.status', 'error');
		
		if($log){
			Log::channel('exception')->error('[ALERT] ' . trim($message) . ' [' . $throwMessage . ']', $context);
		}
	}