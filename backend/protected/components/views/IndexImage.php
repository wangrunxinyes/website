<?php

//include css

Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/assets/extensions/index.live.images/css/reset.css");

Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/assets/extensions/index.live.images/css/default.css");

Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/assets/extensions/index.live.images/css/style.css");

//include js;

Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/assets/extensions/index.live.images/js/modernizr.js");

Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/assets/extensions/index.live.images/js/jquery-2.1.1.js");

Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/assets/extensions/index.live.images/js/main.js");

$keys = 'main_web_im_ad_';
$img_array = array("1" => null, "2" => null, "3" => null, "4" => null, "5" => null);
foreach ($img_array as $key => $value) {
	$img = R::findOne('main_web_general_settings', "identify='" . $keys . $key . "'");
	if (is_null($img)) {
		throw new Exception("No Image DB found", 1);
	} else {
		$pos = strpos($img->value, "http://");
		if ($pos === false) {
			$img_array[$key] = Yii::app()->request->hostInfo . Yii::app()->baseUrl . '/assets/extensions/index.live.images/assets/' . $img->value;
		} else {
			$img_array[$key] = $img->value;
		}
	}
}

?>
<!-- banner -->
<div class="max-banenr">
			<section class="cd-hero">

				<ul class="cd-hero-slider">

					<li class="selected" style="background-image: url('<?php echo $img_array[1]?>');">
						<div class="cd-full-width">

							<h2>同乘中国，绿色中国</h2>

							<p>拼车，低碳环保的生活方式</p>

							<a href="../../about/" class="cd-btn">探索更多</a>

							<!--<a href="" class="cd-btn">Article &amp; Download</a>
						-->
					</div>
					<!-- .cd-full-width -->

				</li>

				<li style="background-image: url('<?php echo $img_array[2]?>');">
					<div class="cd-full-width" >

						<h2>预定用车·从容不迫</h2>

						<p>同乘专业车队</p>

						<a href="../../about/" class="cd-btn secondary">了解更多</a>

					</div>
					<!-- .cd-half-width -->

					<!-- <div class="cd-half-width cd-img-container">

					<img src="<?php echo Yii::app()->
baseUrl . "/assets/extensions/index.live.images/"?>assets/tech-1.jpg" alt="tech 1">
				</div>
				-->
			</li>

			<li style="background-image: url('<?php echo $img_array[3]?>');">
				<div class="cd-full-width">

					<h2>安全·信赖</h2>

					<p>体验信息时代的便捷</p>

					<a href="../../about/" class="cd-btn secondary">了解更多</a>

				</div>
				<!-- .cd-half-width -->

			</li>

			<li class="cd-bg-video" style="background-image: url('<?php echo $img_array[4]?>');">
				<div class="cd-full-width">

					<h2>进化</h2>

					<p></p>

					<a href="../../about/" class="cd-btn">Learn more</a>

				</div>
				<!-- .cd-full-width -->

				<div class="cd-bg-video-wrapper" data-video="<?php echo Yii::app()->
baseUrl . "/assets/extensions/index.live.images/"?>assets/video/video">
					<!-- video element will be loaded using jQuery -->

				</div>
				<!-- .cd-bg-video-wrapper -->

			</li>

			<li style="background-image: url('<?php echo $img_array[5]?>');">
				<div class="cd-half-width cd-img-container">

					<!-- <img src="<?php echo Yii::app()->
baseUrl . "/assets/extensions/index.live.images/"?>assets/tech-2.jpg" alt="tech 2"> -->
				</div>

				<div class="cd-half-width">

					<h2>随时·随地</h2>

					<p>移动客户端即将上线</p>

					<a href="../../about/" class="cd-btn secondary">了解更多</a>

				</div>
				<!-- .cd-full-width -->

			</li>

		</ul>
		<!-- .cd-hero-slider -->

		<div class="cd-slider-nav">

			<nav>

				<span class="cd-marker item-1"></span>

				<ul>

					<li class="selected" data="1">
						<a href="#0">-</a>
					</li>

					<li data="2">
						<a href="#1">-</a>
					</li>

					<li data="3">
						<a href="#2">-</a>
					</li>

					<li data="4">
						<a href="#3">-</a>
					</li>

					<li data="5">
						<a href="#4">-</a>
					</li>

				</ul>

			</nav>

		</div>
		<!-- .cd-slider-nav -->
		<div class="wrx-bottom">
		<label class="wrx-bottom-label">Copyright ⓒ 2014 TongchengChina.All Rights Reserved. </label>
		</div>

	</section>
	<!-- .cd-hero -->
</div>

<form action="/type/product.php" method="get">
	<div class="home_form_bg top-class-wrx">
		<div class="white-t-r ">
			<div class="white-t-l"></div>
		</div>
		<div class="bg_white cont "></div>
		<div class="white-b-r ">
			<div class="white-b-l"></div>
		</div>
	</div>
	<div class="home_form top-class-wrx">
		<h2 class="xs4 c_red2 bbda lh40 ac ">60秒快速订车</h2>
		<input tabindex="1" name="city" id="city" value="bj" type="hidden">
		<div class="w260 xs2 vm input_wrap mt20 ml20 mr20 top-class-wrx">
			<div class="top-class-wrx selectDefault style_select_default  block end_city dragdown_select _selectCity">
				<span class=" top-class-wrx activeSelect"> <em>北京</em>
				</span>
			</div>
		</div>
		<div class="top-class-wrx w260 vm xs2 mt20 ml20 mr20">
			<div id="top-class-wrx selectbox_product_type1437991009142" class="selectDefault style_select_default" style="width: 221px;" tabindex="2">
				<div style="position: relative; z-index: 998;" class="selectDefault_son">
					<span class="activeSelect"> <em>时租</em>
					</span>
					<div style="width: 260px; position: absolute; z-index: 498; top: 31px; left: 0px; display: none;" class="styleSelect_item gray-active2">
						<div class="gray-t-r">
							<div class="gray-t-l"></div>
						</div>
						<ul class="styleSelect_item_content bg_f4">
							<li v="1" class="bgselected">
								<a href="javascript:;" class="selected">时租</a>
							</li>
						</ul>
						<div class="gray-b-r">
							<div class="gray-b-l"></div>
						</div>
					</div>
				</div>
			</div>
			<select style="display: none;" tabindex="2" name="product_type" id="product_type" w="221">
				<option selected="selected" value="1">时租</option>
				<option value="7">接机/火车</option>
				<option value="8">送机/火车</option>
				<option value="11">半日租</option>
				<option value="12">日租</option>
				<option value="13">热门线路</option>
			</select>
		</div>

		<a href="javascript:;" class="btn-red-left block center mt30 ml20 mr20">
			<span class="btn-red-right">
				<input tabindex="3" class="btn-red-center ac" value="下一步" type="submit"></span>
		</a>

	</div>
</form>
</div>
</div>
<!-- banner -->