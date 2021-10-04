<?php
/*
 * Project: goodbus.dp.ua
 * File:    app/controllers/Route.php
 * About:   class, routing
 */
namespace app\controllers;
use app\traits\Singleton;

class Route
{
	use Singleton;

	private function __construct() {

		$address_str = $_SERVER['REQUEST_URI']; //content of the address bar
		echo $_SERVER['PHP_SELF'];

	}
}