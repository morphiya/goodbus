<?php
/*
 * Project: goodbus.dp.ua
 * File:    app/controllers/ActsController.php
 * About:   class, controller of Acts page
 */

namespace app\controllers;
use app\models\ActsModel;

class ActsController extends BaseController
{
	public function __construct() {
		$this->connection = ActsModel::getInstance();
		$this->title = 'Акти';
	}

	public function inputAct() {
		$result = $this->connection->selectActs($this->post_array);
		$this->count_row = count($result);

		return $result;
	}

	public function outputAct($args) {
		$header = $this->render(TEMPLATE.'header', $args);
		$content = $this->render(TEMPLATE.'acts', $args);

		return compact('header', 'content');
	}
}