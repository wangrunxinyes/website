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

	public static function curl_ajax($url){
		// function doRequest($url, $param=array()){  
      
    $urlinfo = parse_url($url);  
      
    $host = $urlinfo['host'];  
    $path = $urlinfo['path'];  
    $query = isset($param)? http_build_query($param) : '';  
      
    $port = 80;  
    $errno = 0;  
    $errstr = '';  
    $timeout = 10;  
      
    $fp = fsockopen($host, $port, $errno, $errstr, $timeout);  
      
    $out = "POST ".$path." HTTP/1.1\r\n";  
    $out .= "host:".$host."\r\n";  
    $out .= "content-length:".strlen($query)."\r\n";  
    $out .= "content-type:application/x-www-form-urlencoded\r\n";  
    $out .= "connection:close\r\n\r\n";  
    $out .= $query;  
      
    fputs($fp, $out);  
    fclose($fp);  
// }  
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