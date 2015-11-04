<!DOCTYPE HTML>
<html>
<head>
<title>Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript">
addEventListener("load", function() {
	setTimeout(hideURLbar, 0);
	}, false
);

function hideURLbar(){
	window.scrollTo(0,1);
}
</script>
<link href='http://fonts.useso.com/css?family=Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.useso.com/css?family=Playfair+Display+SC:400,700,900' rel='stylesheet' type='text/css'>
<?php
Yii::app()->assets->registerGlobalScript("global.style/js/fakeLoader.min.js", true);
Yii::app()->assets->registerGlobalScript("wang/js/data.js");
Yii::app()->assets->registerGlobalScript("wang/js/modernizr.custom.js");
Yii::app()->assets->registerGlobalScript("wang/js/move-top.js");
Yii::app()->assets->registerGlobalScript("wang/js/easing.js");
Yii::app()->assets->registerGlobalScript("wang/js/jquery.flexslider.js");
Yii::app()->assets->registerGlobalCss("wang/css/bootstrap.css");
Yii::app()->assets->registerGlobalCss("wang/css/style.css");
Yii::app()->assets->registerGlobalCss("wang/css/bootstrap.css");
Yii::app()->assets->registerGlobalCss("wang/css/flexslider.css");
Yii::app()->assets->registerGlobalCss("global.style/css/fakeLoader.css");
?>

		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},500);
				});
			});
		</script>
		<script type="text/javascript">
		$(document).ready(function() {
		<?php
// if (($vip == 1 && $showMessage == 1) || $showMessage == 2) {
// 	echo 'showMessageAlert("","' . $MessageData . '",null,null);';
// } else {
// 	echo '//no;
// 		';
// }
?>
	});

</script>

</head>
<body>
<!-- alert -->
<div class="fakeloader_body"><div class="fakeloader"></div></div>
<div id="alert_area" class="" style="display:none;">
<div class="j-ui-miniwindow pop w-9" style="color:black; z-index: 700; position: fixed; left: 10%; top: 20%; display: block;">
<div class="hd">
    <i class="close closeBtn" onclick="javascript:closeAlert();"></i>
    <span class="pop-title">Server Message</span>
</div>
<div class="bd">
    <div class="bd text-center">
        <div class="pop-detail" id="dialog_message_detials"></div>
    </div>
</div>
<div class="bd text-center">
<a id="dialog_message_button" href="javascript:void(0);" style="" class="dialog-btn closeTip">close<b class="btn-inner"></b></a>
</div>
</div>
</div>
<!-- alert -->
<!-- header -->
	<div class="banner">
		<div class="container">
				<div class="head-nav">
						<span class="menu"> </span>
							<ul class="cl-effect-7">
								<li><a href="#suites" class="scroll">Home</a></li>
								<li><a href="#suites" class="scroll">My Apps</a></li>
								<li><a href="#services" class="scroll">photos</a></li>
								<li><a href="#reservations" class="scroll">personal info</a></li>
								<li><a href="#contact" class="scroll">leave Message</a></li>
								<li><a href="#connect" class="scroll">contact</a></li>
									<div class="clearfix"> </div>
							</ul>
				</div>
					<!-- script-for-nav -->
					<script>
						$( "span.menu" ).click(function() {
						  $( ".head-nav ul" ).slideToggle(300, function() {
							// Animation complete.
						  });
						});
					</script>
				<!-- script-for-nav -->
				<div class="logo">
					<a href="index.wang"><img src="http://img01.taobaocdn.com/imgextra/i1/112258296/TB2POJtcVXXXXb1XpXXXXXXXXXX_!!112258296.png" class="img-responsive" alt="" /></a>
				</div>
				<div class="banner-info">
					<p>Welcome to WANG Runxin's Personal Website.</p>
				</div>
		</div>
	</div>
<!-- header -->
<!-- ENCHANTMENT  -->
	<div class="ENCHANTMENT" id="ourresort">
			<div class="col-md-6 ENCHANTMENT-left">
				<img src="http://img04.taobaocdn.com/imgextra/i4/112258296/TB2Lf0gcVXXXXbqXpXXXXXXXXXX_!!112258296.jpg" class="img-responsive" alt="">
			</div>
			<div class="col-md-6 ENCHANTMENT-right">
					<section class="slider">
						<div class="flexslider">
							<ul class="slides">
								<li>
									<div class="slider-info">
										<img src="http://img01.taobaocdn.com/imgextra/i1/112258296/TB2MJFtcVXXXXcqXpXXXXXXXXXX_!!112258296.png" class="img-responsive" alt="">
										<h3>Experienced developer</h3>
										<p>As a man who loves programming, I enjoy the process of development. I started to develop mobile apps since 2010 and then I won my first prize by an Android app. So far, I have 5 years experience on Andriod and IOS platform.</p>
									</div>
								</li>
								<li>
									<div class="slider-info">
										<img src="http://img03.taobaocdn.com/imgextra/i3/112258296/TB2CdXHcVXXXXa7XXXXXXXXXXXX_!!112258296.png" class="img-responsive" alt="">
										<h3>Optimistic</h3>
										<p>I'm an optimistic boy. In the face of adversity, I believe the things will allways get better if I work hard. The faith supports me to move forward and that's why I can endure more pressure at work.</p>
									</div>
								</li>
								<li>
									<div class="slider-info">
										<img src="http://img03.taobaocdn.com/imgextra/i3/112258296/TB2QxJMcVXXXXbzXXXXXXXXXXXX_!!112258296.png" class="img-responsive" alt="">
										<h3>Responsibility</h3>
										<p>Responsibility is the most important thing my father taught me since I was a child. It's both significant in life and work. Fortunately, I have a responsible father.</p>
									</div>
								</li>
							</ul>
						</div>
					</section>
						<!-- FlexSlider -->

							  <script type="text/javascript">
								// $(function(){
								//   SyntaxHighlighter.all();
								// });
								$(window).load(function(){
								  $('.flexslider').flexslider({
									animation: "slide",
									start: function(slider){
									  $('body').removeClass('loading');
									}
								  });
								});
							  </script>
						<!-- FlexSlider -->
	<!-- slider -->
			</div>
			<div class="clearfix"> </div>
	</div>
<!-- ENCHANTMENT  -->
<!-- rooms -->
	<div class="rooms" id="suites">
		<div class="col-md-3 rooms-1">
		<img src="http://img02.taobaocdn.com/imgextra/i2/112258296/TB2CNNucVXXXXaPXpXXXXXXXXXX_!!112258296.jpg" class="img-responsive" alt="" style="width: 100%; max-width: 400px">
		</div>
		<div class="col-md-2">
		    <div class="room-info">
			    <img src="http://img02.taobaocdn.com/imgextra/i2/112258296/TB2574ScVXXXXX3XXXXXXXXXXXX_!!112258296.png" class="img-responsive" alt="">
			    </br></br>
				<h4>Ms.c. Project</h4>
				<p>OAuth provides a process for end-users to authorize third-party access to their server resources without sharing their credentials, using user-agent redirections. This demo application uses a vulnerability to connect to the Oauth privoder's server.</p>

			</div>
		</div>
		<div class="col-md-3 rooms-1">
		<img src="http://img03.taobaocdn.com/imgextra/i3/112258296/TB2WpXFcVXXXXXeXpXXXXXXXXXX_!!112258296.png" class="img-responsive" alt="" style="width: 90%; max-width: 400px;">
		</div>
		<div class="col-md-2">
		    <div class="room-info">
			    <img src="http://img02.taobaocdn.com/imgextra/i2/112258296/TB2574ScVXXXXX3XXXXXXXXXXXX_!!112258296.png" class="img-responsive" alt="">
			    </br>
				<h4>Car Sharing App</h4>
				<p>Car sharing app on IOS.</br>(Part-time Job)</p>
			</div>
		</div>
		<div class="col-md-2 rooms-1 center-modle">
		    <h3>Other Softwares</h3>
		    <div class="room-info-top">
		        <img src="http://img04.taobaocdn.com/imgextra/i4/112258296/TB2t0hzcVXXXXXjXpXXXXXXXXXX_!!112258296.jpg" class="img-responsive" style="width: 100%;" alt="">
		        </br></br>
		        <img src="http://img04.taobaocdn.com/imgextra/i4/112258296/TB2IfBycVXXXXaTXpXXXXXXXXXX_!!112258296.jpg" style="width: 100%;" alt="">
		        </br></br>
				<p>More Info About My Software?</p>
				<div class="room-info1">
					<ul style="vertical-align: center;">
						<li><a href="framework/type/project"><i class="search"></i>Read More</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="clearfix"> </div>
	</div>
<!-- rooms -->
<!-- services -->
	<div class="wonder" id="services">
		<div class="col-md-2 wonder-left">
			<img src="http://img02.taobaocdn.com/imgextra/i2/112258296/TB26spNcVXXXXbFXXXXXXXXXXXX_!!112258296.png" style="height: 100%" class="img-responsive" alt="">
		</div>
		<div class="col-md-4 wonder-mid">
			<img src="http://img02.taobaocdn.com/imgextra/i2/112258296/TB2574ScVXXXXX3XXXXXXXXXXXX_!!112258296.png" class="img-responsive" alt="">
			<h5>Photos</h5>
			<h3>Wonderful life</h3>
			<p>Hong Kong is a very beautiful place. I enjoy the life here. Also, I travel around to see all the wonderful world. Welcome to view my photos.</br><a style="color:red" href="framework/type/gallery">more</a></p>
		</div>
		<div class="col-md-6 wonder-right">
			<img src="http://img01.taobaocdn.com/imgextra/i1/112258296/TB2n2tPcVXXXXaPXXXXXXXXXXXX_!!112258296.png" class="img-responsive" alt="">
		</div>
			<div class="clearfix"> </div>
	</div>
<!-- wonder -->
<!-- personal -->
	<div class="services" id="reservations">
		<div class="col-md-6 myInfo-left">
		    <div class="contact-left1">
			</div>
		</div>
		<div class="col-md-6 services-left">
			<img src="http://img02.taobaocdn.com/imgextra/i2/112258296/TB2574ScVXXXXX3XXXXXXXXXXXX_!!112258296.png" class="img-responsive" alt="">
			<h2>Personal Info</h2>
			<div class="col-md-3 services-left1">
				<h5>Education</h5>
					<ul>
						<li><a style="color:gray">2009-2013</a></li>
						<li><a href="http://www.fjnu.edu.cn" target="blank">Fujian Normal University</a></li>
						<li><a style="color:gray">2013-2014</a></li>
						<li><a href="http://www.hkbu.edu.hk" target="blank">Hong Kong Baptist University</a></li>
					</ul>
			</div>
			<div class="col-md-3 services-left1">
				<h5>Award</h5>
				<ul>
						<li><a style="color:gray">2012</a></li>
						<li><a href="http://www.cnsoftbei.com/bencandy.php?fid=42&id=775" target="blank">Special-class award of China Software Cup</a></li>
						<li><a style="color:gray">2012</a></li>
						<li><a >Third-class award of Oushi Software Cup </a></li>
						<li><a style="color:gray">2013</a></li>
						<li><a >Scholarship of Fujian Normal University </a></li>
				</ul>
			</div>
			<div class="col-md-3 services-left1">
			    <h5>Employment</h5>
				<ul>
						<li><a style="color:gray">2015/02-Now</a></li>
						<li><a >Lokchong Co., Ltd.</a></li>
						<li><a >Hung Hom, Hong Kong</a></li>
						<li><a style="color:gray">2014/08-2015/02</a></li>
						<li><a href="http://4play.com.hk" target="blank">Four Direction / 4 Play Studio</a></li>
						<li><a >Kwun Tong, Hong Kong</a></li>
						<li><a style="color:gray">2012/10-2013/01</a></li>
						<li><a >Fitgame Digital Co., Ltd.</a></li>
						<li><a >Nanjing, China</a></li>
				</ul>
			</div>
			<div class="col-md-3 services-left1">
				<h5>About me</h5>
				<p>Excellent understanding and learning ability. </br>Interested in developing software. </br>A person who loves programming. </br><a style="color:red" href="framework/type/about">more</a></p>
			</div>
		</div>
			<div class="clearfix"> </div>
	</div>
<!-- personal -->
<!-- contact -->
	<div class="contact" id="contact">
		<div class="col-md-8 contact-right">
		    <div class="contact-title">
	            <img src="http://img02.taobaocdn.com/imgextra/i2/112258296/TB2574ScVXXXXX3XXXXXXXXXXXX_!!112258296.png" class="img-responsive" alt="">
			    <h3 style="color: black">LEAVE MESSAGE</h3>
	        </div>
			<div class="contact-details">
				<h3>CONTACT DETAILS</h3>
				<div class="text-field-name-1">
						<form>
							<input id="ipt_name" type="text" class="text" placeholder=" Name*" autocomplete="off">
							<input id="ipt_email" type="text" class="text" placeholder=" Email*" autocomplete="off">
							<input id="ipt_phone" type="text" class="text" placeholder=" Phone" autocomplete="off">
						</form>
				</div>
			</div>
			<div class="reservation-details">
			<h3>Message DETAILS</h3>
				<div class="text-field-name-1">
						<form>
							<textarea id="ipt_message" class="textarea-body" placeholder=" Message*" autocomplete="off"></textarea>
							<input id="ipt_code" type="text" class="text" placeholder=" Code*" autocomplete="off">
							<img src="php/code_math.php" id="getcode_math" style="margin-left: 10px;" title="change another" align="absmiddle">
						</form>

				</div>
			</div>
				<div class="clearfix"> </div>
				<div class="button">
						<form>
							<input id="bt_message" type="button" value="leave message">
							<label style="display:none;" class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Privacy</label>
						</form>
					</div>
		</div>
		<div class="col-md-4 contact-left">
		    <div class="contact-left1">
			</div>
		</div>
			<div class="clearfix"> </div>
	</div>
<!-- contact -->
<!-- guests -->
	<div class="guests" id="connect">
		<div class="container">
			<img src="http://img01.taobaocdn.com/imgextra/i1/112258296/TB2B9lUcVXXXXXzXXXXXXXXXXXX_!!112258296.png" class="img-responsive" alt="">
			<h3>BE MY FRIEND</h3>
			<p>Welcome to contact me by the website or the information listed below. </br>I truly want to be your sincere friend.</p>
		</div>
	</div>
<!-- guests -->
<!-- footer -->
	<div class="footer">
		<div class="col-md-6 footer-left">
		<img src="http://img03.taobaocdn.com/imgextra/i3/112258296/TB2KvJRcVXXXXaqXXXXXXXXXXXX_!!112258296.png" class="img-responsive" alt="">
			<div class="col-tp-6 footer-left1">
				<img src="http://img01.taobaocdn.com/imgextra/i1/112258296/TB2B9lUcVXXXXXzXXXXXXXXXXXX_!!112258296.png" class="img-responsive" alt="">
			</div>
			<div class="col-md-6 footer-left2">
				<ul style="color: black">
					<li>Flat 3, 15/F</li>
					<li>Beautiful Garden</li>
					<li>No.11, Chui Lok Street</li>
					<li>Tai Po, Hong Kong</p></li>
				</ul>
				<p>+852 95658786</p>
				<h6><a href="mailto:wangrunxin@wangrunxin.com">wangrunxin@wangrunxin.com</a></h6>
			</div>
				<div class="clearfix"> </div>
					<div class="footer-left3" style="display:none">
						<ul>
							<li><a href="#"><i class="fb"></i></a></li>
							<li><a href="#"><i class="twt"></i></a></li>
							<li><a href="#"><i class="goop"></i></a></li>
							<li><a href="#"><i class="in"></i></a></li>
							<li><a href="#"><i class="do"></i></a></li>
							<li><a href="#"><i class="drib"></i></a></li>
							<li><a href="#"><i class="tet"></i></a></li>
								<div class="clearfix"> </div>
						</ul>
					</div>
		</div>
		<div class="col-md-6 footer-right" style="text-align: center;">
			<p>Benvenuto al Mio SITO</br>Auguro un giorno Felice.</br>-<span>WANG Runxin-</span></p>
			<div class="col-md-6 footer-right1">
				<img src="http://img04.taobaocdn.com/imgextra/i4/112258296/TB2SO4DcVXXXXXrXpXXXXXXXXXX_!!112258296.png" style="width:95px;height:128px;" class="img-responsive" alt="">
				<h4 class="none">Personal Website</h4>
			</div>
			<div class="col-md-6 footer-right2">
				<img src="http://img02.taobaocdn.com/imgextra/i2/112258296/TB2tCjtcVXXXXXnXpXXXXXXXXXX_!!112258296.png" style="width:128px;height:128px;" class="img-responsive" alt=""></br>
				<a href="http://mail.wangrunxin.com" target="_blank"><h4 class="none">Email Provider</h4></a>
			</div>
				<div class="clearfix"> </div>

		</div>
			<div class="clearfix"> </div>
	</div>

	<h3 style="text-align: center">Copyrights © 2015 WANG Runxin All rights reserved | wangrunxin.com</h3>
	<a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 0;"></span> <span id="toTopHover" style="opacity: 0;"> </span></a>
<!-- footer -->
<!-- dialog -->
    <script>
        $(document).ready(function(){
            $(".fakeloader").fakeLoader({
                timeToHide:2500,
                bgColor:"#3498db",
                spinner:"spinner1"
            });
        });
</script>
<!-- dialog -->
</body>
</html>