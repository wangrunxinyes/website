<?php

class DataHelper extends CModel {

	public function init() {

		//init;

	}

	public function attributeNames() {

		return "DataHelper";

	}

	public function check($name, $object) {

		if (isset($_POST[$name])) {

			if ($_POST[$name] != null && $_POST[$name] != "") {

				$object->set($name, $_POST[$name]);

				return true;

			} else {

				return false;

			}

		} else if (isset($_GET[$name])) {

			if ($_GET[$name] != null && $_GET[$name] != "") {

				$object->set($name, $_GET[$name]);

				return true;

			} else {

				return false;

			}

		} else {

			return false;

		}

	}

	public function checkList($array, $object) {

		foreach ($array as $key => $value) {

			if (!self::check($value, $object)) {

				return false;

			}

		}

		return true;

	}

	public function getValue($name, $default = null) {

		if (isset($_POST[$name])) {

			return $_POST[$name];

		} else if (isset($_GET[$name])) {

			return $_GET[$name];

		} else {

			return $default;

		}

	}

}

?>