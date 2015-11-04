<?php

class WebUser extends CWebUser {

	private $wrx_user_model;
	private $wrx_db_uer;

	public function init() {

		parent::init();

		//renew the models;

		$this->wrx_user_model = new wrx_model_user();

		if ($this->wrx_user_model->create_from_session()) {

		} else {

			Logger::log("WebUser", "No user found");
		}

	}

	public function login($identity, $duration) {

		if (parent::login($identity, $duration)) {

			$this->wrx_user_model = $identity->getUserModel();

		}

	}

	public function getModel($key = null) {

		if (Yii::app()->user->isGuest) {

			return null;

		} else {
			if ($key == null) {
				return $this->wrx_user_model;
			} else {
				if ($this->wrx_user_model == null) {
					$this->wrx_user_model = new wrx_model_user();
					$this->wrx_user_model->create_from_session();
				}
				if ($this->wrx_user_model == null) {
					return null;
				}
				return $this->wrx_user_model->$key;
			}
		}
	}

	public function setModel($models) {

		$this->wrx_user_model = $models;

	}

	public function setSession() {

	}

	public function update() {
		$user = self::getDBuser(true);
		$this->setModel(wrx_model_user::create($user));
	}

	public function getDBuser($force) {
		if ($this->wrx_db_uer == null || $force) {
			$this->wrx_db_uer = R::findOne('main_user_general', "main_user_general_uname='" . self::getModel("wrx_username") . "'");
		}
		return $this->wrx_db_uer;
	}

	public function setDBuser($key, $value) {
		self::getDBuser(true);
		$this->wrx_db_uer->$key = $value;
		R::store($this->wrx_db_uer);
	}

}

?>



