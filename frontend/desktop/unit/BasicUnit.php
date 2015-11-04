<?php
/**
 * basic unit
 */
class BasicUnit {

	protected $basic_attributes;
	protected $basic_value;
	protected $basic_indentify;

	function __construct() {
		# code...
	}

	public function getAttribute() {
		return $this->basic_attributes;
	}

	public function getValue($key) {
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
				}
			}
		}
	}

	public function load_unit_by_attribute($array) {
		return R::find(
			$this->basic_indentify,
			$array['key'],
			$array['value']
		);
	}

	public function load_unit_by_id($id) {
		return R::load($this->basic_indentify, $id);
	}

	public function store_unit($unit) {

		$post = R::dispense($this->basic_indentify);

		foreach ($unit->getAttribute() as $value) {
			$post->$value = $unit->getValue($value);
		}

		return R::store($post);
	}

}
?>