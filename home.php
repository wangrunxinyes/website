<!DOCTYPE html>
<html lang="en">
	<!--<![endif]-->
	<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8"></head>
<body>
	<?php
date_default_timezone_set("PRC");

// $url = urlencode("http://www.tongchengchina.com/support/producttype/type/d");
// echo 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxeca0dc64dd540f5b&redirect_uri=' .
// 	$url . '&response_type=code&scope=snsapi_base&state=1#wechat_redirect
// ';
echo "订票时刻表<br>
	<br>
	2/5 - 2/14 春节
	<br>
	<br>
	";

$data = "2016-02-05 09:00:00";
// $data = "2015-12-27 09:00:00";
$time = strtotime($data);
echo date("Y/m/d", $time) . "的车票【深圳至上海】
	<br>
	";
$start = $time - 29 * 3600 * 24;
echo date("Y/m/d H:i:s", $start) . "开始卖
	<br>
	<br>
	";

$data = "2016-02-10 14:30:00";
// $data = "2015-12-11 09:00:00";
$time = strtotime($data);
echo date("Y/m/d", $time) . "的车票【上海至南阳】
	<br>
	";
$start = $time - 59 * 3600 * 24;
echo date("Y/m/d H:i:s", $start) . "开始卖
	<br>
	<br>
	";

$data = "2016-02-14 15:00:00";
// $data = "2015-12-11 15:00:00";
$time = strtotime($data);
echo date("Y/m/d", $time) . "的车票【信阳至深圳】
	<br>
	";
$start = $time - 59 * 3600 * 24;
echo date("Y/m/d H:i:s", $start) . "开始卖
	<br><br>
	";

echo "3/25 - 3/28 复活节
	<br>
	<br>
	";

$data = "2016-03-25 09:00:00";
// $data = "2016-01-01 15:00:00";
$time = strtotime($data);
echo date("Y/m/d", $time) . "的车票【深圳至桂林】
	<br>
	";
$start = $time - 59 * 3600 * 24;
echo date("Y/m/d H:i:s", $start) . "开始卖
	<br><br>
	";

$data = "2016-03-28 17:00:00";
// $data = "2016-01-01 17:00:00";
$time = strtotime($data);
echo date("Y/m/d", $time) . "的车票【桂林至深圳】
	<br>
	";
$start = $time - 59 * 3600 * 24;
echo date("Y/m/d H:i:s", $start) . "开始卖
	<br><br>
	";
?>





</body>
</html>