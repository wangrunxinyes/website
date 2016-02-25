<?php

class BackendController extends Controller {

	public $layout = "admin_frame";

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

	public function check() {

		if (Yii::app()->user->isGuest) {

			$this->redirect(array('/backend/login'));

			// } elseif (!Yii::app()->weixin->checkWeixin()) {

			// 	$this->redirect(array('/backend/account'));

		} elseif (!AccessController::check()) {

			$this->redirect(array('/backend/permission'));

		}

	}

	public function s_check() {
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('/backend/login'));
		} elseif (!AccessController::check()) {
			$this->redirect(array('/backend/permission'));
		}
	}

	public function actionIndex() {

		self::check();

		$this->layout = "admin_frame";

		$this->render('index');

	}

	public function actionAccount() {

		$this->layout = 'clean';

		if (Yii::app()->data->getValue('type') != null) {

			Yii::app()->weixin->reBuild(Yii::app()->data->getValue('type'));

			$this->redirect(array('/backend/logincheck'));

		} elseif (Yii::app()->data->getValue('edit') != null) {

			switch (Yii::app()->data->getValue('edit')) {

			case '1':

				$this->layout = "admin_single_frame";

				$this->render('weixin_add_account');

				break;

			case '2':

				$this->layout = "admin_single_frame";

				$this->render('weixin_add_account');

				break;

			default:

				$this->layout = "admin_single_frame";

				$this->render('weixin_choice');

				break;

			}

		} else {

			$this->layout = "admin_single_frame";

			$this->render('weixin_choice');

		}

	}

	public function actionProductpreview() {
		self::check();
		$this->layout = "clean";
		$this->render('product_preview');
	}

	public function actionAccountsetup() {
		self::s_check();
		$this->layout = "admin_single_frame";
		$this->render('setup');
	}

	public function actionLogincheck() {
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('/backend/login'));
		} elseif (!Yii::app()->weixin->checkWeixin()) {
			$this->layout = "clean";
			$this->render('fail');
		} elseif (!AccessController::check()) {
			$this->redirect(array('/backend/permission'));
		} else {
			$this->redirect(array('/backend'));
		}
	}

	public function actionEditproduct() {
		$this->render('wrx_motify_product');
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

	public function actionDeny() {
		self::check();
		$this->layout = "clean";
		$this->render('deny');

	}

	public function actionSubview() {

		$this->layout = "subview";
		$type = Yii::app()->data->getValue('type');
		$this->render($type);

	}

	public function actionLogin() {

		$this->layout = "clean";

		if (Yii::app()->user->isGuest) {

			$this->render('login');

		} else {

			$this->redirect(array('/backend'));

		}

	}

	public function actionLogout() {

		$this->layout = "clean";

		Yii::app()->session->clear();

		if (!Yii::app()->user->isGuest) {

			Yii::app()->user->logout();

		}

		$this->redirect(array('login'));

	}

	public function actionAjax() {

		$this->layout = "clean";

		$this->render('ajax');

	}

	public function actionMenu() {

		self::check();

		$this->render('weixin_menu');

	}

	public function actionFans() {

		self::check();

		$this->render('weixin_fans_list');

	}

	public function actionVips() {

		self::check();

		$this->render('profile_visitor_list');

	}

	public function actionMessagelist() {

		self::check();
		$this->render('weixin_message_list');

	}

	public function actionAbout() {

		self::check();

		$this->render('about');

	}

	public function actionAboutus() {

		$this->layout = "admin_single_frame";

		$this->render('about');

	}

	public function actionPermission() {

		$this->layout = "clean";

		$this->render('permission');

	}

	public function actionPostmsg() {

		self::check();

		$this->render('weixin_post_message');

	}

	public function actionEditaccount() {

		self::check();

		$this->render('weixin_system_basic');

	}

	public function actionUpload() {

		self::check();

		$this->layout = "clean";

		$this->render('receive');

	}

	public function actionPostmsglist() {

		self::check();

		$this->render('weixin_post_msg_list');

	}

	public function actionExport() {
		self::check();
		$this->layout = "subview";
		$this->render('weixin_export_files');
	}

	public function actionBackup() {
		self::check();
		$this->render('wrx_system_backup');
	}

	public function actionCreateproduct() {
		//self::check();
		$this->render('wrx_edit_product');
	}

	public function actionLog() {
		self::check();
		$this->render('log');
	}

	public function actionUseranalysis() {
		self::check();
		$this->render('weixin_user_analysis');
	}

	public function actionExportcenter() {
		self::check();
		$this->render('weixin_data_export_center');
	}

	public function actionUserdetails() {
		self::check();
		$this->layout = "subview";
		$this->render('weixin_user_details');
	}

	public function actionGroup() {
		self::check();
		$this->render('weixin_user_group');
	}

	public function actionProductlist() {
		self::check();
		$this->render('wrx_product_list');
	}

	public function actionProductanalysis() {
		self::check();
		$this->render('wrx_product_analysis');
	}

	public function actionRestoredb() {
		// self::check();
		$this->layout = "subview";
		$this->render('wrx_restore_db');
	}
}

?>