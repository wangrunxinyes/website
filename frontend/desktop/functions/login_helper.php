<?php

class login_helper extends BasicData {

	const NO_ERROR = 1;

	const MISS_PARAMETER = 2;

	const NO_SUCH_USER = 3;

	const PASSWORD_ERROR = 4;

	const CODE_ERROR = 5;

	const USER_HAS_BEEN_LOCKED = 6;

	const PASSWORD_ERROR_NEED_CODE = 7;

	const SESSION_ERROR = 8;

	const LOGIN_SYSTEM_ERROR = 9;

	const OAUTH = 10;

	private $db_user;

	private $need_code;

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

		);

		$this->db_array = array(

			'0' => 'main_user_general_uname',

			'1' => 'main_user_general_psw',

		);

		$this->need_code = false;

	}

	//check parameters;

	public function check() {

		if (!self::checkMust()) {

			return self::MISS_PARAMETER;

		}

		if (!self::getUser()) {

			return self::NO_SUCH_USER;

		}

		if (!self::checkUserLocked()) {

			return self::USER_HAS_BEEN_LOCKED;

		}

		if (!self::checkCode()) {

			return self::CODE_ERROR;

		}

		if (!self::checkAjaxLogin()) {

			return self::SESSION_ERROR;

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

	public function getUser() {

		$user = new wrx_model_user();
		$user->getUserByName($this->value_array['username']);

		if (!is_null($user->getValue('id'))) {

			$this->db_user = $user;

			return true;

		} else {

			return false;

		}

	}

	public function checkUserLocked() {

		if ($this->db_user->getValue('wrx_state') > 5) {

			return false;

		} else {

			return true;

		}

	}

	public function checkCode() {

		if ($this->db_user->getValue('wrx_state') > 3 && $this->db_user->getValue('wrx_state') <= 5) {

			if (Yii::app()->data->getValue("code") != null && Yii::app()->data->getValue("code") == Yii::app()->session['main_user_login_code']) {

				$this->need_code = true;

				return true;

			} else {

				return false;

			}

		} else {

			return true;

		}

	}

	public function checkAjaxLogin() {

		if (Yii::app()->request->getIsAjaxRequest()) {

			if (Yii::app()->data->getValue("session") == null) {

				return false;

			} else {

				$sessionId = Yii::app()->data->getValue("session");

				if (session_id() != "") {

					session_unset();

					session_destroy();

				}

				session_id($sessionId);

				session_start();

				return true;

			}

		} else {

			return true;

		}

	}

	public function login() {

		$model = new LoginForm;

		$model->username = $this->value_array['username'];

		$model->password = $this->value_array['password'];

		$model->userModel = $this->db_user;

		if ($model->login()) {

			if (Yii::app()->user->isGuest) {

				return self::LOGIN_SYSTEM_ERROR;

			} else {

				$this->db_user->setPar('wrx_state', 0);

				$this->db_user->store();

				return self::NO_ERROR;

			}

		} else {

			if ($this->need_code) {

				$this->db_user->setPar('wrx_state', $this->db_user->getValue('wrx_state') + 1);

				$this->db_user->store();

				return self::PASSWORD_ERROR_NEED_CODE;

			} else {

				$this->db_user->setPar('wrx_state', $this->db_user->getValue('wrx_state') + 1);

				$this->db_user->store();

				return self::PASSWORD_ERROR;

			}

		}

	}

	public function getUserAttributes() {

		return $this->db_user;

	}

}

?>