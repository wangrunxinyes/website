<!doctype html>



<html lang="zh" class="no-js">



<head>



	<meta charset="UTF-8">



	<meta name="viewport" content="width=device-width, initial-scale=1">



	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global.style/css/useso.css.css" type='text/css'>



	<!-- Main CSS-->



	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/frame.layout/css/reset.css"> <!-- CSS reset -->



	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/frame.layout/css/style.css"> <!-- Resource style -->



	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/frame.layout/css/popup.reset.css"> <!-- Resource style -->



	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/frame.layout/css/popup.style.css"> <!-- Resource style -->



	<!-- Jquery  -->



	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global.style/js/jquery-2.1.1.js"></script> <!-- Modernizr -->



	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/frame.layout/js/popup.modernizr.js"></script> <!-- Modernizr -->



	<!-- Custom js-->



	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/custom.files/js/handle.popup.js"></script> <!-- Modernizr -->



	<title><?php echo CHtml::encode($this->pageTitle); ?></title>



</head>



<body>



    <?php $this->widget('Popup_login_widget'); ?>



	<header class="">



		<a id="cd-logo" href="#0"><img scr="<?php echo Yii::app()->request->hostInfo.Yii::app()->baseUrl; ?>/assets/global.style/img/logo.png" alt="<?php echo CHtml::encode($this->pageTitle); ?>"></a>



		<nav id="cd-top-nav">



			<ul>

			    <li><a href="#0">客户端下载</a></li>



			    <?php 

			    if(Yii::app()->user->isGuest){

			    	echo '<li><a href="#0" class="cd-popup-trigger">登录</a></li>';

			    }else{

			    	echo '<li><a>'.Yii::app()->user->name.'</a></li>';

			    }

			    ?>



			</ul>



		</nav>



		<a class="" id="cd-menu-trigger" href="#0"><span class="cd-menu-text">菜单</span><span class="cd-menu-icon"></span></a>



	</header>



	<main class="cd-main-content">



		<?php echo $content; ?>







	</main>



	<nav id="cd-lateral-nav">







	 <div class="avatar">



	        <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/extensions/user.account.images/img/logo.png" alt=""/>



	    </div>



	   <div id="mainmenu"></br>









		<?php $this->widget('zii.widgets.CMenu',array(







			'items'=>array(







				array('label'=>'您好， '.Yii::app()->user->name, 'url'=>array('index.php'), 'visible'=>!Yii::app()->user->isGuest),



				array('label'=>'欢迎访问同乘中国', 'url'=>array(''), 'visible'=>Yii::app()->user->isGuest),

				array('label'=>'登录', 'url'=>array('/../index.php/oauth/login'), 'visible'=>Yii::app()->user->isGuest),

				array('label'=>'注册', 'url'=>array('index.php/oauth/login'), 'visible'=>Yii::app()->user->isGuest),

				array('label'=>'预定用车', 'url'=>array('index.php'), 'visible'=>!Yii::app()->user->isGuest),

				array('label'=>'我的订单', 'url'=>array('index.php'), 'visible'=>!Yii::app()->user->isGuest),

				array('label'=>'用户中心', 'url'=>array('index.php'), 'visible'=>!Yii::app()->user->isGuest),

				array('label'=>'常见问题', 'url'=>array('index.php'), 'visible'=>!Yii::app()->user->isGuest),

			),

		)); 



		?>







	

<?php $this->widget('zii.widgets.CMenu',array(







			'items'=>array(





				array('label'=>'关于我们', 'url'=>array('../../about/'), 'visible'=>Yii::app()->user->isGuest),





				array('label'=>'退出登录', 'url'=>array('site/logout'), 'visible'=>!Yii::app()->user->isGuest)







			),







		)); ?>

		</div><!-- mainmenu -->

		<ul class="cd-navigation">



			<li class="item-has-children">



				<a href="#0">友情链接</a>



				<ul class="sub-menu">



					<li><a href="http://www.qunar.com/" target="blank">去哪儿网【机票酒店】</a></li>



					<li><a href="http://www.baidu.com/" target="blank">百度【推广合作商】</a></li>



					<li><a href="http://www.qunar.com/" target="blank">智联【招聘合作商】</a></li>



					<li><a href="http://www.wangrunxin.com/" target="blank">开发者网站</a></li>



				</ul>



			</li> <!-- item-has-children -->



		</ul> <!-- cd-navigation -->



		<div class="cd-navigation socials">



			<a class="cd-twitter cd-img-replace" href="#0">Twitter</a>



			<a class="cd-github cd-img-replace" href="#0">Git Hub</a>



			<a class="cd-facebook cd-img-replace" href="#0">Facebook</a>



			<a class="cd-google cd-img-replace" href="#0">Google Plus</a>



		</div> <!-- socials -->



	</nav>	



<!-- Resource jQuery -->



<script src="http://libs.useso.com/js/jquery/1.11.1/jquery.min.js"></script>



<!-- Main jQuery -->



<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/frame.layout/js/main.js"></script> <!-- Resource jQuery -->



<script src="<?php echo Yii::app()->baseUrl.'/assets/frame.layout/'; ?>js/popup.js"></script>







</body>



</html>