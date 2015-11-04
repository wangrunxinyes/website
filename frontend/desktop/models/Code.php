<?php

class Code{
	public function createCode($w, $h){
		$im = imagecreate($w, $h);

	//imagecolorallocate($im, 14, 114, 180); // background color
	$red = imagecolorallocate($im, 255, 0, 0);
	$white = imagecolorallocate($im, 255, 255, 255);

	$num1 = rand(1, 20);
	$num2 = rand(1, 20);

	Yii::app()->session['main_user_login_code'] = $num1 + $num2;

	$gray = imagecolorallocate($im, 118, 151, 199);
	$black = imagecolorallocate($im, mt_rand(0, $w), mt_rand(0, $w), mt_rand(0, $w));

	//画背景
	imagefilledrectangle($im, 0, 0, $w, $h, $black);
	//在画布上随机生成大量点，起干扰作用;
	for ($i = 0; $i < 100; $i++) {
		imagesetpixel($im, rand(0, $w), rand(0, $h), $gray);
	}

	imagestring($im, 5, 10, 8, $num1, $red);
	imagestring($im, 5, 40, 14, "+", $red);
	imagestring($im, 5, 80, 12, $num2, $red);
	imagestring($im, 5, 110, 4, "=", $red);
	imagestring($im, 5, 140, 15, "?", $white);

	header("Content-type: image/png");
	imagepng($im);
	imagedestroy($im);
	}

}

?>