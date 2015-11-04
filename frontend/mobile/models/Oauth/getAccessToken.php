<?php
header( 'Content-Type:text/html;charset=utf-8 ');
session_start();

if (empty($_SESSION['authorized']))
{
	$uri = $_SERVER['REQUEST_URI'];
	header('Location: /wrx/oauth/login.php?goto=' . urlencode($uri));
    exit();
}

include_once 'config.inc.php';
include_once 'oauth-php/library/OAuthStore.php';
include_once 'oauth-php/library/OAuthServer.php';

//登陆用户
$user_id = 1;

try
{
	$store = OAuthStore::instance('MySQL', $dbOptions); 
    $server = new OAuthServer();
    $server->accessToken();
}
catch (OAuthException $e)
{
    // 请求中没有包含token, 显示一个使用户可以输入token以进行验证的页面
    // ** 你的代码 **
}
?>