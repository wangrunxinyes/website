<?php
Yii::app()->assets->registerGlobalCss("extensions/gallery/css/normalize.css");
Yii::app()->assets->registerGlobalCss("extensions/gallery/css/default.css");
Yii::app()->assets->registerGlobalCss("extensions/gallery/css/styles.css");
Yii::app()->assets->registerGlobalScript("extensions/gallery/js/toggleAria.js");
?>

	<main role="main" id="main">
			<section class="tiles-a">
				<ul>
<?php

//load db
$gallery = array();

$img = R::find('main_web_image_db', ' type = ? ',
	array("default")
);

if (is_null($img)) {

	throw new Exception("No Image DB found", 1);

} else {

	foreach ($img as $image_bean) {

		$img_array = array();
		$pos = strpos($image_bean->value, "http://");

		if ($pos === false) {

			$img_array["url"] = Yii::app()->request->hostInfo . Yii::app()->baseUrl . '/assets/extensions/index.live.images/assets/' . $image_bean->value;

		} else {

			$img_array["url"] = $image_bean->value;

		}

		$img_array["title"] = $image_bean->class;
		$img_array["des"] = $image_bean->des;
		$img_array["link"] = $image_bean->value;

		array_push($gallery, $img_array);
	}

}

//handle json data

//show
foreach ($gallery as $img) {
	echo '<li>
						<a class="gallery" href="#" style="background: url(' . $img["url"] . '); background-size: cover;"
						aria-controls="aside" aria-expanded="false">
							<div class="details visually-hidden">
								<img src="' . $img["url"] . '" alt="Starry Night">
								<div class="text-copy wrapper">
									<h3>' . $img["title"] . '</h3>
									<p>' . $img["des"] . '</p>
									<label href="' . $img["link"] . '">details</label>
								</div>
							</div>
						</a>
					</li>';
}

?>

				</ul>
			</section>

		</main>
		<aside role="complementary" id="aside" aria-hidden="true" aria-expanded="false">
			<a href="#" class="close"><img src="<?php echo Yii::app()->assets->getScirptPath('extensions/gallery/img/close-white-thin.svg')?>" alt="Close button"><span class="visually-hidden">Return to main content</span></a>
			<div class="aside--details" tabindex="0" aria-live="polite" aria-atomic="true" aria-label="Image details">

			</div>
		</aside>

	<script>
	var $parent = $('#main'), $aside = $('#aside'), $asideTarget = $aside.find('.aside--details'), $asideClose = $aside.find('.close'), $tilesParent = $('.tiles-a'), $tiles = $tilesParent.find('a'), slideClass = 'show-detail';
	$tiles.on('click', function (e) {
	    e.preventDefault();
	    e.stopPropagation();
	    if (!$('html').hasClass(slideClass)) {
	        $tiles.removeClass('active');
	        $(this).addClass('active');
	        $(this).attr('aria-expanded', 'true');
	        loadTileData($(this));
	    } else {
	        killAside();
	        $(this).attr('aria-expanded', 'false');
	    }
	});
	$asideClose.on('click', function (e) {
	    e.preventDefault();
	    killAside();
	});
	function loadTileData(target) {
	    var $this = $(target), itemHtml = $this.find('.details').html();
	    $asideTarget.html(itemHtml);
	    showAside();
	}
	function showAside() {
	    if (!$('html').hasClass(slideClass)) {
	        $('html').toggleClass(slideClass);
	        $aside.attr('aria-hidden', 'false');
	        focusCloseButton();
	    }
	}
	window.addEventListener('keyup', function (e) {
	    var code = e.keyCode ? e.keyCode : e.which;
	    if (code === 27) {
	        killAside();
	    }
	}, false);
	function killAside() {
	    if ($('html').hasClass(slideClass)) {
	        $('html').removeClass(slideClass);
	        sendFocusBack();
	        $aside.attr('aria-hidden', 'true');
	        $tiles.attr('aria-expanded', 'false');
	    }
	}
	function focusCloseButton() {
	    $asideClose.focus();
	}
	function sendFocusBack() {
	    $('.active').focus();
	}
	$parent.on('click', function (e) {
	    if ($('html').hasClass(slideClass)) {
	        killAside();
	    }
	});
	</script>