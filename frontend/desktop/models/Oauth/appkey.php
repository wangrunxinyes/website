<?php
// 当前登录用户
$user_id = 1;

// 来自用户表单
$consumer = array(
    // 下面两项必填
    'requester_name'         => 'Fising',
    'requester_email'        => 'Fising@qq.com',

    // // 以下均为可选
    // 'callback_uri'           =&gt; 'http://www.demo.com/oauth_callback',
    // 'application_uri'        =&gt; 'http://www.demo.com/',
    // 'application_title'      =&gt; 'Online Printer',
    // 'application_descr'      =&gt; 'Online Print Your Photoes',
    // 'application_notes'      =&gt; 'Online Printer',
    // 'application_type'       =&gt; 'website',
    // 'application_commercial' =&gt; 0
);

include_once 'config.inc.php';
include_once 'oauth-php/library/OAuthStore.php';

// 注册消费方
$store = OAuthStore::instance('MySQL', $dbOptions);
$key   = $store->updateConsumer($consumer, $user_id);

// 获取消费方信息
$consumer = $store->getConsumer($key, $user_id);

// 消费方注册后得到的 App Key 和 App Secret
$consumer_id     = $consumer['id'];
$consumer_key    = $consumer['consumer_key'];
$consumer_secret = $consumer['consumer_secret'];

// 输出给消费方
echo 'Your App Key: ' . $consumer_key;
echo '</br>';
echo 'Your App Secret: ' . $consumer_secret;
?>