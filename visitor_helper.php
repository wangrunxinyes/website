<?php

/**
 * WRX Script;
 */

class visitor_helper {

	function __construct() {
		date_default_timezone_set("PRC");
		header('Content-Type: text/html; charset=utf-8');
	}

	public static function store_visitor() {

	}

	public static function is_moble() {

		$mobile_browser = '0';

		if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
			$mobile_browser++;
		}
		if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']), 'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
			$mobile_browser++;
		}
		$mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
		$mobile_agents = array(
			'w3c ', 'acs-', 'alav', 'alca', 'amoi', 'audi', 'avan', 'benq', 'bird', 'blac',
			'blaz', 'brew', 'cell', 'cldc', 'cmd-', 'dang', 'doco', 'eric', 'hipt', 'inno',
			'ipaq', 'java', 'jigs', 'kddi', 'keji', 'leno', 'lg-c', 'lg-d', 'lg-g', 'lge-',
			'maui', 'maxo', 'midp', 'mits', 'mmef', 'mobi', 'mot-', 'moto', 'mwbp', 'nec-',
			'newt', 'noki', 'oper', 'palm', 'pana', 'pant', 'phil', 'play', 'port', 'prox',
			'qwap', 'sage', 'sams', 'sany', 'sch-', 'sec-', 'send', 'seri', 'sgh-', 'shar',
			'sie-', 'siem', 'smal', 'smar', 'sony', 'sph-', 'symb', 't-mo', 'teli', 'tim-',
			'tosh', 'tsm-', 'upg1', 'upsi', 'vk-v', 'voda', 'wap-', 'wapa', 'wapi', 'wapp',
			'wapr', 'webc', 'winw', 'winw', 'xda', 'xda-', 'Googlebot-Mobile');

		if (in_array($mobile_ua, $mobile_agents)) {
			$mobile_browser++;
		}

		if (isset($_SERVER['ALL_HTTP'])) {
			if (strpos(strtolower($_SERVER['ALL_HTTP']), 'OperaMini') > 0) {
				$mobile_browser++;
			}
		}

		if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'windows') > 0) {
			$mobile_browser = 0;
		}

		if ($mobile_browser > 0) {
			return true;
			//header("Location: mobile.php");
		} else {
			return false;
			//header("Location: pc.php");
		}
	}

	function get_ip() {
		$iipp = $_SERVER["REMOTE_ADDR"];
		if ($iipp == null || $iipp = "" || count($iipp) < 2) {
			$iipp = "0.0.0.0";
		}
		return $iipp;
	}

	function get_ip_info() {

	}
}

// include 'chk_browser.php';

// $con = mysqli_connect("localhost", "wangrunxin", "wangrunxinyes") or die("can't connect the server");
// If (!$con) {
// 	//die output a message and terminate the current script
// 	die('Could not connect: ' . mysqli_connect_errno());
// }
// mysqli_select_db($con, 'sqlwangrunxin') or
// die('Could not select database.');

// if (!isset($vip)) {
// 	$vip = 0;
// }

// //control ip;
// $iipp = $_SERVER["REMOTE_ADDR"];
// include 'php/ip.info.php';
// $ip = (new ip_info);
// $resultData = $ip->getInfoByIpViaSina($iipp);
// $area = $resultData['area'];
// $city = $resultData['city'];

// mysqli_query($con, 'set names utf8');
// $query = "Insert into website_visitor(visitor_ip,visitor_lastdate,visitor_agent,visitor_os,visitor_vip,visitor_area,visitor_city) values('"
// . mysqli_real_escape_string($con, $iipp) . "','"
// . time() . "','" . $type . "','" .
// $browserType . "','" .
// $vip . "','" .
// $area . "','" .
// $city . "')";

// $result = mysqli_query($con, $query) or die('Exception report: Ref.5L+d5a2Y6K6/5a6i6K6w5b2V5aSx6LSl.<input type="hidden" value="' . $query . '">');

// $query = "select notice_details, notice_group, notice_state from website_notice where notice_state = 1";
// $result = mysqli_query($con, $query) or die('Exception report: Ref.6K+75Y+W5YWs5ZGK5aSx6LSl.');

// $showMessage = 0;
// while ($row = mysqli_fetch_array($result)) {
// 	$MessageData = $row[0];
// 	$showMessage = $row[1];
// }

// mysqli_free_result($result);
// mysqli_close($con);
?>