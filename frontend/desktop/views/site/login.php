<!DOCTYPE html>
<html>
<head>
<?php

Yii::app()->assets->registerCssForExtension('user_login_view', "css/normalize.css");
Yii::app()->assets->registerCssForExtension('user_login_view', "css/default.css");
Yii::app()->assets->registerCssForExtension('user_login_view', "css/styles.css");
Yii::app()->assets->registerScriptForExtension('user_login_view', "js/stopExecutionOnTimeout.js?t=1");
Yii::app()->assets->registerGlobalScript("custom.files/js/md5.js");
Yii::app()->assets->registerGlobalScript("global.style/js/jquery.cookie.js");
?>

</head>
<body>
<div class="cont">
	  <div class="demo">
	    <div class="login">
	      <div class="login__check">
	      </div>
	      <div class="login__form">
	      <p class="login__signup" id="error__message" >Login error</p>
	        <div class="login__row" id="icon__name">
	          <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
	            <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
	          </svg>
	          <input type="text"  id="username" class="login__input name" placeholder="用户名"/>
	        </div>
	        <div class="login__row" id="icon__password">
	          <svg class="login__icon pass svg-icon"  viewBox="0 0 20 20">
	            <path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
	          </svg>
	          <input type="password" id="password" class="login__input pass" placeholder="密码"/>
	        </div>
	        <button type="button" class="login__submit" id="button__submit" onclick="check();">登 录</button>
	      </div>
	    </div>
	    <div class="app">
	    </div>
	  </div>
	  </div>

	<script type="text/javascript">

	function check(){
		var check = true;
	    	if($("#username")[0].value == null || $("#username")[0].value == "" || $("#username")[0].value.length<3)
	    	{
	    		$("#icon__name").css("border-bottom", "1px solid rgba(255, 0, 0, 0.9)");
	    		$("#icon__name").fadeTo(100,0.0);
	    		$("#icon__name").fadeTo(100,1.0);
	    		check = false;
	    	}

	    	if($("#password")[0].value == null || $("#password")[0].value == "" || $("#password")[0].value.length<3)
	    	{
	    		$("#icon__password").css("border-bottom", "1px solid rgba(255, 0, 0, 0.9)");
	    		$("#icon__password").fadeTo(100,0.0);
	    		$("#icon__password").fadeTo(100,1.0);
	    		check = false;
	    	}

	    	if(check)
	    	{
	    		$("#icon__name").css("border-bottom", "1px solid rgba(255, 255, 255, 0.2)");
	    		$("#icon__password").css("border-bottom", "1px solid rgba(255, 255, 255, 0.2)");
	    	}

	    	return check;
	}

	$(document).keyup(function(event){
		if(event.keyCode ==13){
			$("#button__submit").trigger("click");
		}
	});

	$(document).ready(function () {
		$("#error__message").html("");
	    var animating = false,
	    submitPhase1 =200,
	    submitPhase2 = 400,
	    logoutPhase1 = 800,
	    $login = $('.login'),
	    $app = $('.app');
	    function ripple(elem, e) {
	        $('.ripple').remove();
	        var elTop = elem.offset().top, elLeft = elem.offset().left, x = e.pageX - elLeft, y = e.pageY - elTop;
	        var $ripple = $('<div class=\'ripple\'></div>');
	        $ripple.css({
	            top: y,
	            left: x
	        });
	        elem.append($ripple);
	    }
	    ;
	    $(document).on('click', '.login__submit', function (e) {

	    	if(!check())
	    	{
	    		return;
	    	}

	        if (animating)
	            return;
	        animating = true;
	        $("#error__message").html("");
	        var that = this;
	        ripple($(that), e);
	        $(that).addClass('processing');
	        $.ajax({
	        	type: "POST",
	        	data: "type=login_desktop&password=" + hex_md5($("#password").val()) + "&username=" + $("#username").val()+"&session=" + $.cookie('PHPSESSID'),
	        	url: "../site/ajax",
	        	beforeSend: function(XMLHttpRequest){
	        	},
	        	success: function(data, textStatus){
	        		var result = true;
	        		var htmldata = "";
	        		switch(data)
	        		{
	        			case "4":
	        			case 4:
	        			htmldata = "用户名或密码错误";
	        			result = false;
	        			break;
	        			case "3":
	        			case 3:
	        			htmldata = "用户名或密码错误";
	        			result = false;
	        			break;
	        			case "8":
	        			case 8:
	        			htmldata = "Session参数错误";
	        			result = false;
	        			break;
	        			case "3":
	        			case 3:
	        			htmldata = "用户名或密码错误";
	        			result = false;
	        			break;
	        			case "3":
	        			case 3:
	        			htmldata = "用户名或密码错误";
	        			result = false;
	        			break;
	        		}
	        		if(result)
	        		{
	        			setTimeout(function () {
	        			$(that).addClass('success');
	        			setTimeout(function () {
	        				$app.html(data);
	        				$app.show();
	        				$app.css('top');
	        				$app.addClass('active');
	        			}, submitPhase2 - 70);
	        			setTimeout(function () {
	        				$login.hide();
	        				$login.addClass('inactive');
	        				animating = false;
	        				$(that).removeClass('success processing');
	        			}, submitPhase2);
	        		}, submitPhase1);
	        		}else{
	        		$('.ripple').remove();
	        		 animating = true;
	        		 $(that).addClass('clicked');
	        		 setTimeout(function () {
	        		 	$app.removeClass('active');
	        		 	$login.show();
	        		 	$login.css('top');
	        		 	$login.removeClass('inactive');
	        		 	$(that).removeClass('success processing');
	        		 }, logoutPhase1 - 120);
	        		 setTimeout(function () {
	        		 	$app.hide();
	        		 	animating = false;
	        		 	$(that).removeClass('clicked');
	        		 	$("#error__message").html(htmldata);
	        		 }, logoutPhase1);
	        		}



	        	},
	        	complete: function(XMLHttpRequest, textStatus){
	        	},

	        	error: function(){
	        		 $('.ripple').remove();
	        		 animating = true;
	        		 $(that).addClass('clicked');
	        		 setTimeout(function () {
	        		 	$app.removeClass('active');
	        		 	$login.show();
	        		 	$login.css('top');
	        		 	$login.removeClass('inactive');
	        		 	$(that).removeClass('success processing');
	        		 }, logoutPhase1 - 120);
	        		 setTimeout(function () {
	        		 	$app.hide();
	        		 	animating = false;
	        		 	$(that).removeClass('clicked');
	        		 	$("#error__message").html("系统错误，请稍后再试");
	        		    $("#error__message").show();
	        		 }, logoutPhase1);
	        		}
	        	});
	    });
	    $(document).on('click', '.app__logout', function (e) {
	        if (animating)
	            return;
	        $('.ripple').remove();
	        animating = true;
	        var that = this;
	        $(that).addClass('clicked');
	        setTimeout(function () {
	            $app.removeClass('active');
	            $login.show();
	            $login.css('top');
	            $login.removeClass('inactive');
	        }, logoutPhase1 - 120);
	        setTimeout(function () {
	            $app.hide();
	            animating = false;
	            $(that).removeClass('clicked');
	        }, logoutPhase1);
	    });
	});
	</script>
	</body>
</html>