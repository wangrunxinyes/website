<?php
Yii::app()->
	assets->registerCss("extensions/home/css/bootstrap.min.css");
Yii::app()->assets->registerCss("extensions/home/css/style.css");
Yii::app()->assets->registerScript("extensions/home/js/bootstrap.min.js");
?>
<!DOCTYPE html>
<html>
<head>

	<title>Home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Play-Offs Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() {setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<meta charset utf="8">
	<!--fonts-->

	<!--fonts-->
</head>
<body>
	<div class="header-top">
			<div class="header-nav">
				<section class="color ss-style-bigtriangle nav-top">
					<nav class="navbar navbar-default">
						<div class="container">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<div class="logo displ_stn">
									<h1>
										<a >Wangrunxin STU</a>
									</h1>
								</div>
							</div>
							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								<ul class="nav navbar-nav float-nav nav-algn_r">
									<li>
										<a class="active">Custom</a>
									</li>
								</ul>
								<div class="logo float-nav nav-algn_c">
									<h1>
										<a>Wangrunxin Studio</a>
									</h1>
								</div>
								<ul class="nav navbar-nav navbar-right float-nav nav-algn_l">
									<li>
										<a href="<?php echo Yii::app()->assets->getUrlPath('site/about');?>">About</a>
									</li>
								</ul>
								<div class="clearfix"></div>
							</div>
							<!-- /.navbar-collapse -->
							<div class="clearfix"></div>
						</div>
						<!-- /.container-fluid -->
					</nav>
				</section>
				<svg id="bigTriangleColor" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 100 102" preserveAspectRatio="none">
					<path d="M0 0 L50 100 L100 0 Z" />
				</svg>
			</div>
			<!--header-text-->
			<div class="head-top-text">
				<div class="container">
					<h2>Fast and high quality develop service</h2>
					<p>
						We help you with your website, apps and cms system.
						<br></p>
					<a class="btn btn-default hd-more" href="#" role="button">Details</a>
				</div>
			</div>
	</div>
	<!--trainers-->
	<div class="our-trainers">
		<div class="container">
			<h3>our project</h3>
			<div class="row">
				<div class="col-md-4 trainer-grid-text">
					<div class="ch-item ch-img-1">
						<div class="ch-info">
							<h3>Wechat System</h3>
							<a href="http://www.tongchengchina.com/backend/aboutus" style="color:white">Learn more</a>
						</div>
					</div>
					<h4>Wechat System</h4>
					<p>
						Provide wechat Oauth2.0 authorization, service account register, CMS system and whole website for end custom.
					</p>
				</div>
				<!-- /.col-lg-4 -->
				<div class="col-md-4 trainer-grid-text">
					<div class="ch-item ch-img-2">
						<div class="ch-info">
							<h3>Mobile Apps</h3>
							<p></p>
						</div>
					</div>
					<h4>Apps</h4>
					<p>
						Provide kinds of platform apps, including ios, android and cocos-2dx mobile game.
					</p>
				</div>
				<!-- /.col-lg-4 -->
				<div class="col-md-4 trainer-grid-text">
					<div class="ch-item ch-img-3">
						<div class="ch-info">
							<h3>CMS</h3>
							<p></p>
						</div>
					</div>
					<h4>CMS project</h4>
					<p>Control your website, search customer data and more.</p>
				</div>
				<!-- /.col-lg-4 -->
				<div class="clearfix"></div>
			</div>
			<!-- /.row -->
		</div>
	</div>
	<div class="stats-tabs">
		<div class="container">
			<h3>Our OFS</h3>
			<div class="col-md-6 pd stats">
				<h4>Online Follow-up System</h4>
				<div class="progress mr">
					<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
						<span class="sr-only">40% Complete (In progress)</span>
					</div>
				</div>
				<div class="border-text">
					<h5>[Project Name] - Interface development</h5>
				</div>
				<div class="progress mr">
					<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
						<span class="sr-only">80% Complete</span>
					</div>
				</div>
				<div class="border-text">
					<h5>[Project Name] - Function development</h5>
				</div>
				<div class="progress mr">
					<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
						<span class="sr-only">60% Complete (warning)</span>
					</div>
				</div>
				<div class="border-text">
					<h5>[Project Name] - Development Doc</h5>
				</div>
				<div class="progress mr">
					<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100" style="width: 62%">
						<span class="sr-only">62% Complete (danger)</span>
					</div>
				</div>
				<div class="border-text">
					<h5>[Project Name] - Overall Progress</h5>
				</div>
			</div>
			<div class="col-md-6 pd tabs">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs nav2" role="tablist">
					<li role="presentation" class="active">
						<a href="#home" aria-controls="home" role="tab" data-toggle="tab">General</a>
					</li>

				</ul>
				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active re-pad2" id="home">
						<!-- <div class="col-md-6 re-flt">
						<img src="" alt="/" class="img-responsive"></div>
					-->
					<div class="col-md-10 re-flt re-xt">
						<h4>OFS</h4>
						<p>
							<br>
							Online Follow-up System gives you a more clear sign on the whole project. You can view the progress, try the finished project and write conments to us.
						</p>
					</div>
					<div class="clearfix"></div>
				</div>
				<div role="tabpanel" class="tab-pane re-pad2" id="profile">
					<div class="col-md-6 re-flt">
						<img src="./images/tb3.jpg" alt="/" class="img-responsive"></div>
					<div class="col-md-6 re-flt re-xt">
						<h4>Lorem Ipsum is dummy text.</h4>
						<p>
							An unknown printer took a galley of type and scrambled it to make a type specimen book.
							<p></div>
							<div class="clearfix"></div>
						</div>
						<div role="tabpanel" class="tab-pane re-pad2" id="messages">
							<div class="col-md-6 re-flt">
								<img src="./images/tb2.jpg" alt="/" class="img-responsive"></div>
							<div class="col-md-6 re-flt re-xt">
								<h4>Lorem Ipsum is dummy text.</h4>
								<p>
									Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
								</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="footer">
			<div class="container">
				<div class="col-md-4 ft logo">
					<div class="logo fot">
						<h1>
							<a class="ft-log">Wangrunxin STU</a>
						</h1>
					</div>
				</div>
				<div class="col-md-4 ft cpyrt">
					<p>Wangrunxin.Studio All rights reserved.</p>
				</div>
				<!-- <div class="col-md-4 ft soc">
				-->
				<!-- <ul class="social">
				<li>
					<a href="#" class="face"></a>
				</li>
				<li>
					<a href="#" class="twit"></a>
				</li>
				<li>
					<a href="#" class="gplus"></a>
				</li>
				<li>
					<a href="#" class="inst"></a>
				</li>
				<li>
					<a href="#" class="pint"></a>
				</li>
			</ul>
			-->
			<!-- </div>
			-->
			<div class="clearfix"></div>
		</div>
	</div>
</body>
</html>