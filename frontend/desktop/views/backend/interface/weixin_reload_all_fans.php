<?php

class reload extends BasicApi {

	function __construct() {
		$this->data = array(
			"api_key" => "reload_all_user_info",
		);
	}

	public static function create() {
		$obj = new self();
		$obj->init();
		return $obj;
	}

	function start() {
		$users = new weixin_reload_all_fans_helper();
		$users->execute();
		if ($users->get_result() == 0) {
			$this->print_result(0, "success");
		} else {
			$this->print_error(1, $users->get_result());
		}
	}
}

$execute = reload::create();
$execute->start();

?>