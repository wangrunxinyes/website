<?php

$url = Yii::app()->

	request->getUrl();

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

// Yii::app()->assets->registerCssForExtension('admin_login_view', "css/normalize.css");

// Yii::app()->assets->registerCssForExtension('admin_login_view', "css/default.css");

// Yii::app()->assets->registerCssForExtension('admin_login_view', "css/styles.css");

// Yii::app()->assets->registerScriptForExtension('admin_login_view', "js/prefixfree.css");

Yii::app()->assets->registerGlobalCss("global.style/css/css.css");

Yii::app()->assets->registerGlobalCss("global.style/css/da84.css");

Yii::app()->assets->registerGlobalCss("global.style/css/normalize.css");

Yii::app()->assets->registerGlobalCss("global.style/css/default.css");

Yii::app()->assets->registerGlobalCss("global.style/css/fakeLoader.css");

?>

<!DOCTYPE html>



<html style="" class=" js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage no-websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients no-cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths" lang="en-US">

<head>



	<meta http-equiv="content-type" content="text/html; charset=UTF-8">



	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title><?php echo $code;?>| WANG Runxin</title>



	<meta name="description" content="Our 404 page">

	<meta name="viewport" content="width=device-width, initial-scale=1"></head>



<body class="error">



	<div class="fakeloader"></div>



	<main class="content-primary">



		<div class="container">



			<div class="dialog">



				<h1 class="mega">

					<?php echo $code;?></h1>



				<h2 class="subhead">Sorry&nbsp;|&nbsp;抱歉<br>

				<lable class="description">

					<?php echo CHtml::encode($message);?></lable>

			<br>



		</h2>



	</div>



	<nav class="nav-choices">



		<div class="options">Your options&nbsp;|&nbsp;你的选择</div>



		<ul>

			<li>

				<a class="btn btn-primary" href="<?php

echo Yii::app()->request->hostInfo . Yii::app()->homeUrl;?>">Home | 主页</a>

			</li>



			<li id="separator-404" class="separator">&nbsp;&nbsp;</li>

			<li>

				<a class="btn btn-primary" href="<?php

echo Yii::app()->request->hostInfo . Yii::app()->homeUrl . 'admin/index/par/log';?>" id="punch-a-moose" >Check | 管理员</a>



			</li>



		</ul>



	</nav>



</div>



</main>

</body>

</html>