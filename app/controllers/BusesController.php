<?php
/*
 * Project: goodbus.dp.ua
 * File:    app/controllers/BusesController.php
 * About:   class, controller of Buses page
 */

namespace app\controllers;
use app\models\ActsModel;

class BusesController extends BaseController
{
	public function __construct() {
		$this->connection = ActsModel::getInstance();
		$this->title = 'Автобуси';
	}

	public function inputBus() {
		$result = $this->connection->selectBuses($this->post_array);
		$this->count_row = count($result);

		return $result;
	}

	public function outputBus($args) {
		$header = $this->render(TEMPLATE.'header', $args);
		$content = $this->render('', $args);

		return compact('header', 'content');
	}
}