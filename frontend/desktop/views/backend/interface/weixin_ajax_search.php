<?php

$type = Yii::app()->data->getValue('code');

if (is_null($type)) {
	$result = array(
		'code' => 1,
		'des' => 'type error',
	);
} else {
	$json = Yii::app()->data->getValue('json');
	$json = urldecode($json);
	$processer = new processer_ajax_search();
	$processer->build($type, $json);
	$result = $processer->getResult();
}

echo json_encode($result);

?>