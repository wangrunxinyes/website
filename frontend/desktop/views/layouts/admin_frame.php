<!DOCTYPE html>

<html lang="en" class="no-js">

<head>

  <meta charset="utf-8"/>

  <title><?php echo CHtml::encode($this->pageTitle); ?></title>

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta content="width=device-width, initial-scale=1" name="viewport"/>

  <meta content="" name="description"/>

  <meta content="" name="author"/>

  <!-- BEGIN GLOBAL MANDATORY STYLES -->

  <?php

Yii::app()->
	assets->registerGlobalCss('global/plugins/font-awesome/css/font-awesome.min.css');

Yii::app()->assets->registerGlobalCss('global/plugins/simple-line-icons/simple-line-icons.min.css');

Yii::app()->assets->registerGlobalCss('global/plugins/uniform/css/uniform.default.css');

Yii::app()->assets->registerGlobalCss('global/plugins/bootstrap/css/bootstrap.min.css');

Yii::app()->assets->registerGlobalCss('global/plugins/bootstrap-switch/css/bootstrap-switch.min.css');

Yii::app()->assets->registerGlobalCss('global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css');

Yii::app()->assets->registerGlobalCss('global/plugins/fullcalendar/fullcalendar.min.css');

Yii::app()->assets->registerGlobalCss('global/plugins/jqvmap/jqvmap/jqvmap.css');

Yii::app()->assets->registerGlobalCss('global/css/components.css');

Yii::app()->assets->registerGlobalCss('global/css/plugins.css');

Yii::app()->assets->registerGlobalCss('admin/pages/css/tasks.css');

Yii::app()->assets->registerGlobalCss('admin/pages/css/todo.css');

Yii::app()->assets->registerGlobalCss('admin/layout/css/layout.css');

Yii::app()->assets->registerGlobalCss('admin/layout/css/custom.css');

Yii::app()->assets->registerGlobalCss('admin/layout/css/themes/darkblue.css');

?>
</head>

  <!-- END HEAD -->

  <!-- BEGIN BODY -->

  <!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->

  <!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->

  <!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->

  <!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->

  <!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->

  <!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->

  <!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->

  <!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->

  <!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->

<body class="page-header-fixed page-quick-sidebar-over-content page-style-square">

  <!-- BEGIN HEADER -->

  <div class="page-header navbar navbar-static-top">

    <!-- BEGIN HEADER INNER -->

    <div class="page-header navbar navbar-fixed-top">

      <!-- BEGIN HEADER INNER -->

      <div class="page-header-inner">

        <!-- BEGIN LOGO -->

        <div class="page-logo">

          <span class="caption-subject bold uppercase font-green-haze" style="font-size:30px;">后台</span>

          <span class="caption-subject bold uppercase font-white-haze" style="color:white;font-size:20px;">管理系统</span>

          <div class="menu-toggler sidebar-toggler hide">

            <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header --> </div>

        </div>

        <!-- END LOGO -->

        <!-- BEGIN RESPONSIVE MENU TOGGLER -->

        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"></a>

        <!-- END RESPONSIVE MENU TOGGLER -->

        <!-- BEGIN TOP NAVIGATION MENU -->

        <div class="top-menu">

          <ul class="nav navbar-nav pull-right">

            <li class="dropdown dropdown-user">

              <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">

                <img alt="" class="img-circle" src="<?php echo Yii::app()->
	user->getModel('wrx_photo'); ?>"/>
                <span class="username username-hide-on-mobile">
                  <?php echo Yii::app()->user->getModel('wrx_username'); ?></span> <i class="fa fa-angle-down"></i>

              </a>

              <ul class="dropdown-menu dropdown-menu-default">

                <li style="display:none;">

                  <a> <i class="icon-user"></i>
                    <?php
$name = "test";
if (strlen($name) > 15) {
	$name = mb_substr($name, 0, 15, 'utf-8') . "...";
}
echo $name;

?>
                  </a>

                </li>

                <li class="divider"></li>

                <li>

                  <a href="<?php

echo Yii::app()->
	request->hostInfo . Yii::app()->homeUrl . 'backend/logout';

?>">
                    <i class="icon-key"></i>
                    注销登录
                  </a>

                </li>

              </ul>

            </li>

            <!-- END USER LOGIN DROPDOWN --> </ul>

        </div>

        <!-- END TOP NAVIGATION MENU --> </div>

      <!-- END HEADER INNER --> </div>

    <!-- END HEADER -->

    <div class="clearfix"></div>

    <!-- BEGIN CONTAINER -->

    <div class="page-container">

      <!-- BEGIN SIDEBAR -->

      <div class="page-sidebar-wrapper">

        <div class="page-sidebar navbar-collapse collapse">

        <?php echo '
              <input type="hidden" value="' . yii::app()->
	assets->getUrlPath('backend/ajax') . '" id="ajax_url">'; ?>

          <!-- BEGIN SIDEBAR MENU -->

          <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->

          <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->

          <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->

          <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->

          <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->

          <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->

          <?php

$systemMenu = new SystemMenu();

echo $systemMenu->
	getSystemMenu();

?>
        </div>

      </div>

      <!-- END SIDEBAR -->

      <!-- BEGIN CONTENT -->

      <div class="page-content-wrapper">

        <!--Main Body-->

        <div id="mainbody" class="page-content">

          <?php echo $content; ?></div>

        <!--End Main Body--> </div>

      <!-- END CONTENT --> </div>

    <!-- END CONTAINER -->

    <!-- BEGIN FOOTER -->

    <div class="page-footer">

      <div class="page-footer-inner">2015 &copy; WANGRUNXIN.COM</div>

      <div class="scroll-to-top">

        <i class="icon-arrow-up"></i>

      </div>

    </div>

    <?php

Yii::app()->
	assets->registerGlobalScript('custom.files/js/md5.js');

Yii::app()->assets->registerGlobalScript('global/plugins/jquery-migrate.min.js');

Yii::app()->assets->registerGlobalScript('global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js');

Yii::app()->assets->registerGlobalScript('global/plugins/bootstrap/js/bootstrap.min.js');

Yii::app()->assets->registerGlobalScript('global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js');

Yii::app()->assets->registerGlobalScript('global/plugins/jquery-slimscroll/jquery.slimscroll.min.js');

Yii::app()->assets->registerGlobalScript('global/plugins/jquery.blockui.min.js');

Yii::app()->assets->registerGlobalScript('global/plugins/jquery.cokie.min.js');

Yii::app()->assets->registerGlobalScript('global/plugins/uniform/jquery.uniform.min.js');

Yii::app()->assets->registerGlobalScript('global/plugins/bootstrap-switch/js/bootstrap-switch.min.js');

Yii::app()->assets->registerGlobalScript('global/plugins/jqvmap/jqvmap/jquery.vmap.js');

Yii::app()->assets->registerGlobalScript('global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js');

Yii::app()->assets->registerGlobalScript('global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js');

Yii::app()->assets->registerGlobalScript('global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js');

Yii::app()->assets->registerGlobalScript('global/plugins/flot/jquery.flot.min.js');

Yii::app()->assets->registerGlobalScript('global/plugins/flot/jquery.flot.resize.min.js');

Yii::app()->assets->registerGlobalScript('global/plugins/flot/jquery.flot.categories.min.js');

Yii::app()->assets->registerGlobalScript('global/plugins/jquery.pulsate.min.js');

Yii::app()->assets->registerGlobalScript('global/plugins/bootstrap-daterangepicker/moment.min.js');

Yii::app()->assets->registerGlobalScript('global/plugins/bootstrap-daterangepicker/daterangepicker.js');

Yii::app()->assets->registerGlobalScript('global/plugins/fullcalendar/fullcalendar.min.js');

Yii::app()->assets->registerGlobalScript('global/plugins/jquery-easypiechart/jquery.easypiechart.min.js');

Yii::app()->assets->registerGlobalScript('global/plugins/jquery.sparkline.min.js');

Yii::app()->assets->registerGlobalScript('global/scripts/metronic.js');

Yii::app()->assets->registerGlobalScript('admin/layout/scripts/layout.js');

Yii::app()->assets->registerGlobalScript('admin/layout/scripts/demo.js');

Yii::app()->assets->registerGlobalScript('admin/pages/scripts/index.js');

Yii::app()->assets->registerGlobalScript('admin/layout/scripts/quick-sidebar.js');

Yii::app()->assets->registerGlobalScript('admin/pages/scripts/tasks.js');

Yii::app()->assets->registerGlobalScript('global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')

?>
    <script>



jQuery(document).ready(function() {



                       Metronic.init(); // init metronic core componets



                       Layout.init(); // init layout



                       QuickSidebar.init(); // init quick sidebar



                       Demo.init(); // init demo features



                       Index.init();



                       Index.initDashboardDaterange();



                       Index.initJQVMAP(); // init index page's custom scripts



                       Index.initCalendar(); // init index page's custom scripts



                       Index.initCharts(); // init index page's custom scripts



                       Index.initChat();



                       Index.initMiniCharts();



                       Tasks.initDashboardWidget();



                       });



</script>

  </div>

  <!-- END JAVASCRIPTS -->

</body>

  <!-- END BODY -->

</html>