<?php

$url = Yii::app()->request->getUrl();

if (str_replace("/index.php/interface/", "", $url) != $url) {

	$data = array(

		"api_key" => "global",

		"ps" => "this is a global error handler.",

	);

	$msg = CHtml::encode($message);

	$out = new Output();

	$out->init($data);

	$out->setResultType(0);

	$out->error($msg);

	exit;

}

$this->pageTitle = Yii::app()->name . ' - Error';

Yii::log(CHtml::encode($message), 'fatal error', "error");

$this->breadcrumbs = array(

	'Error',

);

?>







<!DOCTYPE html>



<html style="" class=" js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage no-websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients no-cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths" lang="en-US"><head>



<meta http-equiv="content-type" content="text/html; charset=UTF-8">



<meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><title><?php echo $code;?> | WANG Runxin</title>



<meta name="description" content="Our 404 page"><meta name="viewport" content="width=device-width, initial-scale=1">



<link rel="shortcut icon" href="<?php echo Yii::app()->baseUrl;?>/assets/global.style/img/dog.ico" />



<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl;?>/assets/global.style/css/css.css">



<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl;?>/assets/global.style/css/da84.css">



<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl;?>/assets/global.style/css/normalize.css" />



<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl;?>/assets/global.style/css/default.css">



<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl;?>/assets/global.style/css/fakeLoader.css">



</head>



<body class="error">



<div class="fakeloader"></div>



<main class="content-primary">



<div class="container">



<div class="dialog">



<h1 class="mega"><?php echo $code;?></h1>



<h2 class="subhead">Sorry&nbsp;|&nbsp;抱歉</br><lable class="description"><?php echo CHtml::encode($message);?></lable></br>



</h2>



</div>



<nav class="nav-choices">



<div class="options">Your options&nbsp;|&nbsp;你的选择</div>



<ul><li><a class="btn btn-primary" href="http://www.wangrunxin.com/">Go home</a></li>



<li id="separator-404" class="separator">&nbsp;&nbsp;</li><li><a class="btn btn-primary" href="http://www.wangrunxin.com/" id="punch-a-moose" >返回主页</a>



</li>



</ul>



</nav>



</div>



</main>







<script src="<?php echo Yii::app()->baseUrl;?>/assets/global.style/js/jquery.min.js"></script>



<script src="<?php echo Yii::app()->baseUrl;?>/assets/global.style/js/fakeLoader.min.js"></script>



    <script>



        $(document).ready(function(){



            $(".fakeloader").fakeLoader({



                timeToHide:1200,



                bgColor:"#2ecc71",



                spinner:"spinner1"



            });



        });



</script>



</body>



</html>