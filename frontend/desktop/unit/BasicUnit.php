<?php

class BasicUnit {

	protected $basic_attributes;

	protected $basic_value;

	protected $basic_indentify;

	protected $basic_data;

	function __construct() {

		# code...

	}

	public function getAttribute() {

		return $this->basic_attributes;

	}

	public function getValue($key = null) {

		if (is_null($key)) {

			return $this->basic_value;

		}

		if (isset($this->basic_value[$key])) {

			return $this->basic_value[$key];

		} else {

			return null;

		}

	}

	public function setValue($array) {

		if ($array != null) {

			foreach ($this->basic_attributes as $key) {

				if (isset($array[$key])) {

					$this->basic_value[$key] = $array[$key];

				} else {

					$this->basic_value[$key] = null;

				}

			}

		}

	}

	public function setValueFromBean($bean) {

		if ($bean->id != null) {

			foreach ($this->basic_attributes as $key) {

				$this->basic_value[$key] = $bean->$key;

				Logger::log($key, $this->basic_value[$key]);

			}

			$this->basic_value['id'] = $bean->id;

		}

	}

	public function setPar($key, $value) {

		$this->basic_value[$key] = $value;

	}

	public function load_unit_by_id($id) {

		$obj = R::load($this->basic_indentify, $id);

		if (!is_null($obj->id)) {

			$init_data = array();

			$this->basic_value['id'] = $obj->id;

			foreach ($this->basic_attributes as $key) {
				$this->basic_value[$key] = $obj->$key;
			}

			return true;
		}

		return false;
	}

	public function check_state() {

		if (is_null($this->basic_value)) {

			return false;

		} else {

			if ($this->getValue('id') == "" || is_null($this->getValue('id'))) {

				return false;

			} else {

				return true;

			}

		}

	}

	public function store_unit($event = null) {

		$unit = R::dispense($this->basic_indentify);

		$data = array();

		foreach ($this->getAttribute() as $value) {

			$unit->$value = $this->getValue($value);

			$data[$value] = $this->getValue($value);

		}

		if ($this->getValue('id') != null && $this->getValue('id') != "") {

			$unit->id = $this->getValue('id');

		}

		$id = R::store($unit);

		if ($event != null) {

			$data["motified_id"] = $id;

			$event = SystemEventUnit::create($this->basic_indentify, json_encode($data));

			$event->store();

		}

		$this->setPar('id', $id);

		return $id;

	}

	public function unit_init_db() {

		$unit = R::dispense($this->basic_indentify);

		foreach ($this->getAttribute() as $value) {

			$unit->$value = "init_" . $value;

		}

		return R::store($unit);

	}

	//idenfity: class; key: search key; value: match value;

	public static function load_unit_by_attribute($idenfity, $key, $value) {

		//$key = ' title = :title LIMIT :limit',

		//$value = array(

		//               ':limit' => $limit,

		//               ':title' => $title

		//           );

		$data = R::find(

			$idenfity,

			$key,

			$value

		);

		return R::exportAll($data);

	}

	public function init_unit() {

		if ($this->basic_data != null) {

			foreach ($this->basic_data as $key => $value) {

				$this->setPar($key, $value);

			}

		} else {

			foreach ($this->getAttribute() as $key) {

				$this->setPar($key, "init value");

			}

		}

		return $this->store_unit();

	}

	public function create_session() {

		if ($this->getValue('id') != null) {
			$_SESSION[$this->basic_indentify]['id'] = $this->getValue('id');
		}

	}

	public function create_from_session() {

		if (isset($_SESSION[$this->basic_indentify]['id'])) {
			$id = $_SESSION[$this->basic_indentify]['id'];
			return $this->load_unit_by_id($id);
		} else {
			return false;
		}

	}

}

?>