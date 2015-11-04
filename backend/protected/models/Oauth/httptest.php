<?php


ini_set('display_errors',1);            //错误信息
ini_set('display_startup_errors',1);    //php启动错误信息
error_reporting(-1);                    //打印出所有的 错误信息

include("HttpHelper.php");
$http = new HttpHelper();

$dataarray = array();
$dataarray['test'] = "yes";
echo $http->postDataToURL($dataarray,null, "http://www.tongchengchina.com/Oauth/post.php");

?>