<?php

session_start();

if(isset($_GET['goto']))
{
	if(isset($_SESSION["authorized"]))
	{
		echo "<a href='".$_GET['goto']."'>you have login.</a>";
	}else{
		
	$_SESSION["authorized"]="admin";
	header('Location: ' . $_Get['goto']);
	exit();
	}
	
}else{
	echo "no";
}
	

?>