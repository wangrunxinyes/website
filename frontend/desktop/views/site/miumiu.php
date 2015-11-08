<?php

$arr = array();
if(isset($_GET['miumiu'])){
	$state = 0;
	$result = "false";
	if(is_numeric($_GET['miumiu']))
	{
		$result = R::load("miumiu", $_GET['miumiu']);
		if (!is_null($result->id)) {
			$state = $result->state;
			$result = "true";
		}
		
	}
	$arr = array(
		"result"=>$result,
		"data"=>$state,
		"received"=>$_GET['miumiu'],
		);
}else{
	$arr = array(
		"result"=>"false",
		"data"=>"null",
		);
}

echo json_encode($arr);

?>