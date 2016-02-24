<?php

class wrx_model_system_basic extends BasicUnit {

	function __construct() {

		$this->basic_attributes = array(

			's_state',

			's_reload_all_user_data',

			's_last_reload_all_user_data',

			's_back_up_db',

			's_last_back_up_db',

		);

		$this->basic_data = array(

			's_state' => '1',

			's_reload_all_user_data' => '0',

			's_last_reload_all_user_data' => time(),

			's_back_up_db' => '0',

			's_last_back_up_db' => time(),

		);

		$this->basic_indentify = "wrx_model_system_basic";

	}

	public static function load() {
		$obj = new self();
		$obj->load_unit_by_id(1);
		return $obj;
	}

	function reload_user() {
		$this->setPar('s_reload_all_user_data', 1);
		$this->save();
	}

	function reload_user_finish($result) {
		$this->setPar('s_reload_all_user_data', $result);
		$this->setPar('s_last_reload_all_user_data', time());
		$this->save();
	}

	function backup_db() {
		$this->setPar('s_back_up_db', 1);
		$this->save();
	}

	function backup_db_finish($result) {
		$this->setPar('s_back_up_db', $result);
		$this->setPar('s_last_back_up_db', time());
		$this->save();
	}

	function restore_db_finish($result) {
		$this->setPar('s_back_up_db', $result);
		$this->save();
	}

	function save() {
		$this->store_unit();
	}
}

?>