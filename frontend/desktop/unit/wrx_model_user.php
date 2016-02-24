<?php

define("USER_TYPE_SERVER", "1");

define("USER_TYPE_CLIENT", "2");

define("USER_TYPE_ADMIN", "3");

define("USER_TYPE_CUSTOMER_SERVICE", "4");

define("USER_MAX_KEY_NUM", "3");

class wrx_model_user extends BasicUnit {

	function __construct() {

		$this->basic_attributes = array(

			'wrx_username',

			'wrx_photo',

			'wrx_password',

			'wrx_type',

			'wrx_level',

			'wrx_state',

			'wrx_last',

			'wrx_createtime',

			'wrx_weixin_json',

			'attributes',

		);

		$this->basic_data = array(

			'wrx_username' => 'init_database',

			'wrx_photo' => 'http://wx.qlogo.cn/mmopen/PiajxSqBRaEJKawKEtTuyDOtFiaREhPPoMUq3GlCPdDIJZSt5DIiatlibMrAeS4dZ62lN0r8INJnkaW8ohESNKvNMw/64',

			'wrx_password' => '57910fac9b0270812ff3c56028e6f4c2',

			'wrx_type' => USER_TYPE_ADMIN,

			'wrx_level' => '1',

			'wrx_state' => '0',

			'wrx_last' => time(),

			'wrx_createtime' => time(),

			'wrx_weixin_json' => json_encode(Array('wxeca0dc64dd540f5b')),

			'attributes' => json_encode(Array('init' => 'data')),

		);

		$this->basic_indentify = "wrx_user_db";

	}

	public static function create($user = null) {

		$obj = new self();

		if (!is_null($user)) {

			$obj->init($user);

		}

		return $obj;

	}

	public function init($user) {

		self::construct($user);

		self::create_session();

	}

	public function getUserByName($name) {

		$search = ' wrx_username = :wrx_username';

		$searchValue = array(

			':wrx_username' => $name,

		);

		$beans = BasicUnit::load_unit_by_attribute($this->basic_indentify, $search, $searchValue);

		if (count($beans) == 0) {

			return null;

		} else {

			$this->setValue($beans[0]);

		}

		$this->setPar("id", $beans[0]['id']);

		return $this->getValue('id');

	}

	public function construct($user) {

		foreach ($this->basic_attributes as $key) {

			$this->setPar($key, $user->getValue($key));

		}

	}

	public function store() {

		$this->store_unit();

	}

	public function init_for_weixin_user($user_id) {

		$user = new WeixinUserUnit();

		$user->getUserByUserName($user_id);

		if (is_null($user->getValue('id'))) {
			return false;
		} else {

			$this->basic_value = array(

				'id' => $user_id,

				'wrx_username' => $user->getValue('weixin_name'),

				'wrx_photo' => $user->getValue('weixin_photo'),

				'wrx_password' => 'null',

				'wrx_type' => $user->getValue('belong_id'),

				'wrx_level' => '0',

				'wrx_state' => '0',

				'wrx_last' => time(),

				'wrx_createtime' => time(),

				'wrx_weixin_json' => 'null',

				'attributes' => 'null',

			);

			self::create_session();
			return true;
		}

	}

}

?>