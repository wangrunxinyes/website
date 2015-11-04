<?php
include_once 'config.inc.php';
include_once 'oauth-php/library/OAuthStore.php';
 
$store = OAuthStore::instance('MySQL', $dbOptions);
 
// 当前用户的ID, 必须为整数
$user_id = 1;
 
// 服务器描述信息
$server = array(
    'consumer_key'      => 'b806c42eedda78c6389aec1610d8f2ed055a71f4c',
    'consumer_secret'   => '380cc7c7cfb8d97158782362da8f0c2b',
    'server_uri'        => 'http://www.wangrunxin.com/',
    'signature_methods' => array('HMAC-SHA1', 'PLAINTEXT'),
    'request_token_uri' => 'http://www.tongchengchina.com/Oauth/request_token.php',
    'authorize_uri'     => 'http://www.tongchengchina.com/Oauth/authorize.php',
    'access_token_uri'  => 'http://www.tongchengchina.com/Oauth/access_token.php'
);
 
// 将服务器信息保存在 OAuthStore 中
$consumer_key = $store->updateServer($server, $user_id);
?>