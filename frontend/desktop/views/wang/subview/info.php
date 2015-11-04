<?php
Yii::app()->assets->registerGlobalCss("extensions/tab.story/css/default.css");
Yii::app()->assets->registerGlobalCss("extensions/tab.story/css/component.css");
Yii::app()->assets->registerGlobalScript("extensions/tab.story/js/modernizr.custom.js");
Yii::app()->assets->registerGlobalScript("extensions/tab.story/js/jquery.cbpContentSlider.min.js", true);
?>
	<div class="main">
		<div id="cbp-contentslider" class="cbp-contentslider">
			<ul>
				<li id="slide1">
					<h3 class="icon-wolf">Basic</h3>
					<div>
						<div class="cbp-content wrx_content_class">
							<p>
								<img src="http://img02.taobaocdn.com/imgextra/i2/112258296/TB2Vbd3cVXXXXbcXXXXXXXXXXXX_!!112258296.jpg" width="133" height="181"></p>
							<p>
								WANG Runxin
								<br>
								Birthday: 1989/12/09
								<br>
								Email: wangrunxin@wangrunxin.com
								<br>
								Phone: (852)95658786
								<br><br><br>
								<a href="<?php echo Yii::app()->assets->getScirptPath('documents/cv.pdf');?>">click to download my resume.</a>
								<br></div>
						</div>
					</li>
					<li id="slide2">
						<h3 class="icon-rabbit">HighLight</h3>
						<div>
							<div class="cbp-content">
								<p>
									Excellent understanding and learning ability, Interested in  developing software, a person who love programming.
								</p>
								<p>
									<label>Experienced Programming language</label>
									<br>
									JAVA, PHP, C, C++, C#,  SQL, Objective-C.
									<br>
									<label>Experienced  development type</label>
									<br>
									Android app, windows application, webpage and server design.
									<br>
									<label>Experienced  development tools</label>
									<br>
									Eclipse, MySQL, Microsoft SQL server, Microsoft Visual  studio, Dreamweaver8.
									<br></p>
							</div>
						</div>
					</li>
					<li id="slide3">
						<h3 class="icon-aligator">Education</h3>
						<div>
							<div class="cbp-content">
								<p>
									<label>Hong Kong Baptist University</label>
									<br>
									01/09/2013 - 01/06/2014
									<br>
									Information Technology Management
									<br>Master</p>
								<p>
									<label>Fujian Normal University</label>
									<br>
									01/09/2009 -01/06/2013
									<br>
									Software Engineering
									<br>Bachelor</p>
							</div>
						</div>
					</li>
					<li id="slide4">
						<h3 class="icon-turtle">Experience</h3>
						<div>
							<div class="cbp-content">
								<p>
									<label>Web Devloper(Yii framework)</label>
									<br>
									2015/06/10 - now
									<br>
									HK Xgate Co., Ltd.
									<br>
									PHP; Javascript; Mysql.
									<br>regular employee</p>
								<p>
									<label>Web Devloper(Yii framework)</label>
									<br>
									2015/02/10 - 2015/05/18
									<br>
									HK Lokchong Co., Ltd.
									<br>
									PHP; Javascript; Mysql.
									<br>regular employee</p>
								<p>
									<label>Mobile Game Developer</label>
									<br>
									2014/08/11 - 2015/02/09
									<br>
									HK Four Direction and 4Play Co., Ltd.
									<br>
									C++ with Cocos2d-x engine; Xcode.
									<br>regular employee</p>
								<p>
									<label>Android Programmer</label>
									<br>
									2012/10/01 - 2013/02/01
									<br>
									Fitgame Digital Co., Ltd.
									<br>
									C++ with Cocos2d-x engine; Eclipse.
									<br>Fieldwork</p>
								<p>
									<label>Programmer</label>
									<br>
									2011/07/01 - 2011/09/01
									<br>
									Kaitian Digital Co., Ltd.
									<br>
									C#.
									<br>Fieldwork</p>
							</div>
						</div>
					</li>
					<li id="slide5">
						<h3 class="icon-platypus">Award</h3>
						<div>
							<div class="cbp-content">
								<p>
									<label>China Software Cup</label>
									<br>
									Date: 2012/08 Type: Competition
									<br>
									Subject: Android Application.
									<br>
									Award Class: Special-class award.
									<br>
									Awarding Institution: Chinese Ministry of Education and Chinese Ministry of Industry.
									<br></p>

								<p>
									<label>Oushi Software Cup</label>
									<br>
									Date: 2012/10 Type: Competition
									<br>
									Subject: E-payment System.
									<br>
									Award Class: Third-class award.
									<br>
									Awarding Institution: Oushi Software Cup Organizing Committee.
									<br></p>

								<p>
									<label>Scholarship</label>
									<br>
									Date: 2013/12 Type: Examination
									<br>
									Subject: E-payment System.
									<br>
									Award Class: Third-class award.
									<br>
									Awarding Institution: Fujian Normal University.
									<br></p>
							</div>
						</div>
					</li>
				</ul>
				<nav>
					<a href="#slide1" class="icon-wolf">
						<span>Resume</span>
					</a>
					<a href="#slide2" class="icon-rabbit">
						<span>High Light</span>
					</a>
					<a href="#slide3" class="icon-aligator">
						<span>Education</span>
					</a>
					<a href="#slide4" class="icon-turtle">
						<span>Experience</span>
					</a>
					<a href="#slide5" class="icon-platypus">
						<span>Award</span>
					</a>
				</nav>
			</div>
		</div>
	<script>
			$(function() {
				/*
				- how to call the plugin:
				$( selector ).cbpContentSlider( [options] );
				- options:
				{
					// default transition speed (ms)
					speed : 500,
					// default transition easing
					easing : 'ease-in-out',
					// current item's index
					current : 0
				}
				- destroy:
				$( selector ).cbpContentSlider( 'destroy' );
				*/

				$( '#cbp-contentslider' ).cbpContentSlider();
			});
		</script>