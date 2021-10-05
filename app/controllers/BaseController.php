<?php
/*
 * Project: goodbus.dp.ua
 * File:    app/controllers/BaseController.php
 * About:   abstract class of controllers
 */

namespace app\controllers;
use app\exceptions\MyException;
use app\settings\Settings;

abstract class BaseController
{
	protected $controller;
	protected $inputMethod;
	protected $outputMethod;

	protected $connection;
	protected $page;
	protected $title;
	protected $count_row;

	protected $post_array = [
		'post_bus' => "",
		'post_route' => "",
		'post_date' => "",
		'post_atp' => ""
	];

	public function route() {
		$controller = str_replace('/', '\\', $this->controller);
		try {
			$object = new \ReflectionMethod($controller, 'request');

			$args = [
				'inputMethod' => $this->inputMethod,
				'outputMethod' => $this->outputMethod
			];

			$object->invoke(new $controller, $args);
		}
		catch (\ReflectionException $e) {
			throw new MyException ($e->getMessage());
		}
	}

	public function request ($args) {
		$inputData = $args['inputMethod'];
		$outputData = $args['outputMethod'];

		$this->setPost();

		$data = $this->$inputData();
		$this->page = $this->$outputData($data);

		$this->getPage();
	}

	protected function setPost() {
		$this->post_array['post_bus'] =
			isset($_POST['search_bus']) ? filter_var($_POST['search_bus'], FILTER_SANITIZE_STRING) : '';
		$this->post_array['post_route'] =
			isset($_POST['search_route']) ? filter_var($_POST['search_route'], FILTER_VALIDATE_INT) : '';
		$this->post_array['post_date'] =
			isset($_POST['search_date']) ? filter_var($_POST['search_date'], FILTER_SANITIZE_STRING) : '';
		$this->post_array['post_atp'] =
			isset($_POST['search_atp']) ? filter_var($_POST['search_atp'], FILTER_SANITIZE_STRING) : '';
	}

	protected function getPage() {
		if (is_array($this->page)) {
			foreach ($this->page as $block) {
				echo $block;
			}
		} else {
			echo $this->page;
		}
		exit();
	}

	protected function render ($path = '', $args) {
		if(!$path) {
			$class = new \ReflectionClass($this);
			$space = str_replace('\\' ,'/' , $class->getNamespaceName().'\\');
			$routes = Settings::getProperty('routes');

			if($space === $routes['admin']['path']){
				$template = ADMIN_TEMPLATE;
			}
			else {
				$template = TEMPLATE;
			}

			$path = $template.explode('controller', strtolower($class->getShortName()))[0];
		}

		// передати шаблон у змінну $tamplate
		ob_start();
		$title = $this->title;
		$count_row = $this->count_row;
		$args;
		if (!@include_once $path.'.php') {
			throw new MyException('Відсутній шаблон - '.$path.'.php');
		}
		return ob_get_clean();
	}
}