<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo CHtml::encode($this->pageTitle);?></title>
    <?php
Yii::app()->
	assets->registerGlobalCss("extensions/fullscren.choices/css/normalize.css");
Yii::app()->assets->registerGlobalCss("extensions/fullscren.choices/css/default.css");
Yii::app()->assets->registerGlobalCss("extensions/fullscren.choices/css/main.css");
Yii::app()->assets->registerGlobalCss("extensions/fullscren.choices/dist/jquery.fatNav.min.css");
Yii::app()->assets->registerGlobalScript("extensions/fullscren.choices/dist/jquery.fatNav.min.js", true);
Yii::app()->assets->registerGlobalScript("extensions/fullscren.choices/js/main.js", true);
?>
</head>
<body>
    <header class="wrx_top_bar">
        <img src="<?php echo Yii::app()->
	assets->getScirptPath('global.style/img/logo1.png');?>">
        <h4>wangrunxin</h4>
    </header>
    <div class="fat-nav">
        <div class="fat-nav__wrapper">
            <ul>
                <li>
                    <a href="<?php echo Yii::app()->assets->getUrlPath('wang/index')?>">Home | 主页</a>
                </li>
                <li>
                    <a href="<?php echo Yii::app()->assets->getUrlPath('/wang/framework/type/project')?>">Projects | 项目</a>
                </li>
          <!--       <li>
                    <a href="/wang/framework/type/gallery">Gallery | 相册</a>
                </li> -->
                <li>
                    <a href="<?php echo Yii::app()->assets->getUrlPath('/wang/framework/type/about')?>">About | 关于我</a>
                </li>
                <li>
                    <a href="<?php echo Yii::app()->assets->getUrlPath('/wang/framework/type/contact')?>">Contact | 联系我</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="container">
        <?php echo $content;?></div>
</body>
</html>