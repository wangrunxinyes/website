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
			if($state == "1" || $state == 1){
				$result->state = 0;
				R::store($result);
			}
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