<?php
Yii::app()->assets->registerCssForExtension('admin_login_view', "css/normalize.css");
Yii::app()->assets->registerCssForExtension('admin_login_view', "css/default.css");
Yii::app()->assets->registerCssForExtension('admin_login_view', "css/styles.css");
Yii::app()->assets->registerGlobalScript('custom.files/js/md5.js');
?>
<script type="text/javascript">
$(document).ready(function(){
   $(".login").on('click', function(){
    $("#password").val(hex_md5($("#password").val()));
  });
});

</script>>
<div id="logo">
  <h1 class="hogo"><i> wangrunxin.com</i></h1>
</div>
<section class="stark-login">
  <form action="" method="POST" name="LoginForm">
    <div id="fade-box">
      <input type="text" name="username" id="username" placeholder="Username" <?php
if (!is_null($model->username)) {
	echo 'value="' . $model->username . '"';
}
?>required>
        <input type="password" name="password" id="password" placeholder="Password" required>
          <button class="login" >登录</button>
        </div>
      </form>
      <div class="hexagons">
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <br>
          <span>&#x2B22;</span>
          <span>&#x2B22;</span>
          <span>&#x2B22;</span>
          <span>&#x2B22;</span>
          <span>&#x2B22;</span>
          <span>&#x2B22;</span>
          <span>&#x2B22;</span>
          <span>&#x2B22;</span>
          <span>&#x2B22;</span>
          <span>&#x2B22;</span>
          <span>&#x2B22;</span>
          <br>
            <span>&#x2B22;</span>
            <span>&#x2B22;</span>
            <span>&#x2B22;</span>
            <span>&#x2B22;</span>
            <span>&#x2B22;</span>
            <span>&#x2B22;</span>
            <span>&#x2B22;</span>
            <span>&#x2B22;</span>
            <span>&#x2B22;</span>
            <span>&#x2B22;</span>
            <span>&#x2B22;</span>
            <span>&#x2B22;</span>

            <br>
              <span>&#x2B22;</span>
              <span>&#x2B22;</span>
              <span>&#x2B22;</span>
              <span>&#x2B22;</span>
              <span>&#x2B22;</span>
              <span>&#x2B22;</span>
              <span>&#x2B22;</span>
              <span>&#x2B22;</span>
              <span>&#x2B22;</span>
              <span>&#x2B22;</span>
              <span>&#x2B22;</span>
              <br>
                <span>&#x2B22;</span>
                <span>&#x2B22;</span>
                <span>&#x2B22;</span>
                <span>&#x2B22;</span>
                <span>&#x2B22;</span>
                <span>&#x2B22;</span>
                <span>&#x2B22;</span>
                <span>&#x2B22;</span>
                <span>&#x2B22;</span>
                <span>&#x2B22;</span>
                <span>&#x2B22;</span>
                <span>&#x2B22;</span>
              </div>
        </section>

        <div id="circle1">
          <div id="inner-cirlce1">
            <h2> </h2>
          </div>
        </div>
    <ul>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
    </ul>
	<header class="htmleaf-header">
			<h1>Admin | Login</h1>
		</header>