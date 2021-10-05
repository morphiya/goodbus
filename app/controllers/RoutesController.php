<?php
/*
 * Project: goodbus.dp.ua
 * File:    app/controllers/RoutesController.php
 * About:   class, controller of Routes page
 */

namespace app\controllers;
use app\models\ActsModel;

class RoutesController extends BaseController
{
	public function __construct () {
		$this->connection = ActsModel::getInstance();
		$this->title = 'Маршути';
	}
	public function inputRoute() {
		$result = $this->connection->selectRoutes($this->post_array);
		$this->count_row = count($result);

		return $result;
	}

	public function outputRoute($args) {
		$header = $this->render(TEMPLATE.'header', $args);
		$content = $this->render('', $args);

		return compact('header', 'content');
	}
}