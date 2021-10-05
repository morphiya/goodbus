<?php
/*
 * Project: goodbus.dp.ua
 * File:    app/settings/Settings.php
 * About:   class, store routes
 */

namespace app\settings;
use app\traits\Singleton;

class Settings
{
	use Singleton;

	private $routes = [
		'admin' => [
			'alias' => 'admin',
			'path'	=> 'app/controllers/admin/',
			'routes'=> []
		],
		'main' => [
			'path'	=> 'app/controllers/',
			'routes'=> [
				'routes' => 'Routes/inputRoute/outputRoute',
				'buses'	 => 'Buses/inputBus/outputBus'
			]
		],
		'default' => [
			'controller'	=> 'ActsController',
			'inputMethod'	=> 'inputAct',
			'outputMethod'	=> 'outputAct'
		]
	];

	static public function getProperty($property) {
		return self::getInstance()->$property;
	}
}