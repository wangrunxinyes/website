

				<?php
$control = json_decode(Yii::app()->user->getModel('wrx_weixin_json'));
if (count($control) == 0) {
	echo '无公众号';
} else {
	foreach ($control as $value) {
		$weixin_account = new WeixinBasicUnit();
		if ($weixin_account->Build($value)) {
			$photo = $weixin_account->getValue('weixin_photo');
			if (strpos($photo, "http:") === false) {
				$photo = "http://www.cxoworld.com.cn/source/css/imgs/e_img03_touxiang.jpg";
			}
			if ($weixin_account->getValue('weixin_open_id') == 'unknown' || strlen($weixin_account->getValue('weixin_open_id')) < 10) {
				$name = $weixin_account->getValue('weixin_name') . '【未激活】';
			} else {
				$name = $weixin_account->getValue('weixin_name');
			}
			echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="dashboard-stat blue-madison">
						<div class="visual">
							<i class="fa fa-comments"></i>
						</div>
						<div class="details">
							<div class="number">
								<img style="height: 40px;" src="' . $photo . '" alt="">
							</div>
							<div class="desc">
								 ' . $name . '
							</div>
						</div>
						<a class="more" href="' . Yii::app()->assets->getUrlPath('/backend/account/type/' . $value) . '">
						进入公众号 <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>';
		}
	}
}

?>
