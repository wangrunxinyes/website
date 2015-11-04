<?php
//include css
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/assets/frame.layout/css/popup.reset.css");
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/assets/frame.layout/css/popup.style.css");

//include js;
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/assets/frame.layout/js/popup.modernizr.js");

?>
<a href="#0" class="cd-popup-trigger">View Pop-up</a>

<div class="cd-popup" role="alert">
	<div class="cd-popup-container">
		<p>Are you sure you want to delete this element?</p>
		<ul class="cd-buttons">
			<li><a href="#0">Yes</a></li>
			<li><a href="#0">No</a></li>
		</ul>
		<a href="#0" class="cd-popup-close img-replace">Close</a>
	</div> <!-- cd-popup-container -->
</div> <!-- cd-popup -->

<script src="<?php echo Yii::app()->baseUrl . '/assets/frame.layout/';?>js/popup.js"></script> <!-- Resource jQuery -->