<?php



//include css



Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/assets/frame.layout/css/popup.reset.css");



Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/assets/frame.layout/css/popup.style.css");



Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/assets/extensions/login.frame/css/style.css");



//include js;



Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/assets/global.style/js/jquery.min.js");



Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/assets/global.style/js/jquery.cookie.js");



Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/assets/custom.files/js/md5.js");



Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/assets/extensions/login.frame/js/login.js");



Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/assets/frame.layout/js/popup.modernizr.js");



Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/assets/extensions/login.frame/js/ChunkFive_400.font.js");



Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/assets/extensions/login.frame/js/cufon-yui.js");



?>



<div class="cd-popup" role="alert">



<div class="cd-popup-container" style="box-shadow: 0px 0px 0px; background-color: transparent; max-width:60%; width:60%; max-height:50%; height:50%; boder:none;">



	<div class="content">



				<div id="form_wrapper" class="form_wrapper">

				<a href="#0" id='wrx_login_form_bt' rel="login" class="linkform" style="display:none">Close</a>

				<a class="cd-modal-close" id='wrx_close_form_bt' ></a>



					<form class="register">



						<h3>注册</h3>



						<div class="column">



							<div>



								<label>姓氏</label>



								<input type="text" />



								<span class="error">This is an error</span>



							</div>



							<div>



								<label>名字</label>



								<input type="text" />



								<span class="error">This is an error</span>



							</div>



							<div>



								<label>地址</label>



								<input type="text" value=""/>



								<span class="error">This is an error</span>



							</div>



						</div>



						<div class="column">



							<div>



								<label>用户名</label>



								<input type="text"/>



								<span class="error">This is an error</span>



							</div>



							<div>



								<label>电子邮件</label>



								<input type="text" />



								<span class="error">This is an error</span>



							</div>



							<div>



								<label>密码</label>



								<input type="password" />



								<span class="error">This is an error</span>



							</div>



						</div>



						<div class="bottom">



							<input type="submit" value="注册" />



							<a href="index.html" rel="login" class="linkform">已经有账户？点击这里登录</a>



							<div class="clear"></div>



						</div>



					</form>



					<form class="login active">



						<h3>登录</h3>



						<div><a href="#0" id='wrx_login_close_bt' class="cd-login-close img-replace">Close</a></div>



						<div>



							<input type="text" id="wrx_username" PlaceHolder="用户名"/>



							<span class="error">This is an error</span>



						</div>



						<div>



							<input type="password" id="wrx_password" PlaceHolder="登录密码"/>



							<span class="error">This is an error</span>



						</div>



						<div id="wrx_hidden_code" style="display:none;">



						    <img id="wrx_code_img" class="wrx_code_popup">



							<input type="text" id="wrx_code" PlaceHolder="验证码"/>



							<span class="error">This is an error</span>



						</div>



						<div style="margin-top: -15px;">

						    <label id="info" style="display:none;"></label>

							<a href="#" rel="forgot_password" class="linkform">忘记密码?</a>

						</div>



						<div class="bottom">



							<input type="submit" class="wrx_login_bt" readonly="true" value="登录" />



							<input id="wrx_login_bt" type="hidden" rel="process" class="linkform">



							<input type="cancel" readonly="true" class="cd-popup-close wrx_popup_close" value="取消" />



							<a href="#" rel="register" class="linkform">还没有账户？快速注册</a>



							<div class="clear"></div>



						</div>



					</form>



					<form class="process">



					    <div ng-spinner-bar class='page-spinner-bar'>



					        <div class='bounce1'></div>



					        <div class='bounce2'></div>



					        <div class='bounce3'></div>



					        <p class='process-info' id="wrx_process_info">登录中，请稍后</p>



					    </div><!-- END PAGE SPINNER -->



					</form>



					<form class="forgot_password">



						<h3>忘记密码</h3>



						<div>



							<label>请输入用户名或邮箱</label>



							<input type="text" />



							<span class="error">This is an error</span>



						</div>



						<div class="bottom">



							<input type="submit" value="找回密码" />



							<a href="index.html" rel="login" class="linkform">返回登录</a>



							<a href="register.html" rel="register" class="linkform">还没有账户？点击注册</a>



							<div class="clear"></div>



						</div>



					</form>



				</div>



				<div class="clear"></div>



			</div>



			</div>



		</div>



		<!-- The JavaScript -->



		<script type="text/javascript" src="http://libs.useso.com/js/jquery/1.4.2/jquery.min.js"></script>



		<script type="text/javascript">



			$(function() {



					//the form wrapper (includes all forms)



				var $form_wrapper	= $('#form_wrapper'),



					//the current form is the one with class active



					$currentForm	= $form_wrapper.children('form.active'),



					//the change form links



					$linkform		= $form_wrapper.find('.linkform');







				//get width and height of each form and store them for later



				$form_wrapper.children('form').each(function(i){



					var $theForm	= $(this);



					//solve the inline display none problem when using fadeIn fadeOut



					if(!$theForm.hasClass('active'))



						$theForm.hide();



					$theForm.data({



						width	: $theForm.width(),



						height	: $theForm.height()



					});



				});







				//set width and height of wrapper (same of current form)



				setWrapperWidth();







				/*



				clicking a link (change form event) in the form



				makes the current form hide.



				The wrapper animates its width and height to the



				width and height of the new current form.



				After the animation, the new form is shown



				*/



				$linkform.bind('click',function(e){



					var $link	= $(this);



					var target	= $link.attr('rel');



					$currentForm.fadeOut(400,function(){



						//remove class active from current form



						$currentForm.removeClass('active');



						//new current form



						$currentForm= $form_wrapper.children('form.'+target);



						//animate the wrapper



						$form_wrapper.stop()



									 .animate({



										width	: $currentForm.data('width') + 'px',



										height	: $currentForm.data('height') + 'px'



									 },500,function(){



										//new form gets class active



										$currentForm.addClass('active');



										//show the new form



										$currentForm.fadeIn(400);



									 });



					});



					e.preventDefault();



				});







				function setWrapperWidth(){



					$form_wrapper.css({



						width	: $currentForm.data('width') + 'px',



						height	: $currentForm.data('height') + 'px'



					});



				}







				/*



				for the demo we disabled the submit buttons



				if you submit the form, you need to check the



				which form was submited, and give the class active



				to the form you want to show



				*/



				$form_wrapper.find('input[type="submit"]')



							 .click(function(e){



								e.preventDefault();



							 });



			});



        </script>



</div> <!-- cd-popup -->







<script src="<?php echo Yii::app()->baseUrl . '/assets/frame.layout/';?>js/popup.js"></script> <!-- Resource jQuery -->