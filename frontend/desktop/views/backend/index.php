<?php
$system = wrx_model_system_basic::load();
if (time() - $system->
	getValue('s_last_back_up_db') > 3600 * 24 * 7) {
	echo '
<div class="alert alert-danger"> <strong>注意!</strong>
	您已经超过7天没有备份数据库了，请及时备份.
	<a href="' . Yii::app()->
		assets->getUrlPath('backend/backup')
		. '">【进入数据库管理】
	</a>
</div>
';
}
?>
<div class="note note-info">

	<p class="block">
		<?php echo date('Y年m月d日'); ?>， 欢迎使用后台管理系统。</p>

</div>

<br>

<div class="row">

	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">

		<div class="dashboard-stat green-haze">

			<div class="visual"> <i class="fa fa-group fa-icon-medium"></i>

			</div>

			<div class="details">

				<div class="number">
					<?php echo visitors_helper::getNewVisitors(); ?>个</div>

				<div class="desc">今日新增访问IP数</div>

			</div>

			<a class="more" onclick="javascript:reLoad(id);" id ="order_list">
				用户管理 <i class="m-icon-swapright m-icon-white"></i>

			</a>

		</div>

	</div>

	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">

		<div class="dashboard-stat blue-madison">

			<div class="visual">

				<i class="fa fa-history fa-icon-medium"></i>

			</div>

			<div class="details">

				<div class="number">
					<?php //echo $helper->getUnreadNum(); ?>新信息</div>

				<div class="desc">未回复</div>

			</div>

			<a class="more" href="<?php echo Yii::app()->
	assets->getUrlPath("backend/messagelist"); ?>" id ="car_list">

				信息管理
				<i class="m-icon-swapright m-icon-white"></i>

			</a>

		</div>

	</div>

	<!-- <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">

		<div class="dashboard-stat green-haze">

			<div class="visual">

				<i class="fa fa-group fa-icon-medium"></i>

			</div>

			<div class="details">

				<div class="number">
					次</div>

				<div class="desc">简历访问次数</div>

			</div>

			<a class="more" onclick="javascript:reLoad(id);" id ="schedule_list">
				访问记录
				<i class="m-icon-swapright m-icon-white"></i>

			</a>

		</div>

	</div>
 -->
</div>

<div class="alert alert-info">

	<label style="font-size:18px">系统模块</label>

	<br>

	<div class="tiles">

<!-- 		<div class="tile bg-blue-steel" onclick="javascript:reLoad(id);" id ="schedule_list">

			<div class="tile-body">

				<i class="fa fa-briefcase"></i>

			</div>

			<div class="tile-object">

				<div class="name">1次</div>

				<div class="number">简历访问</div>

			</div>

		</div> -->

		<div class="tile bg-green" onclick="javascript:reLoad(id);" id ="order_list">

			<div class="tile-body">

				<i class="fa fa-bar-chart-o"></i>

			</div>

			<div class="tile-object">

				<div class="name">1次</div>

				<div class="number">简历访问</div>

			</div>

		</div>

		<!-- <div class="tile bg-green-meadow" onclick="javascript:reLoad(id);" id ="car_list">

			<div class="tile-body">

				<i class="fa fa-gift"></i>

			</div>

			<div class="tile-object">

				<div class="name"></div>

				<div class="number">活动信息</div>

			</div>

		</div>

		<div class="tile tile tile bg-blue-hoki" onclick="javascript:reLoad(id);" id ="schdule_list">

			<div class="tile-body">

				<i class="fa fa-male"></i>

			</div>

			<div class="tile-object">

				<div class="name"></div>

				<div class="number">用户信息</div>

			</div>

		</div>

		<div class="tile bg-red-sunglo" onclick="javascript:reLoad(id);" id ="sys_params">

			<div class="tile-body">

				<i class="fa fa-cogs"></i>

			</div>

			<div class="tile-object">

				<div class="name"></div>

				<div class="number">设置</div>

			</div>

		</div> -->

	</div>

</div>