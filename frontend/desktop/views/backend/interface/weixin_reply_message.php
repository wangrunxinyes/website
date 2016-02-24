<?php

$id = Yii::app()->data->getValue('data');
$content = Yii::app()->data->getValue('reply');
$reply = new weixin_message_reply_helper();
echo $reply->sendMsg($id, $content);

?>