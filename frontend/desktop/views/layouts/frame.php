<!doctype html>

<html lang="zh" class="no-js">

<head>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.useso.com/css?family=Titillium+Web:400,600,700' rel='stylesheet' type='text/css'>

	<!-- Main CSS-->

	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/frame.layout/css/reset.css"> <!-- CSS reset -->

	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/frame.layout/css/style.css"> <!-- Resource style -->

	<!-- Popup CSS-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/extensions/popup.a/css/normalize.css" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/extensions/popup.a/css/default.css">

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/extensions/popup.a/css/style.css"> <!-- Resource style -->

	<!-- Popup js-->

	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/extensions/popup.a/js/popup.modernizr.js"></script> <!-- Modernizr -->

	<!-- Custom js-->

	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/custom.files/js/handle.popup.js"></script> <!-- Modernizr -->

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

</head>

<body>

	<header class="cd-header">

		<div id="cd-logo"><a href="#0"><img src="assets/cd-logo.svg" alt="Logo"></a></div>



		<nav class="cd-primary-nav">

			<ul>

				<li><a href="#0">Home</a></li>

				<li><a href="#0">Portfolio</a></li>

				<li><a href="#0">Contact</a></li>

				<li><a id="cd-menu-trigger" href="#0"><span class="cd-menu-text">菜单</span><span class="cd-menu-icon"></span></a></li>

			</ul>

		</nav> <!-- .cd-primary-nav -->

	</header>

	<main class="cd-main-content">

		<?php echo $content; ?>

			<div class="container">

		<section class="cd-section">

			<div class="cd-modal-action">

				<a href="#0" id="btn-login" class="btn" data-type="modal-trigger">login</a>

				<span class="cd-modal-bg"></span>

			</div> <!-- cd-modal-action -->



			<div class="cd-modal">

				<div class="cd-modal-content">

					<p>

						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad modi repellendus, optio eveniet eligendi molestiae? Fugiat, temporibus! A rerum pariatur neque laborum earum, illum voluptatibus eum voluptatem fugiat, porro animi tempora? Sit harum nulla, nesciunt molestias, iusto aliquam aperiam est qui possimus reprehenderit ipsam ea aut assumenda inventore iste! Animi quaerat facere repudiandae earum quisquam accusamus tempora, delectus nesciunt, provident quae aliquam, voluptatum beatae quis similique in maiores repellat eligendi voluptas veniam optio illum vero! Eius, dignissimos esse eligendi veniam.

					</p>



					<p>

						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad modi repellendus, optio eveniet eligendi molestiae? Fugiat, temporibus! A rerum pariatur neque laborum earum, illum voluptatibus eum voluptatem fugiat, porro animi tempora? Sit harum nulla, nesciunt molestias, iusto aliquam aperiam est qui possimus reprehenderit ipsam ea aut assumenda inventore iste! Animi quaerat facere repudiandae earum quisquam accusamus tempora, delectus nesciunt, provident quae aliquam, voluptatum beatae quis similique in maiores repellat eligendi voluptas veniam optio illum vero! Eius, dignissimos esse eligendi veniam.

					</p>



					<p>

						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad modi repellendus, optio eveniet eligendi molestiae? Fugiat, temporibus! A rerum pariatur neque laborum earum, illum voluptatibus eum voluptatem fugiat, porro animi tempora? Sit harum nulla, nesciunt molestias, iusto aliquam aperiam est qui possimus reprehenderit ipsam ea aut assumenda inventore iste! Animi quaerat facere repudiandae earum quisquam accusamus tempora, delectus nesciunt, provident quae aliquam, voluptatum beatae quis similique in maiores repellat eligendi voluptas veniam optio illum vero! Eius, dignissimos esse eligendi veniam.

					</p>

				</div> <!-- cd-modal-content -->

			</div> <!-- cd-modal -->



			<a href="#0" class="cd-modal-close">Close</a>

		</section> <!-- .cd-section -->

		

	</div>

	</main> <!-- cd-main-content -->



	<nav id="cd-lateral-nav">

		<ul class="cd-navigation">

			<li class="item-has-children">

				<a href="#0">Services</a>

				<ul class="sub-menu">

					<li><a href="#0">Brand</a></li>

					<li><a href="#0">Web Apps</a></li>

					<li><a href="#0">Mobile Apps</a></li>

				</ul>

			</li> <!-- item-has-children -->



			<li class="item-has-children">

				<a href="#0">Products</a>

				<ul class="sub-menu">

					<li><a href="#0">Product 1</a></li>

					<li><a href="#0">Product 2</a></li>

					<li><a href="#0">Product 3</a></li>

					<li><a href="#0">Product 4</a></li>

					<li><a href="#0">Product 5</a></li>

				</ul>

			</li> <!-- item-has-children -->



			<li class="item-has-children">

				<a href="#0">Stockists</a>

				<ul class="sub-menu">

					<li><a href="#0">London</a></li>

					<li><a href="#0">New York</a></li>

					<li><a href="#0">Milan</a></li>

					<li><a href="#0">Paris</a></li>

				</ul>

			</li> <!-- item-has-children -->

		</ul> <!-- cd-navigation -->



		<div id="mainmenu">



		<?php $this->widget('zii.widgets.CMenu',array(



			'items'=>array(



				array('label'=>'Home', 'url'=>array('post/index')),



				array('label'=>'About', 'url'=>array('site/page', 'view'=>'about')),



				array('label'=>'Contact', 'url'=>array('site/contact')),



				array('label'=>'Login', 'url'=>array('site/login'), 'visible'=>Yii::app()->user->isGuest),



				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('site/logout'), 'visible'=>!Yii::app()->user->isGuest)



			),



		)); ?>



	</div><!-- mainmenu -->



		<ul class="cd-navigation cd-single-item-wrapper">

			<li><a class="current" href="#0">Journal</a></li>

			<li><a href="#0">FAQ</a></li>

			<li><a href="#0">Terms &amp; Conditions</a></li>

			<li><a href="#0">Careers</a></li>

			<li><a href="#0">Students</a></li>

		</ul> <!-- cd-single-item-wrapper -->



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

<!-- Popup jQuery -->

<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/extensions/popup.a/js/jquery-2.1.1.js"></script>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/extensions/popup.a/js/velocity.min.js"></script>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/extensions/popup.a/js/main.js"></script> <!-- Resource jQuery -->

</body>

</html>