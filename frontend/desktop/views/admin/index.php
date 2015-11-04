<?php

$par = Yii::app()->data->getValue("par");

if ($par != null) {
	switch ($par) {
	case 'test':
		echo "test success.";
		break;
	case 'init_img':
		$init = new SystemInit();
		$init->init_par("image_db");
		break;
	case 'init_all':
		$init = new SystemInit();
		$init->init();
		break;
	case 'log':
		include "subview/index.php";
		break;
	default:
		echo "unknown.";
		break;
	}
} else {
	echo '<h1>Function List</h1>';
	echo '<p><a href="' . Yii::app()->request->url . '/index/par/test">test</a></p>';
	echo '<p><a href="' . Yii::app()->request->url . '/index/par/init_all">init all data</a></p>';
	echo '<p><a href="' . Yii::app()->request->url . '/index/par/init_img">init image db</a></p>';
}

?>