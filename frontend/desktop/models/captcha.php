<?php
class captcha {
	function show() {
		self::getCode(100, 24);
	}

	function getCode($w, $h) {
		$im = imagecreate($w, $h);
		$red = imagecolorallocate($im, 255, 0, 0);
		$white = imagecolorallocate($im, 255, 255, 255);
		$num1 = rand(1, 20);
		$num2 = rand(1, 20);
		$_SESSION['helloweba_math'] = $num1 + $num2;
		$gray = imagecolorallocate($im, 118, 151, 199);
		$black = imagecolorallocate($im, mt_rand(0, 100), mt_rand(0, 100), mt_rand(0, 100));
		imagefilledrectangle($im, 0, 0, 100, 24, $black);
		for ($i = 0; $i < 80; $i++) {
			imagesetpixel($im, rand(0, $w), rand(0, $h), $gray);
		}
		imagestring($im, 5, 5, 4, $num1, $red);
		imagestring($im, 5, 30, 3, "+", $red);
		imagestring($im, 5, 45, 4, $num2, $red);
		imagestring($im, 5, 70, 3, "=", $red);
		imagestring($im, 5, 80, 2, "?", $white);
		ob_end_clean();
		header("Content-type: image/png");
		imagepng($im);
		imagedestroy($im);
		ob_end_flush();
	}
}
?>

