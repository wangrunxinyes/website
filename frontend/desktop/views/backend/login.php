<?php

Yii::app()->
	assets->registerCss('global/plugins/font-awesome/css/font-awesome.min.css');

Yii::app()->assets->registerCss('global/plugins/simple-line-icons/simple-line-icons.min.css');

Yii::app()->assets->registerCss('global/plugins/bootstrap/css/bootstrap.min.css');

Yii::app()->assets->registerCss('global/plugins/uniform/css/uniform.default.css');

Yii::app()->assets->registerCss('global/plugins/select2/select2.css');

Yii::app()->assets->registerCss('admin/pages/css/login-soft.css');

Yii::app()->assets->registerCss('global/css/components.css');

Yii::app()->assets->registerCss('global/css/plugins.css');

Yii::app()->assets->registerCss('admin/layout/css/layout.css');

Yii::app()->assets->registerCss('admin/layout/css/themes/darkblue.css');

Yii::app()->assets->registerScript('global.style/js/jquery.cookie.js');

Yii::app()->assets->registerScript('custom.files/js/md5.js');

Yii::app()->assets->registerScript('custom.files/js/handle.login.js');

Yii::app()->assets->registerScript('global/plugins/jquery-migrate.min.js');

Yii::app()->assets->registerScript('global/plugins/bootstrap/js/bootstrap.min.js');

Yii::app()->assets->registerScript('global/plugins/jquery.blockui.min.js');

Yii::app()->assets->registerScript('global/plugins/uniform/jquery.uniform.min.js');

Yii::app()->assets->registerScript('global/plugins/jquery.cokie.min.js');

Yii::app()->assets->registerScript('global/plugins/jquery-validation/js/jquery.validate.min.js');

Yii::app()->assets->registerScript('global/plugins/backstretch/jquery.backstretch.min.js');

Yii::app()->assets->registerScript('global/plugins/select2/select2.min.js');

Yii::app()->assets->registerScript('global/scripts/metronic.js');

Yii::app()->assets->registerScript('admin/layout/scripts/layout.js');

Yii::app()->assets->registerScript('admin/layout/scripts/demo.js');

Yii::app()->assets->registerScript('admin/pages/scripts/login-soft.js');

Yii::app()->assets->registerScript('custom.files/js/handle.login.js');

?>
<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="utf-8"/>

  <title>Login|登陆</title>

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>

  <meta http-equiv="Content-type" content="text/html; charset=utf-8">

  <!-- END THEME STYLES -->

</head>

  <!-- END HEAD -->

  <!-- BEGIN BODY -->

<body class="login">

  <!-- BEGIN LOGO -->

  <!-- <div class="logo">

  <a>

    <img src="<?php echo Yii::app()->baseUrl; ?>/assets/admin/layout/img/logo-big.png" alt=""/></a>

</div>
-->
<!-- END LOGO -->

<!-- BEGIN SIDEBAR TOGGLER BUTTON -->

<input type="hidden" value="<?php echo Yii::app()->
	request->hostInfo . Yii::app()->homeUrl; ?>data/login" id="login_url"/>
<input type="hidden" value="<?php echo Yii::app()->
	request->hostInfo . Yii::app()->homeUrl; ?>data/code/rnd/" id="login_code_url"/>
<input type="hidden" value="<?php

$redirect_url = Yii::app()->
	data->getValue('redirect');

if ($redirect_url != null) {

	echo $redirect_url;

} else {

	echo Yii::app()->request->hostInfo . Yii::app()->homeUrl . "backend/";

}

?>" id="redirect_url"/>
<div class="menu-toggler sidebar-toggler"></div>

<div id="hidden_form" style="display:none"></div>

<!-- END SIDEBAR TOGGLER BUTTON -->

<!-- BEGIN LOGIN -->

<div class="content">

  <!-- BEGIN LOGIN FORM -->

  <div id ="info" class="copyright"></div>

  <div id ="mainbody">

    <form class="login-form">

      <h3 class="form-title">登陆您的账户</h3>

      <div class="alert alert-info"  style="display:none"></div>

      <div class="alert alert-danger display-hide">

        <button class="close" data-close="alert"></button>

        <span>请输入您的用户名和密码.</span>

      </div>

      <div class="form-group">

        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->

        <label class="control-label visible-ie8 visible-ie9">用户名</label>

        <div class="input-icon"> <i class="fa fa-user"></i>

          <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="用户名" name="login_username" id="login_username"/>

        </div>

      </div>

      <div class="form-group">

        <label class="control-label visible-ie8 visible-ie9">密码</label>

        <div class="input-icon"> <i class="fa fa-lock"></i>

          <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="密码" name="login_password" id="login_password"/>

        </div>

      </div>

      <div class="form-group" id="hidden_code" style="display:none">

        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->

        <label class="control-label visible-ie8 visible-ie9">验证码</label>

        <div class="input-icon">

          <i class="fa fa-check-circle-o"></i>

          <input class="form-control placeholder-no-fix" style="width:50%" type="text" autocomplete="off" placeholder="验证码" name="login_code" id="login_code"/>

          <img id="hidden_code_img" alt=""/>

        </div>

      </div>

      <div class="form-actions" style="height:32px">

        <p>

          <button type="button" data-type="login-trigger" style="width:100%" class="btn blue pull-right">
            登陆
            <i class="m-icon-swapright m-icon-white"></i>

          </button>

        </p>

      </div>

      <div class="forget-password">

        <p>版本信息&nbsp;
          <a href="<?php echo Yii::app()->assets->getUrlPath('backend/aboutus') ?>" id="">关于后台管理系统</a>
        </p>

      </div>

      <div class="create-account">

        <div class="copyright">

          <p>&nbsp; WANG RUNXIN AUTH CENTER</p>

        </div>

      </div>

    </form>

  </div>

  <!-- END LOGIN FORM -->

  <!-- BEGIN FORGOT PASSWORD FORM -->

  <form class="forget-form" action="index.html" method="post">

    <h3>忘记密码 ?</h3>

    <p>请输入您的电子邮箱地址来重设密码.</p>

    <div class="form-group">

      <div class="input-icon">

        <i class="fa fa-envelope"></i>

        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/>

      </div>

    </div>

    <div class="form-actions">

      <button type="button" id="back-btn" class="btn">

        <i class="m-icon-swapleft"></i>
        返回
      </button>

      <button type="submit" class="btn blue pull-right">
        提交
        <i class="m-icon-swapright m-icon-white"></i>

      </button>

    </div>

  </form>

  <!-- END FORGOT PASSWORD FORM -->

  <!-- BEGIN REGISTRATION FORM -->

  <form class="register-form" action="index.html" method="post">

    <h3>注册账号</h3>

    <p>请填写账号信息:</p>

    <div class="form-group">

      <label class="control-label visible-ie8 visible-ie9">用户名</label>

      <div class="input-icon">

        <i class="fa fa-user"></i>

        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="用户名" name="username"/>

      </div>

    </div>

    <div class="form-group">

      <label class="control-label visible-ie8 visible-ie9">密码</label>

      <div class="input-icon">

        <i class="fa fa-lock"></i>

        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="密码" name="password"/>

      </div>

    </div>

    <div class="form-group">

      <label class="control-label visible-ie8 visible-ie9">请再次输入您的密码</label>

      <div class="controls">

        <div class="input-icon">

          <i class="fa fa-check"></i>

          <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="请再次输入您的密码" name="rpassword"/>

        </div>

      </div>

    </div>

    <p>请填写个人信息，以便我们为您提供更好的服务:</p>

    <div class="form-group">

      <label class="control-label visible-ie8 visible-ie9">您的姓名</label>

      <div class="input-icon">

        <i class="fa fa-font"></i>

        <input class="form-control placeholder-no-fix" type="text" placeholder="您的姓名" name="fullname"/>

      </div>

    </div>

    <div class="form-group">

      <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->

      <label class="control-label visible-ie8 visible-ie9">电子邮件地址</label>

      <div class="input-icon">

        <i class="fa fa-envelope"></i>

        <input class="form-control placeholder-no-fix" type="text" placeholder="电子邮件地址" name="email"/>

      </div>

    </div>

    <div class="form-group">

      <label class="control-label visible-ie8 visible-ie9">常用地址</label>

      <div class="input-icon">

        <i class="fa fa-check"></i>

        <input class="form-control placeholder-no-fix" type="text" placeholder="常用地址" name="address"/>

      </div>

    </div>

    <div class="form-group">

      <label class="control-label visible-ie8 visible-ie9">请填写城市</label>

      <div class="input-icon">

        <i class="fa fa-location-arrow"></i>

        <input class="form-control placeholder-no-fix" type="text" placeholder="城市" name="city"/>

      </div>

    </div>

    <div class="form-group">

      <label>

        <input type="checkbox" name="tnc"/>
        我已经阅读并同意网站
        <a href="#">服务条款</a>
        和
        <a href="#">隐私保护协议</a>

      </label>

      <div id="register_tnc_error"></div>

    </div>

    <div class="form-actions">

      <button id="register-back-btn" type="button" class="btn">

        <i class="m-icon-swapleft"></i>
        返回登陆
      </button>

      <button type="submit" id="register-submit-btn" class="btn blue pull-right">
        注册
        <i class="m-icon-swapright m-icon-white"></i>

      </button>

    </div>

  </form>

  <!-- END REGISTRATION FORM -->

</div>

<!-- END LOGIN -->

<!-- BEGIN COPYRIGHT -->

<div class="copyright"></div>

<!-- END COPYRIGHT -->

<script>







jQuery(document).ready(function() {







  Metronic.init(); // init metronic core components







  Layout.init(); // init current layout







  Login.init();







  Demo.init();







       // init background slide images







       $.backstretch([







        "<?php echo Yii::app()->assets->getScirptPath('admin/pages/media/bg/1.jpg'); ?>",







        "<?php echo Yii::app()->assets->getScirptPath('admin/pages/media/bg/2.jpg'); ?>",







        "<?php echo Yii::app()->assets->getScirptPath('admin/pages/media/bg/3.jpg'); ?>",







        "<?php echo Yii::app()->assets->getScirptPath('admin/pages/media/bg/4.jpg'); ?>"







        ], {







          fade: 1000,







          duration: 8000







    }







    );







});function BindEnter(obj)







{







    if(obj.keyCode == 13)







        {







          login();







        }







}















</script>

<!-- END JAVASCRIPTS -->

</body>

<!-- END BODY -->

</html>