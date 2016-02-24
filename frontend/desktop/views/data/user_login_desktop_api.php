<?php

class user_login_desktop_api extends BasicApi {

	public static function create() {

		$obj = new self();

		$obj->data = array(

			"api_key" => "general_login",

			"ps" => "See Description",

		);

		$obj->init();

		return $obj;

	}

	public function init() {

		parent::init();

	}

	public function exec() {

		$login = login_helper::create();

		$code = $login->check();

		$oauth = false;

		switch ($code) {

		case login_helper::NO_ERROR:

			$result = $login->login();

			break;

		case login_helper::OAUTH:

			$result = $login->login();

			$oauth = true;

			break;

		case login_helper::MISS_PARAMETER:

			self::print_error($code, "登陆失败，用户名或密码不正确");

			break;

		case login_helper::NO_SUCH_USER:

			self::print_error($code, "登陆失败，用户名或密码不正确");

			break;

		case login_helper::CODE_ERROR:

			self::print_error($code, "请填写正确的验证码");

			break;

		case login_helper::USER_HAS_BEEN_LOCKED:

			self::print_error($code, "登陆失败，此用户已被禁止登陆");

			break;

		case login_helper::SESSION_ERROR:

			self::print_error($code, "登陆失败，系统参数错误");

			break;

		default:

			self::print_error($code, "登陆失败，未知错误");

			break;

		}

		//handle login result;

		switch ($result) {

		case login_helper::NO_ERROR:

			if ($oauth) {

				$result = $login->authorize();

			} else {

				self::print_result($result, $login->getUserAttributes());

			}

			break;

		case login_helper::PASSWORD_ERROR_NEED_CODE:

			self::print_error($result, "登陆失败，用户名或密码不正确");

			break;

		case login_helper::PASSWORD_ERROR:

			self::print_error($result, "登陆失败，用户名或密码不正确");

			break;

		case login_helper::LOGIN_SYSTEM_ERROR:

			self::print_error($result, "登陆失败，系统错误");

			break;

		default:

			self::print_error($result, "登陆失败，未知错误");

			break;

		}

		//handle oauth

		switch ($result) {

		case login_helper::OAUTH_SUCCESS:

			self::print_result($result, $login->getToken());

			break;

		default:

			self::print_result($result, $login->getToken());

			break;

		}

	}

}

$execute = user_login_desktop_api::create();

$execute->exec();

?>