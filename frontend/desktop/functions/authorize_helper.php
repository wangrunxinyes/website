<?php

class authorize_helper {

	const GENERAL_ACCESS = 0;
	const GENERATE_OAUTH_KEYS = 1;
	const GET_OAUTH_KEYS = 2;
	const GENERATE_TOKEN = 3;

	public function create() {
		$obj = new self();
		$obj->init();
		return $obj;
	}

	public function init() {
	}

	public function check($type) {
		switch ($type) {
		case self::GENERAL_ACCESS:
			$result = self::general_access();
			break;
		case self::GENERATE_OAUTH_KEYS:
			$result = self::generate_oauth_keys_access();
			break;
		case self::GET_OAUTH_KEYS:
			$result = self::get_oauth_keys_access();
			break;
		case self::GENERATE_TOKEN:
			$result = self::generate_token_access();
			break;
		default:
			break;
		}
		return $result;
	}

	public function general_access() {
		return Yii::app()->user->isGuest ? false : true;
	}

	public function generate_oauth_keys_access() {
		if (self::general_access()) {
			if (Yii::app()->user->getModel("wrx_type") == "1") {
				if (Yii::app()->user->getModel("wrx_apps_key_num") >= 1) {
					return false;
				} else {
					return true;
				}
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	public function get_oauth_keys_access() {
		if (self::general_access()) {
			if (Yii::app()->user->getModel("wrx_type") == "1") {
				if (Yii::app()->user->getModel("wrx_apps_key_num") == 1) {
					return true;
				} else {
					Logger::log("get_keys", "false");
					return false;
				}
			} else {
				Logger::log("server_type", "false");
				return false;
			}
		} else {
			Logger::log("general_access", "false");
			return false;
		}
	}

	public function generate_token_access() {
		if (self::general_access()) {

			Logger::log("OAUTH", "OAUTH-generate_token_access" . " Pass Access Check");
			if (Yii::app()->user->getModel("wrx_type") == "1") {

				Logger::log("OAUTH", "OAUTH-server_type" . " Pass Access Check");
				if (Yii::app()->user->getModel("wrx_apps_key_num") == 1) {

					Logger::log("OAUTH", "OAUTH-keys_number" . " Pass Access Check");
					return true;
				} else {
					return false;
				}
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	public function checkOauthAccess() {
		$accesstoken = Yii::app()->data->getValue("accesstoken");
		$key = md5($accesstoken . Yii::app()->oauth->getKeys("secret"));
		if (Yii::app()->oauth->responseAccess($accesstoken, $key)) {
			return true;
		} else {
			return false;
		}
	}
}

?>