<?php
/*
 * Project: goodbus.dp.ua
 * File:    app/model/ActsModel.php
 * About:   class, main model of application
 */

namespace app\models;
use app\traits\Singleton;

class ActsModel extends BaseModel
{
	use Singleton;

	private function __construct() {
		$this->db = $this->getConnection();
	}
	public function selectActs ($post_array) {
		$select = "SELECT acts.date,
            routes.number as route, atp.name as atp,
            buses.id as bus_id, buses.number as bus, buses.class, buses.year, 
            brands.name as brand, models.name as model,
            buses.total_capacity, buses.seat_capacity,
            buses.point_year, buses.point_capacity,
            acts.param01, acts.param02, acts.param03, acts.param04, acts.param05,
            acts.param06, acts.param07, acts.param08, acts.param09, acts.param10,
            acts.param11, acts.param12, acts.param13, acts.param14,
            acts.total_point
            FROM acts
            LEFT JOIN routes ON acts.route_id = routes.number
            LEFT JOIN atp ON acts.atp_id = atp.id
            LEFT JOIN buses ON acts.bus_id = buses.id
            LEFT JOIN models ON buses.model_id = models.id
            LEFT JOIN brands ON models.brand_id = brands.id";

		return $this->query($select.$this->getWhere($post_array));
	}

	protected function getWhere($post_array) {
		$where = " WHERE ";
		$is_before = false;
		$count = 0;
		foreach ($post_array as $item => $value) {
			if ($value) {
				if ($is_before) { $where .= " AND "; }
				switch ($item) {
					case ('post_bus'):
						$post_bus = str_replace(' ', '', $post_array['post_bus']);
						$post_bus = mb_strtoupper($post_bus, 'UTF-8');
						$where .= "buses.number LIKE '%".$post_bus."%'";
						$is_before = true;
						break;
					case ('post_route'):
						$where .= "routes.number LIKE '".$post_array['post_route']."'";
						$is_before = true;
						break;
					case ('post_date'):
						$where .= "acts.date LIKE '".$post_array['post_date']."'";
						$is_before = true;
						break;
					case ('post_atp'):
						$where .= "atp.name COLLATE UTF8_GENERAL_CI LIKE '%".$post_array['post_atp']."%'";
						$is_before = true;
						break;
				}
				$count++;
			}
		}
		if (!$is_before) { return "";}
		else { return $where; }
	}

	public function selectRoutes ($post_array) {
		$select = "SELECT routes.number as route, MAX(acts.date) as last_date, COUNT(acts.route_id) as count_acts,
            AVG(acts.total_point) as average_point,
            atp.name as atp FROM routes
            LEFT JOIN acts ON acts.route_id = routes.number AND routes.atp_id = acts.atp_id
            LEFT JOIN atp ON acts.atp_id = atp.id";
		$group = "GROUP BY routes.number";
		return $this->query($select.$this->getWhere($post_array).' '.$group);
	}

	public function selectBuses($post_array) {
		$problems = [
			'param01' => 'стан дверей',
			'param02' => 'стан вікон та люків',
			'param03' => 'стан сидінь',
			'param04' => 'стан поручнів',
			'param05' => 'стан підлоги',
			'param06' => 'стан штор',
			'param07' => 'зміни у конструкції ТЗ',
			'param08' => 'відсутня інформація',
			'param09' => 'відсутній вогнегасник',
			'param10' => 'відсутня аптечка',
			'param11' => 'відсутні трафарети',
			'param12' => 'відстуній кондиціонер',
			'param13' => 'проблеми із зовнішнім виглядом',
			'param14' => 'не пристосовано для людей з інвалідністю'
		];
		$search_string = str_replace('WHERE', 'AND', $this->getWhere($post_array));
		$select_acts = $this->selectActs($post_array);
		$select_buses =$this->query("SELECT buses.id as bus_id, buses.number as bus, acts.total_point as actual_point, 
                   acts.date as last_date, temp_join.count_acts
                   FROM acts
                   LEFT JOIN buses ON acts.bus_id = buses.id
                   LEFT JOIN (SELECT acts.bus_id, COUNT(acts.id) as count_acts 
                              FROM acts GROUP BY acts.bus_id) AS temp_join 
                              ON temp_join.bus_id = acts.bus_id
                   LEFT JOIN routes ON acts.route_id = routes.number
                   LEFT JOIN models ON buses.model_id = models.id
                   LEFT JOIN brands ON models.brand_id = brands.id
                   LEFT JOIN atp ON atp.id=acts.atp_id
                   WHERE NOT EXISTS (SELECT 1
                                     FROM acts AS temp
                                     WHERE acts.bus_id = temp.bus_id AND
                                           temp.date > acts.date)".$search_string);

		$result = [];
		if($select_buses && $select_acts) {
			foreach ($select_buses as $busno => $bus) {
				$result[$busno] = ['bus' => [], 'acts' => []];
				$result[$busno]['bus'] = $bus;
				foreach ($select_acts as $actno => $act) {
					if ($select_acts[$actno]['bus_id'] == $result[$busno]['bus']['bus_id']) {
						$result[$busno]['bus']['class'] = $select_acts[$busno]['class'];
						$result[$busno]['bus']['brand_model'] = $select_acts[$busno]['brand'].' '.$select_acts[$busno]['model'];
						$result[$busno]['bus']['capacity'] = $select_acts[$busno]['total_capacity'].' / '.$select_acts[$busno]['seat_capacity'];
						$result[$busno]['bus']['year'] = $select_acts[$busno]['year'];
						$problems_string = "";
						foreach ($select_acts[$actno] as $field => $value) {
							if (strpos($field, 'param') !== false && $value == 0) {
								$problems_string .= $problems[$field].'; ';
							}
						}
						$problems_string = rtrim($problems_string, '; ');
						$result[$busno]['acts'][$actno] = [
							'date' => $select_acts[$actno]['date'],
							'total_point' => $select_acts[$actno]['total_point'],
							'route' => $select_acts[$actno]['route'],
							'atp' => $select_acts[$actno]['atp'],
							'problems' => $problems_string
						];
					}
				}
			}
		}
		return $result;
	}
}