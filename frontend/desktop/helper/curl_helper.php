<?php

/**

 *

 */

class curl_helper {

	function __construct() {

	}

	public static function curl($url) {

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $url);

		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$output = curl_exec($ch);

		curl_close($ch);

		return $output;

		// return WeixinErrorMsg::check($output, $url);
	}

	public static function post($url, $data) {

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $url);

		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		curl_setopt($ch, CURLOPT_POST, 1);

		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

		$output = curl_exec($ch);

		curl_close($ch);

		return WeixinErrorMsg::check($output, $url, $data);
	}

}

class WeixinErrorMsg {

	function __construct() {
		# code...
	}

	public static function check($response, $url, $data = null) {
		$json = json_decode($response);
		if (isset($json->{'errcode'})) {
			Error::log("curl " . $url, "response->" . $response . ";\r\n data->" . print_r($data, true));

		}
		return $response;
	}
}

?>