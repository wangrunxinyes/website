<?php

class register_helper extends BasicData {

	const NO_ERROR = 0;
	const MISS_PARAMETER = 1;
	const USERNAME_EXIST = 2;
	const EMAIL_EXIST = 3;
	const LIMIT_CHECK_ERROR = 4;

	public static function create() {
		$obj = new self();
		$obj->init();
		return $obj;
	}

	public function init() {

		parent::init();

		//init parameters;
		$this->need_var_array = array(
			'0' => 'username',
			'1' => 'password',
			'2' => 'type',
			'3' => 'level', //1
			'4' => 'state', //0
			'5' => 'last', //current time
			'6' => 'app_keys', //0
			'checkcode' => 'checkcode',
			'email' => 'email',
			'realname' => 'realname',
		);

		$this->db_array = array(
			'0' => 'main_user_general_uname',
			'1' => 'main_user_general_psw',
			'2' => 'main_user_general_type',
			'3' => 'main_user_general_level', //1
			'4' => 'main_user_general_state', //0
			'5' => 'main_user_general_last', //current time
			'6' => 'main_user_general_app_keys', //0
		);
	}

	//check parameters;
	public function check() {

		self::checkMust();

		if (!self::checkMust()) {
			return register_helper::MISS_PARAMETER;
		}

		if (!self::checkUserName()) {
			return self::USERNAME_EXIST;
		}

		if (!self::checkEmail()) {
			return self::EMAIL_EXIST;
		}

		if (!self::checkTypeAndLimit()) {
			return self::LIMIT_CHECK_ERROR;
		}

		return self::NO_ERROR;
	}

	public function checkMust() {
		if (Yii::app()->data->checkList($this->need_var_array, $this)) {
			return true;
		} else {
			return false;
		}
	}

	public function checkUserName() {
		return true;
	}

	public function checkEmail() {
		return true;
	}

	public function checkTypeAndLimit() {
		return true;
	}

	public function register() {

		$new = R::dispense('main_user_general');

		foreach ($this->db_array as $key => $db) {
			$id = $this->need_var_array[$key];
			$value = $this->value_array[$id];
			$new->$db = $value;
		}

		$id = R::store($new);

		return "register new user id: " . $id;
	}

}

?>