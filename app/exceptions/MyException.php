<?php
/*
 * Project: goodbus.dp.ua
 * File:    app/exceptions/MyException.php
 * About:   class
 */

namespace app\exceptions;
use app\traits\BaseMethods;
class MyException extends \Exception
{
	use BaseMethods;

    protected $messages;

    public function __construct($message = "", $code = 0)
	{
		parent::__construct($message, $code);

		$this->messages = include 'messages.php';

		// generating a message for the log
		$error = $this->getMessage() ? $this->getMessage() : $this->messages[$this->getCode()];
		$error .= "\r\n".'file '.$this->getFile()."\r\n".'in line '.$this->getLine()."\r\n";

		// message for the user: check project message list
		if ($this->messages[$this->getCode()]) {
			$this->message = $this->messages[$this->getCode()];
		}

		$this->writeLog($error);
	}
}