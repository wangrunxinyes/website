<?php

class wrx_page_unit_models {

	protected $page;
	protected $list;
	protected $start_id;
	protected $end_id;
	protected $total;
	protected $total_page;
	protected $type;
	protected $ex_data;
	protected $result;

	public function execute($page = null) {
		if (self::createDataSource($page)) {
			if (self::formatData()) {
				return true;
			} else {
				echo "System Error | 系统忙，请稍后再试";
			}
		} else {
			echo "System Error | 系统忙，请稍后再试";
		}
	}

	function createDataSource($page = null) {
		if (is_null($page)) {
			$this->page = 1;
		} else {
			$this->page = $page;
		}

		$type = $this->type;
		if (is_null($type) || $type == "") {
			return false;
		}
		$this->list = $type::get_data_by_page_number($this->page, $this->ex_data);
		return true;
	}

	public function execute_search($json) {
		if (self::createSearchSource($json)) {
			if (self::formatData()) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	function createSearchSource($json) {
		if (is_null($json)) {
			return false;
		}

		if (isset($json['page'])) {
			$this->page = $json['page'];
		} else {
			$this->page = 1;
		}

		$type = $this->type;
		if (is_null($type) || $type == "") {
			return false;
		}
		$this->list = $type::get_data_by_search($json);
		return true;
	}

	function formatData() {
		$this->total = $this->list['num'];
		unset($this->list['num']);
		$this->start_id = 10 * (-1 + $this->page) + 1;
		$this->end_id = 0 + $this->start_id + count($this->list) - 1;
		if ($this->total % 10 == 0) {
			$this->total_page = (int) ($this->total / 10);
		} else {
			$this->total_page = (int) ($this->total / 10) + 1;
		}

		return true;
	}

	function echoTotal() {
		echo $this->total;
	}

	function echoStart() {
		echo $this->start_id;
	}

	function echoEnd() {
		echo $this->end_id;
	}

	function echoPage() {
		echo $this->page;
	}

	function echoTotalPage() {
		echo $this->total_page;
	}

	function getTotal() {
		return $this->total;
	}

	function getStart() {
		return $this->start_id;
	}

	function getEnd() {
		return $this->end_id;
	}

	function getPage() {
		return $this->page;
	}

	function getTotalPage() {
		return $this->total_page;
	}

	function echoFormat() {
		$this->result = "";
		$this->execute_view();
		echo $this->result;
	}

	function echoJsFormat() {
		$this->result = "";
		$this->execute_view();
		return $this->result;
	}
}
?>