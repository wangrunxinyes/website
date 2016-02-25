<?php

/**
 *
 */
class processer_ajax_search {

	private $object;
	private $type;
	private $json;
	private $sql;
	private $result;
	private $error;

	function __construct() {
		$this->type = null;
		$this->json = null;
		$this->sql = null;
		$this->result = null;
		$this->error = null;
	}

	public function build($type, $json) {
		$this->type = $type;
		$this->json = json_decode($json, true);
		self::create_view();
	}

	function create_view() {
		$class = processer_ajax_class_name::getClass($this->type);
		$result = false;

		if (!is_null($class)) {
			$this->object = new $class();
			$result = $this->object->execute_search($this->json);
		}

		if ($result) {
			$data = $this->object->echoJsFormat();
			$this->result = array(
				"total_page" => $this->object->getTotalPage(),
				"total" => $this->object->getTotal(),
				"current" => $this->object->getPage(),
				"start_id" => $this->object->getStart(),
				"end_id" => $this->object->getEnd(),
				"rows" => $data,
			);
		} else {
			$this->result = array(
				"total_page" => 0,
				"total" => 0,
				"current" => 0,
				"start_id" => 0,
				"end_id" => 0,
				"rows" => "",
			);
		}
	}

	function check() {

	}

	function echo_result() {

	}

	function getResult() {
		if (is_null($this->result)) {
			return array(
				'code' => 2,
				'des' => 'error',
			);
		} else {
			return array(
				'code' => 0,
				'data' => $this->result,
			);
		}
	}
}

?>