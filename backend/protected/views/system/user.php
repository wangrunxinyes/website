<?php

if (Yii::app()->user->isGuest) {
	//print_r(Yii::app()->user);
	echo Yii::app()->getSession()->SessionId . "</br>";
	print_r(Yii::app()->session['wrx_user_type']);
} else {
	print_r(Yii::app()->user->getModel);
}

?>