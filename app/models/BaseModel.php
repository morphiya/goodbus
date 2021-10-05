<?php
/*
 * Project: goodbus.dp.ua
 * File:    app/model/BaseModel.php
 * About:   abstract class
 */
namespace app\models;
use app\exceptions\MyException;

abstract class BaseModel
{
	protected $db;

	protected function getConnection() {
		$db = @new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		if ($db->connect_error) {
			throw new MyException('DATABASE connection error: '.$db->connect_errno.' '.
				$db->connect_error, 1);
		}
		$db->set_charset("utf8");
		return $db;
	}

	final public function query($query, $method = 'select') {
		$result_in = $this->db->query($query);

		if ($this->db->affected_rows === -1) {
			throw new MyException('SQL-query execution error: '.$query." ".
				$this->db->errno.' '.$this->db->error);
		}

		switch ($method) {
			case 'select':
				if ($result_in->num_rows) {
					$result_out = [];
					for ($i=0; $i < $result_in->num_rows; $i++) {
						$result_out[] = $result_in->fetch_assoc();
					}
					return $result_out;
				}
				return false;
			default:
				return true;
		}
	}
}