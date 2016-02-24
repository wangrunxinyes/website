<?php

class weixin_save_product {

	private $product;

	function __construct() {
		$this->product = new wrx_model_product();
	}

	function create() {
		$receive = array(
			'pid' => null,
			'p_main_bg' => "wrx_none_data",
			'weixin_sub_img_a' => "wrx_none_data",
			'p_id' => "wrx_none_data",
			'p_name' => "wrx_none_data",
			'p_type' => "wrx_none_data",
			'p_introduction' => "wrx_none_data",
			'p_details' => "wrx_none_data",
			'p_img' => "wrx_none_data",
			'p_view_type' => "wrx_none_data",
			'p_price' => "wrx_none_data",
			'p_off_details' => "wrx_none_data",
			'p_off_trigger' => "wrx_none_data",
			'p_off_price' => "wrx_none_data",
			'p_html' => "wrx_none_data",
		);

		foreach ($receive as $key => $value) {
			$receive[$key] = Yii::app()->data->getValue($key);
		}

		$json = json_encode($receive);
		return $json;
	}

	function execute() {
		$json = self::create();
		if (self::handle_json($json)) {
			if (self::build_unit($json)) {

				self::save_unit();
			}
		}

		$result = self::create_result();
		echo $result;
	}

	function handle_json($json) {
		if ($json == null) {
			return false;
		} else {
			return true;
		}
	}

	function build_unit($json) {
		$json = json_decode($json);

		$data = array(
			'p_id' => str_replace("%09", "", trim(self::getJson($json, 'p_id'))),

			'p_type' => self::getJson($json, 'p_type'),

			'p_name' => self::getJson($json, 'p_name'),

			'p_des' => self::getJson($json, 'p_introduction'),

			'p_photo' => self::getJson($json, 'weixin_sub_img_a'),

			'p_bg' => self::getJson($json, 'p_main_bg'),

			'p_details' => self::getJson($json, 'p_details'),

			'p_image' => self::getJson($json, 'p_img'),

			'p_activity' => self::getJson($json, 'p_off_details'),

			'p_price' => self::getJson($json, 'p_price'),

			'p_off_price' => self::getJson($json, 'p_off_price'),

			'p_trigger_off_price' => self::getJson($json, 'p_off_trigger'),

			'p_time' => time(),

			'p_show_type' => self::getJson($json, 'p_view_type'),

			'p_custom_html' => self::getJson($json, 'p_html'),

			'p_attributes' => "wrx_none_data",

		);

		if (!is_null(self::getJson($json, 'pid'))) {
			$this->product->setPar('id', self::getJson($json, 'pid'));
		}

		try {
			$this->product->setValue($data);
		} catch (Expection $e) {
			print_r($e);
		}

		return true;
	}

	function getJson($json, $key) {
		if (isset($json->{$key})) {
			return $json->{$key};
		} else {
			return null;
		}
	}

	function save_unit() {
		$this->product->setPar('p_belong', Yii::app()->weixin->getWeixin('weixin_app_key'));
		$this->product->store_unit();
		return true;
	}

	function create_result() {
		if ($this->product->getValue('id') == null) {
			return -1;
		} else {
			return trim($this->product->getValue('id'));
		}
	}
}

$process = new weixin_save_product();
$process->execute();

?>