<?php
/*
 * Project: goodbus.dp.ua
 * File:    app/traits/BaseMethods.php
 * About:   trait
 */

namespace app\traits;

trait BaseMethods
{
	// logger
	protected function writeLog ($message, $file = 'log.txt', $event = 'Fault')
	{
		$dateTime = new \DateTime('', new \DateTimeZone('Europe/Kiev'));
		$str = $event.': '.$dateTime->format('d-m-Y G:i:s').' - '.$message."\r\n";
		file_put_contents('../app/log/'.$file, $str, FILE_APPEND);
	}
}