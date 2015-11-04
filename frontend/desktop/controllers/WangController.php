<?php

class WangController extends Controller {

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
		$this->layout = "clean";
		$this->render('index');
	}

	public function actionTest() {
		$this->layout = "clean";
		$this->render('test');
	}

	public function actionFramework() {
		$type = Yii::app()->data->getValue("type", "project");
		$this->pageTitle = $type;
		$this->layout = "framework";
		$this->render('framework');
	}

	public function actionError() {
		if ($error = Yii::app()->errorHandler->error) {
			if (Yii::app()->request->isAjaxRequest) {
				echo json_encode($error);
			} else {
				$this->layout = "clean";
				$this->render('error', $error);
			}
		}
	}

	public function actionLogin() {
		$this->layout = "clean";
		$this->render('login');
	}

	public function actionLog() {
		$this->layout = "clean";
		$this->render('dailylog');
	}

	public function actionStore() {
		$this->layout = "clean";
		$this->render('storelog');
	}

	public function actionShow() {
		$this->layout = "clean";
		$this->render('showLog');
	}

}

?>