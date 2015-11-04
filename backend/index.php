<?php
// change the following paths if necessary
if (session_id() == "") {
	session_start();
}

//include db;
$redBean = dirname(__FILE__) . '/../assets/rb.php';
require_once $redBean;
R::setup('mysql:host=localhost;dbname=wangrunxin', 'wangrunxin', 'wrx52691000');

//include yii;
$yii = dirname(__FILE__) . '/../framework/yii.php';
defined('YII_DEBUG') or define('YII_DEBUG', true);
require_once $yii;

$config = dirname(__FILE__) . '/protected/config/main.php';

//start service;
Yii::createWebApplication($config)->run();

/**
 * handle all request;
 */

?>