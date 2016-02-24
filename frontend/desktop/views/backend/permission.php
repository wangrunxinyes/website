<?php

Yii::app()->assets->registerGlobalCss("global.style/css/css.css");

Yii::app()->assets->registerGlobalCss("global.style/css/da84.css");

Yii::app()->assets->registerGlobalCss("global.style/css/normalize.css");

Yii::app()->assets->registerGlobalCss("global.style/css/default.css");

Yii::app()->clientScript->registerMetaTag(' text/html;charset=utf-8', null, 'Content-Type');

$code = '*';

?>
<!DOCTYPE html>

<html style="" class=" js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage no-websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients no-cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths" lang="en-US">

<head>

	<meta http-equiv="content-type" content="text/html; charset=UTF-8">

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>error|错误</title>

	<meta name="description" content="Our 404 page">

	<meta name="viewport" content="width=device-width, initial-scale=1">

<body class="error">

	<div class="fakeloader"></div>

	<main class="content-primary">

		<div class="container">

			<div class="dialog">

				<h1 class="mega">

					<?php echo $code;?></h1>

				<h2 class="subhead">
					Sorry&nbsp;|&nbsp;抱歉
					<br>

					<lable class="description">permission denied|需要更高权限</lable>
				</h2>

			</div>

			<nav class="nav-choices">

				<div class="options">Your options&nbsp;|&nbsp;你的选择</div>

				<ul>

					<li>

						<a class="btn btn-primary" href="<?php

echo Yii::app()->
	request->hostInfo . Yii::app()->homeUrl;

?>">home | 主页
						</a>

					</li>

					<li id="separator-404" class="separator">&nbsp;&nbsp;</li>

					<li>

						<a class="btn btn-primary" href="<?php

echo Yii::app()->
	request->hostInfo . Yii::app()->homeUrl . 'backend/logout';

?>" id="punch-a-moose" >Change Account | 更换账户
						</a>

					</li>

				</ul>

			</nav>

		</div>

	</main>

</body>

</html>