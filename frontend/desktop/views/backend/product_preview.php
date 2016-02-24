<?php

$view = new wrx_view_product();
$result = $view->create_view();
if (!$result) {
	$this->redirect(array('/backend/deny'));
}

?>