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

	public function actionPoi() {
		$this->layout = "clean";
		$this->render('poi');
	}

	public function actionIndex() {
		$this->layout = "clean";
		$this->render('test');
	}

	public function actionSearch() {
		$this->layout = "clean";
		$this->render('search');
	}

	public function actionTest() {
		$this->layout = "clean";
		$this->render('index');
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

	public function actionGetCode() {
		$data = array();
		$continue = true;
		while ($continue) {
			$number = rand(1, 45);
			if (!in_array($number, $data)) {
				array_push($data, $number);
			}
			if (count($data) == 6) {
				$continue = false;
			}
		}
		sort($data);
		print_r($data);
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