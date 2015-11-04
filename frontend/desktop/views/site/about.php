<!DOCTYPE html>
<html>
<head>
	<?php
Yii::app()->
	assets->registerCss("extensions/family.assets/css/demo.css");
Yii::app()->assets->registerCss("extensions/family.assets/css/component.css");
Yii::app()->assets->registerScript("extensions/family.assets/js/modernizr.custom.js");
Yii::app()->assets->registerScript("extensions/family.assets/js/classie.js", true);
Yii::app()->assets->registerScript("extensions/family.assets/js/cbpSplitLayout.js", true);
?>
</head>
<body>

	<div class="container">
		<div id="splitlayout" class="splitlayout">
			<div class="intro">
				<div class="side side-left">
					<header class="codropsheader clearfix">
						<h2>软件工程师</h2>
						<h3>Software Engineer</h3>
						<!-- <div class="demos">
						<a href="index.html">Effect</a>
					</div>
					-->
				</header>
				<div class="intro-content">
					<div class="profile">
						<img src="<?php echo Yii::app()->
	assets->getScirptPath('extensions/family.assets/img/wang.jpg');?>" alt="profile1">
					</div>
					<h1>
						<span>王润心</span>
						<span>WANG Runxin</span>
					</h1>
				</div>
				<div class="overlay"></div>
			</div>
			<div class="side side-right">
				<header class="codropsheader clearfix">
					<h2>公共政策及管理</h2>
					<h3>Public Policy and Governance</h3>
					<!-- 		<div class="demos">
					<a href="index.html">Effect 1</a>
				</div>
				-->
			</header>
			<div class="intro-content">
				<div class="profile">
					<img src="<?php echo Yii::app()->
	assets->getScirptPath('extensions/family.assets/img/me.jpg');?>" alt="profile2">
				</div>
				<h1>
					<span>石冰艳</span>
					<span>SHI Bingyan</span>
				</h1>
			</div>
			<div class="overlay"></div>
		</div>
	</div>
	<!-- /intro -->
	<div class="page page-right">
		<div class="page-inner">
			<section>
				<h2>SHI Bingyan</h2>
				<p>简介</p>
				<p></p>
				<p>
					<a href="/../shi/index">个人网站</a>
				</p>
			</section>
			<section>
				<p>简介</p>
				<p></p>
			</section>
			<section>
				<p>爱好</p>
				<p></p>
			</section>
			<section>
				<p>Favorite</p>
				<p></p>
			</section>
		</div>
		<!-- /page-inner -->
	</div>
	<!-- /page-right -->
	<div class="page page-left">
		<div class="page-inner">
			<section>
				<h2>WANG Runxin</h2>
				<p>简介 | Introduction</p>
				<p>
					<small>喜爱编程，熟悉各种平台语言，理解学习能力强</small>
					<br>
					<small>
						A man who loves programming.
						<br><br><br>
						<a href="/../wang/index">更多信息 | My Personal website</a>
					</small>
				</p>

			</section>
		</div>
		<!-- /page-inner -->
	</div>
	<!-- /page-left -->
	<a href="#" class="back back-right" title="back to intro">&rarr;</a>
	<a href="#" class="back back-left" title="back to intro">&larr;</a>
</div>
<!-- /splitlayout -->
</div>
<!-- /container -->

</body>
</html>