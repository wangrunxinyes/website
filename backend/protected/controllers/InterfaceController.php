<?php

class InterfaceConroller extends Controller {

	public $layout = 'clean';

	public function actionLogin() {
		$this->layout = "clean";
		$this->render('user_login_desktop_api');
	}

	public function actionTest() {
		echo "test";
	}

}

?>