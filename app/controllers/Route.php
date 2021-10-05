<?php
/*
 * Project: goodbus.dp.ua
 * File:    app/controllers/Route.php
 * About:   class, routing
 */
namespace app\controllers;
use app\traits\Singleton;
use app\settings\Settings;
use app\exceptions\MyException;

class Route extends BaseController
{
	use Singleton;

	protected $routes;
	protected $controller;

	private function __construct() {

		//content of the address bar
		$address_str = $_SERVER['REQUEST_URI'];

		// cut off from url 'index.php'
		$path = substr($_SERVER['PHP_SELF'], 0, strpos($_SERVER['PHP_SELF'], 'index.php'));

		if ($path === SITE_PATH) {
			// get a list of routes
			$this->routes = Settings::getProperty('routes');
			if(!$this->routes) {
				throw new MyException('Routing config doesn`t exist in (app/settings/Settings.php)', 1);
			}

			$url = explode('/', substr($address_str, strlen(SITE_PATH)));
			if (!empty($url[0]) && $url[0] === $this->routes['admin']['alias']) {
				// connect admin path
				array_shift($url);
				$this->controller = $this->routes['admin']['path'];
				$role = 'admin';
			} else {
				// connect main path
				$this->controller = $this->routes['main']['path'];
				$role = 'main';
			}

			$this->createRoute($role, $url);
		}
		else {
			throw new MyException("Invalid site directory. Check the app/settings/config.php", 1);
		}
	}

	private function createRoute($role, $url) {
		$route = [];

		if(!empty($url[0])) {
			if(isset($this->routes[$role]['routes'][$url[0]])) {
				$route = explode('/', $this->routes[$role]['routes'][$url[0]]);
				$this->controller .= ucfirst($route[0].'Controller');
			}
			else {
				$this->controller .= ucfirst($url[0].'Controller');
			}
		} else {
			$this->controller .= $this->routes['default']['controller'];
		}
		$this->inputMethod = (!empty($route[1])) ? $route[1] : $this->routes['default']['inputMethod'];
		$this->outputMethod = (!empty($route[2])) ? $route[2] : $this->routes['default']['outputMethod'];

	}
}