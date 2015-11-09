<?php

$data = "false";
if(isset($_GET['miumiu'])){
	if(is_numeric($_GET['miumiu'])){
		$result = R::load("miumiu", $_GET['miumiu']);
		if (!is_null($result->id)) {
			$result->state = 1;
			$id = R::store($result);
			$data = "success, id: ".$id;
		}
	}
}

echo $data;

?>