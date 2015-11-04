<?php

class SystemInit {

	private $para_array;

	public function init() {

		$this->para_array = array(

			'init_all' => 'init all start',
			'initIm' => 'init Index Image Views',
			'initOauth' => 'init Oauth Db',
			'initImgDb' => 'init Img Db',

		);

		self::start();

	}

	public function init_par($par) {

		$this->para_array = array();

		switch ($par) {
		case 'image_db':
			$this->para_array = array(
				'initImgDb' => 'init Img Db',
			);
			break;

		default:
			# code...
			break;
		}

		self::start();

	}

	public function start() {
		foreach ($this->para_array as $key => $value) {
			echo '<br>####------processing: <label style="color:blue;">' . $value . "</label>";
			try {
				$this->$key();
				echo '<br>####------end with <label style="color:green;">success</label>';
			} catch (Exception $e) {
				echo '<br>####------end with <label style="color:red;">error: ' . print_r($e, true) . '</label>';
			}

		}
	}

	public function init_all() {
		echo "<br>####*****end: success";
	}

	public function initOauth() {

		Yii::app()->oauth->init_database("localhost", "wangrunxin", "wrx52691000");
		echo "<br>####*****end: success";
	}

	public function initIm() {

		//init im local

// $post = R::dispense('main_web_general_settings');

// $post->identify = 'main_web_im_ad_1';

// $post->value = 'tech-1-mobile.jpg';

// $id = R::store($post);       //Create or Update

// $post = R::dispense('main_web_general_settings');

// $post->identify = 'main_web_im_ad_2';

// $post->value = 'tech-2-mobile.jpg';

// $id = R::store($post);       //Create or Update

// $post = R::dispense('main_web_general_settings');

// $post->identify = 'main_web_im_ad_3';

// $post->value = 'tech-1-mobile.jpg';

// $id = R::store($post);       //Create or Update

// $post = R::dispense('main_web_general_settings');

// $post->identify = 'main_web_im_ad_4';

// $post->value = 'video-replace-mobile.jpg';

// $id = R::store($post);       //Create or Update

// $post = R::dispense('main_web_general_settings');

// $post->identify = 'main_web_im_ad_5';

// $post->value = 'img.jpg';

// $id = R::store($post);       //Create or Update

		$post = R::dispense('main_web_general_settings');

		$post->identify = 'main_web_im_ad_1';

		$post->value = 'http://i3.tietuku.com/cada1485466e5a6d.jpg';

		$id = R::store($post); //Create or Update

		$post = R::dispense('main_web_general_settings');

		$post->identify = 'main_web_im_ad_2';

		$post->value = 'http://i3.tietuku.com/7072ead33325d672.jpg';

		$id = R::store($post); //Create or Update

		$post = R::dispense('main_web_general_settings');

		$post->identify = 'main_web_im_ad_3';

		$post->value = 'http://i3.tietuku.com/91c65e9fadb782d3.jpg';

		$id = R::store($post); //Create or Update

		$post = R::dispense('main_web_general_settings');

		$post->identify = 'main_web_im_ad_4';

		$post->value = 'video-replace-mobile.jpg';

		$id = R::store($post); //Create or Update

		$post = R::dispense('main_web_general_settings');

		$post->identify = 'main_web_im_ad_5';

		$post->value = 'http://i3.tietuku.com/327a8f39cebc4b00.jpg';

		$id = R::store($post); //Create or Update

		echo "<br>####*****end: success";

	}

	public function initImgDb() {

		$data = array(
			'class' => 'other',
			'type' => 'default',
			'title' => 'default img',
			'des' => 'this is a default img.',
			'link' => 'http://www.wangrunxin.com',
			'value' => 'http://i3.tietuku.com/39eff54062328b44.png',
		);

		$img = new ImageUnit($data);
		$img->store_unit($img);
	}

}

?>