<?php

class SystemMenu {

	public function getSystemMenu() {

		$curClassId = Yii::app()->
			request->getUrl();

		$pos = strpos($curClassId, "backend/") + strlen("backend/");

		$curClassId = substr($curClassId, $pos);

		if (strpos($curClassId, "/") !== false) {
			$pos = strpos($curClassId, "/");
			$curClassId = substr($curClassId, 0, $pos);
		}

		//菜单参数

		$mainpage = '';
		$welcome = '';

		$user = '';
		$user_fans = '';
		$user_profile = '';
		$user_group = '';
		$user_analysis = '';
		$user_data_export = '';

		$message = '';
		$message_list = '';
		$message_post = '';
		$message_post_list = '';
		$message_post_export = '';

		$product = '';
		$product_create = '';
		$product_list = '';
		$product_analysis = '';
		$product_export = '';

		$system = '';
		$weixin_setting = '';
		$system_log = '';
		$system_backup = '';
		$system_about = '';

		switch ($curClassId) {

		case 'fans':

			$user = 'class="start active open"';

			$user_fans = 'class="active"';

			break;

		case 'vips':

			$user = 'class="start active open"';

			$user_profile = 'class="active"';

			break;

		case 'group':

			$user = 'class="start active open"';

			$user_group = 'class="active"';

			break;

		case 'useranalysis':

			$user = 'class="start active open"';

			$user_analysis = 'class="active"';

			break;

		case 'exportcenter':

			switch (Yii::app()->data->getValue('type')) {
			case md5('user'):
				$user = 'class="start active open"';
				$user_data_export = 'class="active"';
				break;
			case md5('product'):
				$product = 'class="start active open"';
				$product_export = 'class="active"';
				break;

			default:
				# code...
				break;
			}

			break;

		case 'messagelist':

			$message = 'class="start active open"';

			$message_list = 'class="active"';

			break;

		case 'postmsg':

			$message = 'class="start active open"';

			$message_post = 'class="active"';

			break;

		case 'postmsglist':

			$message = 'class="start active open"';

			$message_post_list = 'class="active"';

			break;

		case 'createproduct':

			$product = 'class="start active open"';

			$product_create = 'class="active"';

			break;

		case 'productlist':

			$product = 'class="start active open"';

			$product_list = 'class="active"';

			break;

		case 'productanalysis':

			$product = 'class="start active open"';

			$product_analysis = 'class="active"';

			break;

		case 'editaccount':

			$system = 'class="start active open"';

			$weixin_setting = 'class="active"';

			break;

		case 'log':

			$system = 'class="start active open"';

			$system_log = 'class="active"';

			break;

		case 'backup':

			$system = 'class="start active open"';
			$system_backup = 'class="active"';
			break;

		case 'about':

			$system = 'class="start active open"';

			$system_about = 'class="active"';

			break;

		default:

			$mainpage = 'class="start active open"';

			$welcome = 'class="active"';

			break;

		}

		echo '
<ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">

	<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->

	<li class="sidebar-toggler-wrapper">

		<!-- BEGIN SIDEBAR TOGGLER BUTTON -->

		<div class="sidebar-toggler"></div>

		<!-- END SIDEBAR TOGGLER BUTTON -->

	</li>

	<!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->

	<li class="sidebar-search-wrapper">

		<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->

		<!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->

		<!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->

		<br/>

		<!-- END RESPONSIVE QUICK SEARCH FORM -->

	</li>

	<li ' . $mainpage . '>

		<a href="javascript:;"> <i class="icon-home"></i>

			<span class="title">后台管理系统</span>

			<span class="selected"></span>

			<span class="arrow open"></span>

		</a>

		<ul class="sub-menu">

			<li class="active">

				<a href="' . Yii::app()->
			assets->getUrlPath('backend/index') . '"> <i class="icon-bar-chart"></i>
					欢迎页面
				</a>

			</li>

		</ul>

	</li>

	<li ' . $user . '>

		<a href="javascript:;">

			<i class="icon-briefcase"></i>

			<span class="title">用户管理</span>

			<span class="arrow "></span>

		</a>

		<ul class="sub-menu">

			<li ' . $user_fans . '>

				<a href="' . Yii::app()->
			assets->getUrlPath('backend/fans') . '">



							用户访问列表
				</a>

			</li>

			<li ' . $user_profile . '>

				<a href="' . Yii::app()->
			assets->getUrlPath('backend/vips') . '">

							简历访问列表
				</a>

			</li>

			<li ' . $user_analysis . '>

				<a href="' . Yii::app()->assets->getUrlPath('backend/useranalysis') . '">用户数据分析</a>

			</li>

		</ul>

	</li>

	<li ' . $message . '>

		<a href="javascript:;">

			<i class="icon-present"></i>

			<span class="title">信息管理</span>

			<span class="arrow "></span>

		</a>

		<ul class="sub-menu">

			<li ' . $message_list . '>

				<a href="' . Yii::app()->assets->getUrlPath('backend/messagelist') . '">用户留言处理</a>

			</li>

		</ul>

	</li>

	<li  ' . $system . '>

		<a href="javascript:;">

			<i class="icon-settings"></i>

			<span class="title">系统设置</span>

			<span class="arrow "></span>

		</a>

		<ul class="sub-menu">

			<li ' . $system_log . '>

				<a href="' . Yii::app()->assets->getUrlPath('backend/log') . '">系统日志</a>

			</li>

			<li ' . $system_backup . '>

				<a href="' . Yii::app()->assets->getUrlPath('backend/backup') . '">数据库管理</a>

			</li>

			<li ' . $system_about . '>

				<a href="' . Yii::app()->assets->getUrlPath('backend/about') . '">关于</a>

			</li>

		</ul>

	</li>

</ul>

<!-- END SIDEBAR MENU -->
';

	}

	public function getSpecialSystemMenu() {

		$curClassId = Yii::app()->request->getUrl();

		$pos = strpos($curClassId, "backend/") + strlen("backend/");

		$curClassId = substr($curClassId, $pos);

		if (strpos($curClassId, "/") !== false) {
			$pos = strpos($curClassId, "/");
			$curClassId = substr($curClassId, 0, $pos);
		}
		$icon = 'icon-bar-chart';
		switch ($curClassId) {
		case 'aboutus':
			$url = 'backend/aboutus';
			$label = '关于我们';
			break;
		case 'accountsetup':
			echo '
<li>
	<a href="' . Yii::app()->
				assets->getUrlPath('backend') . '">
		<i class="icon-bubbles"></i>
		账户选择
	</a>
</li>
';
			$icon = 'icon-wrench';
			$url = 'backend/accountsetup';
			$label = '账户管理';
			break;
		case 'account':
			$icon = 'icon-bubbles';
			$url = 'backend';
			$label = '账户选择';
			break;
		default:
			$url = 'backend/aboutus';
			$label = '关于我们';
			break;
		}

		echo '
<li class="active">
	<a href="' . Yii::app()->
			assets->getUrlPath($url) . '">
		<i class="' . $icon . '"></i>
		' . $label . '
	</a>
</li>
';

		switch ($curClassId) {
		case 'account':
			echo '
<li>
	<a href="' . Yii::app()->
				assets->getUrlPath('backend/accountsetup') . '">
		<i class="icon-wrench"></i>
		账户管理
	</a>
</li>
';
			break;

		default:
			# code...
			break;
		}
	}

	public function getSupportLabel() {

		$curClassId = Yii::app()->request->getUrl();

		$pos = strpos($curClassId, "support/") + strlen("support/");

		$curClassId = substr($curClassId, $pos);

		if (strpos($curClassId, "/") !== false) {
			$pos = strpos($curClassId, "/");
			$curClassId = substr($curClassId, 0, $pos);
		} else {
			if (strpos($curClassId, "?") !== false) {
				$pos = strpos($curClassId, "?");
				$curClassId = substr($curClassId, 0, $pos);
			}
		}

		switch ($curClassId) {
		case 'notebook':
			$name = "病历本";
			break;
		case 'medicalbook':
			$name = "病历本";
			break;
		case 'upload':
			$name = "图片上传";
			break;
		case 'productlist':
			$name = "我们的产品";
			break;
		case 'producttype':
			$type = Yii::app()->data->getValue('type');
			if ($type == 'd') {
				$name = "德风生活馆";
			} elseif ($type == 't') {
				$name = "台湾生活馆";
			}
			break;
		case 'alert':
			$name = "备忘记录";
			break;
		case 'item':
			$name = "产品详情";
			break;
		case 'about':
			$name = "关于我们";
			break;
		case 'membercenter':
			$name = "用户中心";
			break;
		case 'assistant':
			$name = "专属顾问";
			break;
		case 'tips':
			$name = "生活小贴士";
			break;
		case 'account':
			$name = "会员资料";
			break;
		case 'login':
			$name = "登录";
			break;
		default:
			$name = "";
			break;
		}

		return $name;
	}

}

?>