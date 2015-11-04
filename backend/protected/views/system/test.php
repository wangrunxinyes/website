<?php

// $system = new SystemInit();

// $system->init();

// exit;

$model = new LoginForm;

$model->username = "wangrunxin.com";

$model->password = md5("wrx52sby");

$user = R::findOne('main_user_general', "main_user_general_uname='" . "wangrunxin.com" . "'");

$model->userModel = $user;

$model->login();

if (Yii::app()->user->isGuest) {

	echo "login failed</br>";

} else {

	echo "<a href='http://www.tongchengchina.com'>success, click me.</a></br>";

}

echo Yii::app()->authorize->check(authorize_helper::GENERATE_OAUTH_KEYS) ? "YES" : "NO";

echo "</br>";

print_r(Yii::app()->user->getModel());

echo "</br>";

print_r($_SESSION);

echo "</br>";

print_r(Yii::app()->user->getModel("wrx_username"));

echo "</br>";

print_r(Yii::app()->oauth->generateKey());

echo "</br>";

echo Yii::app()->authorize->check(authorize_helper::GENERATE_TOKEN) ? "YES" : "NO";

echo "</br>";

print_r(Yii::app()->oauth->generateUnauthorizedToken("9df61ebdd96006eec3dfb58885638bc5055bf12b3"));

$data = Yii::app()->oauth->generateUnauthorizedToken("9df61ebdd96006eec3dfb58885638bc5055bf12b3");

echo "</br>";

print_r(Yii::app()->oauth->authorizedServer($data['token']));

// if(Yii::app()->user->isGuest)

// {

// 	$model=new LoginForm;

// $model->username = "wangrunxin.com";

// $model->password = md5("wrx52sby");

// $model->login();

// if(Yii::app()->user->isGuest){

// 	echo "test failed";

// }else{

// 	echo "<a href='http://www.tongchengchina.com'>success, click me.</a>";

// }

// }else{

// 	echo "<a href='http://www.tongchengchina.com'>success, click me.</a>";

// 	// print_r(Yii::app()->user->getModel());

// }

// $init = new SystemInit();

// $init->initIm();

// if($model->validate() && $model->login()){

// 	echo "yes";

// }else{

//     if($model->login())

//     {

//         echo "login yes";

//     }elseif($model->validate())

//     {

//         echo "validate yes";

//     }else{

// 		echo "error";

// 	}

// }

//     echo "</br>User:</br>";

//     print_r(Yii::app()->user);

//     echo "</br>";

//     if(Yii::app()->user->isGuest)

//     {

//         echo "guest";

//     }else{

//        print_r(Yii::app()->user->getName());

//        //print_r(Yii::app()->user->getType());

//     }

//     //Yii::app()->user->logout();

// $post = R::load( 'main_user_general', "1" );   //Retrieve

// $test = json_encode( R::exportAll( $post ) );

// print_r($test);

//R::trash( $post );                //Delete

?>