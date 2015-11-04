<?php

	define("USER_TYPE_SERVER", "1");
	define("USER_TYPE_CLIENT", "2");
	define("USER_TYPE_ADMIN", "3");
	define("USER_MAX_KEY_NUM", "3");

class MODEL_USER{

	//general user
	public $wrx_type;
	public $wrx_level;
	public $wrx_state;
	public $wrx_last;


	//for server
	public $wrx_apps_key_num;

	public $_attributes_array;

	public function init($json_data){

		$this->_type = $json_data->{'main_user_general_type'};
		$this->_attributes_array = array(
					'wrx_type' => 'main_user_general_type',
					'wrx_level' => 'main_user_general_level',
					'wrx_state' => 'main_user_general_state',
					'wrx_last' => 'main_user_general_last',
					);

		//add specific keys;
		switch ($this->_type) {
			case USER_TYPE_SERVER:
				$this->_attributes_array['wrx_apps_key_num'] = 'main_user_general_app_keys';
				break;
			case USER_TYPE_CLIENT:
				# code...
				break;
			case USER_TYPE_ADMIN:
				# code...
				break;
			default:
				# code...
				break;
		}
		self::construct($json_data);
		self::create_session();
	}

	public function construct($json_data){
		foreach ($this->_attributes_array as $key => $mysql) {
			$this->$key = $json_data->{$mysql};
		}
	}

	public function create_session(){
		foreach ($this->_attributes_array as $key => $mysql) {
			Yii::app()->session[$key]= $this->$key;
		}
	}

	public function create_from_session(){

		$this->_type = Yii::app()->session['wrx_user_type'];
		$this->_attributes_array = array(
					'wrx_type' => 'wrx_type',
					'wrx_level' => 'wrx_level',
					'wrx_state' => 'wrx_state',
					'wrx_last' => 'wrx_last',
					);

		//add specific keys;
		switch ($this->_type) {
			case USER_TYPE_SERVER:
				$this->_attributes_array['wrx_apps_key_num'] = 'wrx_apps_key_num';
				break;
			case USER_TYPE_CLIENT:
				# code...
				break;
			case USER_TYPE_ADMIN:
				# code...
				break;
			default:
				# code...
				break;
		}

		foreach ($this->_attributes_array as $key => $mysql) {
			$this->$key = Yii::app()->session[$key];
		}
	}

}

?>