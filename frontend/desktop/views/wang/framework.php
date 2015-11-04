<?php
$type = Yii::app()->data->getValue("type", "project");
echo '<input type="hidden" value="' . $type . '">';

switch ($type) {
case 'project':
	include "subview/project.php";
	break;
case 'gallery':
	include "subview/gallery.php";
	break;
case 'about':
	include "subview/info.php";
	break;
case 'contact':
	include "subview/contact.php";
	break;
default:
	include "subview/empty.php";
	break;
}

?>