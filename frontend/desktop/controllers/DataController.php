<?php

class DataController extends Controller {

	public $layout = 'clean';

	public function actions() {

		return array(

			// captcha action renders the CAPTCHA image displayed on the contact page

			'captcha' => array(

				'class' => 'CCaptchaAction',

				'backColor' => 0xFFFFFF,

			),

			// page action renders "static" pages stored under 'protected/views/site/pages'

			// They can be accessed via: index.php?r=site/page&view=FileName

			'page' => array(

				'class' => 'CViewAction',

			),

		);

	}

	public function actionIndex() {

		$this->layout = "frame";

		$this->render('index');

	}

	public function actionLogin() {

		$this->layout = "clean";

		$this->render('user_login_desktop_api');

	}

	public function actionTest() {

		echo "test";

	}

	public function actionCode() {

		$this->render("user_login_code_api");

	}

	public function actionUpload() {
		$this->render("user_upload_api");
	}

}

?>