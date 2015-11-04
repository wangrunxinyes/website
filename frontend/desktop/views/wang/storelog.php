<?php
$type = Yii::app()->data->getValue('type');
$item = R::dispense("worklog");
$item->time = time();
$item->type = $type;
$id = R::store($item);
echo "签到成功";
?>