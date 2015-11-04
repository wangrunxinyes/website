<?php
session_start();
$code = $_POST['code'];
if($code==$_SESSION["helloweba_math"]){
	   $name = $_POST['name'];
	   $name = urldecode($name);
	   if(isset($_POST['phone']))
	   {
	   	$phone = $_POST['phone'];
	   }else{
	   	$phone = "none";
	   }
	   $email = $_POST['email'];
	   $email = urldecode($email);
	   $message = $_POST['message'];
	   $message = urldecode($message);
       include "sendMessage.php";
    }else
	{
	 echo "false";
	}


?>
