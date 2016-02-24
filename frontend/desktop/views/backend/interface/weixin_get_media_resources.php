<?php
//weixin_get_media_resources
$images = new wrx_view_image_list();
$images->execute(1);
$images->echoFormat();

?>