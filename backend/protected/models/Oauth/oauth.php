<?php

include_once 'config.inc.php';
include_once 'oauth-php/library/OAuthStore.php';
include_once 'oauth-php/library/OAuthServer.php';

$token = $_GET['oauth_token'];

// //only key
// $consumer_secret = $_GET['consumer_secret'];
// $oauth_consumer_key = $_GET['oauth_consumer_key'];

$consumer_secret = "39e70a4040bc14849f1c1ab6506f6a51";
$oauth_consumer_key = "d4c834655fe41c7c38a677ad93940307055a60bfd";

$key = md5($oauth_consumer_key.$consumer_secret.$token);

try
	{
		$store = OAuthStore::instance('MySQL', $dbOptions); 
        $server = new OAuthServer();
		$server->setParam("accessToken", $token);
		$server->setParam("consumer_secret", $key);
		$server->identify_accessToken();
	}
	catch (OAuthException2 $e)
	{
		header('HTTP/1.1 400 Bad Request');
		header('Content-Type: text/plain');
		
		echo "Failed OAuth Request: " . $e->getMessage();
	}
	exit;

?>