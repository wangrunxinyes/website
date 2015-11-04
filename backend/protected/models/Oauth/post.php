<?php

ini_set('display_errors',1);            //错误信息
ini_set('display_startup_errors',1);    //php启动错误信息
error_reporting(-1);                    //打印出所有的 错误信息

if(isset($_POST['test'])){
	echo "yes";
}else{
	echo "no";
}

?>