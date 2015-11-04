<?php
if(isset($_GET['key']) && isset($_GET['req']) && ($_GET['req'] == 1)){
	include_once 'config.inc.php';
	include_once 'oauth-php/library/OAuthStore.php';
	include_once 'oauth-php/library/OAuthRequester.php';

	$store = OAuthStore::instance('MySQL', $dbOptions);

	// 用户Id, 必须为整型
	$user_id = 1;

	// 消费者key
	$consumer_key = $_GET['key'];

	// 从服务器获取未授权的token
	try{
		$token = OAuthRequester::requestRequestToken($consumer_key, $user_id);
		header('Location: ' . $token['authorize_uri']."?oauth_token=".$token['token']."&oauth_consumer_key=".$consumer_key);
		//echo "<a href='".$token['authorize_uri']."?oauth_token=".$token['token']."&oauth_consumer_key=".$consumer_key."'>test</a>";
	}catch(Exception $e)
	{
		print_r($e);
	}
	
	
}
else{
?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>测试页面</title>
	</head>

	<body>
	<p>点击下面的按钮开始测试</p>
	<input type="button" name="button" value="Click Me(local)" id="RequestBtn"/>
	<input type="button" name="button" value="Click Me(server)" id="RequestBtn1"/>
	<script type="text/javascript">
	document.getElementById('RequestBtn').onclick = function(){
		window.location = 'app.php?req=1&key=d4c834655fe41c7c38a677ad93940307055a60bfd';
	}

	document.getElementById('RequestBtn1').onclick = function(){
		window.location = 'app.php?req=1&key=b806c42eedda78c6389aec1610d8f2ed055a71f4c';
	}
	</script>
	</body>
	</html>
<?php
}
?>