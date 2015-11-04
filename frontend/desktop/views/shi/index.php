<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie ie6 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" lang="en"><!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php

//register scirpts;
Yii::app()->assets->registerGlobalScript("shi/about/js/modernizr.custom.86080.js");
Yii::app()->assets->registerGlobalCss("shi/about/css/demo.css");
Yii::app()->assets->registerGlobalCss("shi/about/css/style2.css");
Yii::app()->assets->registerGlobalCss("extensions/menu.water/css/normalize.css");
Yii::app()->assets->registerGlobalCss("extensions/menu.water/css/default.css");
Yii::app()->assets->registerGlobalCss("extensions/menu.water/css/base.css");
Yii::app()->assets->registerGlobalCss("extensions/menu.water/css/send.css");
Yii::app()->assets->registerGlobalScript("extensions/menu.water/js/TweenMax.min.js", true);
Yii::app()->assets->registerGlobalScript("extensions/menu.water/js/send.js", true);
// <link rel="stylesheet" type="text/css" href="css/normalize.css" />
// 	<link rel="stylesheet" type="text/css" href="css/default.css">
// 	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.3.0/css/font-awesome.min.css" />
// 	<link rel="stylesheet" type="text/css" href="fonts/vicons/vicons-font.css" />
// 	<link rel="stylesheet" type="text/css" href="css/base.css" />
// 	<link rel="stylesheet" type="text/css" href="css/send.css" />
// 	<script src="js/jquery.min.js"></script>
// 	<script src="js/TweenMax.min.js"></script>
// 	<script src="js/send.js"></script>
?>
    </head>
    <body id="page">
	<div class="htmleaf-container" id='button_section'>
		<div class="content">
			<div class="send">
				<div class="send-indicator">
					<div class="send-indicator-dot"></div>
					<div class="send-indicator-dot"></div>
					<div class="send-indicator-dot"></div>
					<div class="send-indicator-dot"></div>
				</div>
				<button class="send-button">
					<div class="sent-bg"></div>
					<i class="fa fa-send send-icon"></i>
					<i class="fa fa-check sent-icon"></i>
				</button>
			</div>
		</div>
		<svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="800">
		  <defs>
		    <filter id="goo">
		      <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
		      <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo" />
		      <feComposite in="SourceGraphic" in2="goo" operator="atop"/>
		    </filter>
		    <filter id="goo-no-comp">
		      <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
		      <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo" />
		    </filter>
		  </defs>
		</svg>
		<p class="info">Loading <a href="https://dribbble.com/shots/1932977-Materialup">images</a>.</p>
	</div>

<div id="shibingyan" style="display:none;">

        <ul class="cb-slideshow">
            <li><span>Image 01</span><div><h3>SHI·BING·YAN</h3></div></li>
            <li><span>Image 02</span><div><h3>石·冰·艳</h3></div></li>
            <li><span>Image 03</span><div><h3>SHI·BING·YAN</h3></div></li>
            <li><span>Image 04</span><div><h3>石·冰·艳</h3></div></li>
            <li><span>Image 05</span><div><h3>SHI·BING·YAN</h3></div></li>
            <li><span>Image 06</span><div><h3>石·冰·艳</h3></div></li>
        </ul>

        <div class="container">
<header>
	 <p class="codrops-demos">
				    <a href="http://www.wangrunxin.com">Home</a>
					<a href="http://www.wangrunxin.com">Leave Message</a>
					<a href="http://www.wangrunxin.com">More</a>
				</p>
</header>
        </div>
        </div>
    </body>
</html>