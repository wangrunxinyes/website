<?php

class exportJson extends BasicApi {

	function __construct() {
		$this->data = array(
			"api_key" => "load_table",
		);
	}

	public static function create() {
		$obj = new self();
		$obj->init();
		return $obj;
	}

	function createJson() {
		$type = Yii::app()->data->getValue('data');
		$page = Yii::app()->data->getValue('page');

		$list = null;
		$class = processer_ajax_class_name::getClass($type);
		if (!is_null($class)) {
			$list = new $class();
			$group = Yii::app()->data->getValue('group');
			if (!is_null($group)) {
				$list->setType($group);
			}
		}

		if (!is_null($list)) {
			$list->execute($page);
			$data = $list->echoJsFormat();
			$result = array(
				"total_page" => $list->getTotalPage(),
				"total" => $list->getTotal(),
				"current" => $list->getPage(),
				"start_id" => $list->getStart(),
				"end_id" => $list->getEnd(),
				"rows" => $data,
			);
			$this->print_result(0, $result);
		} else {
			$this->print_error(1, "error");
		}
	}
}

$execute = exportJson::create();
$execute->createJson();

?>