<?php

class token_helper extends BasicData {

	const NO_ERROR = 0;
	const MISS_PARAMETER = 1;
	const UNKNOWN_ERROR = 2;

	private $token;
	private $custom_key;
	private $custom_secret;

	public static function create() {

		$obj = new self();

		$obj->init();

		return $obj;

	}

	public function init() {

		parent::init();

		//init parameters;

		$this->need_var_array = array(

			//'0' => 'custom_key',

			//'1' => 'encrypt_value',

		);

		$data = Yii::app()->oauth->getKeys();
		if ($data != null) {
			$this->custom_key = $data['key'];
			$this->custom_secret = $data['secret'];
		} else {
			$this->custom_key = null;
			$this->custom_secret = null;
		}

		$this->token = "empty";
	}

	public function check() {

		if (!self::checkMust()) {
			return self::MISS_PARAMETER;
		}
	}

	public function checkMust() {
		if (Yii::app()->data->checkList($this->need_var_array, $this)) {

			return true;

		} else {

			return false;

		}
	}

	public function generateToken() {

		Yii::app()->oauth->generateKey();

		$data = Yii::app()->oauth->generateUnauthorizedToken($this->custom_key);
		if (isset($data['token'])) {
			$this->token = Yii::app()->oauth->authorizedServer($data['token']);
			return true;
		} else {
			return false;
		}
	}

	public function getToken() {
		return $this->token;
	}
}

?>