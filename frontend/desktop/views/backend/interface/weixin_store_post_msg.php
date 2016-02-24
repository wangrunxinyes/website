<?php
$data = Yii::app()->data->getValue('json');
$helper = new weixin_post_msg_helper();
$list = $helper->handleJson(json_decode($data));
echo json_encode($list);
?>