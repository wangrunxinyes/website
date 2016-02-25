<?php
$ip = Yii::app()->
	data->getValue('id');
$user = new VisitorUnit();
$user->getUserByUserName($ip);

$json_ip = visitors_helper::getIpInfo($ip);
if ($json_ip["code"] == 0) {
	echo $json_ip["data"]["country"];
}

if ($user->getValue('type') == 'M') {
	$type = "移动设备";
} else {
	$type = "桌面设备";
}

$create_time = date("Y/m/d H:i:s", $user->getValue('create_time'));
$last_time = date("Y/m/d H:i:s", $user->getValue('last_visit_time'));
?>
<div class="portlet box blue">
	<div class="portlet-title">
		<div class="caption"> <i class="fa fa-gift"></i>
			访问信息详情
		</div>
	</div>
	<div class="portlet-body form">
		<div class="profile-content">
			<div class="row">
				<div class="col-md-6">
					<!-- BEGIN PORTLET -->
					<div class="portlet light">
						<div class="portlet-title tabbable-line">
							<div class="caption caption-md"> <i class="icon-globe theme-font hide"></i>
								<span class="caption-subject font-blue-madison bold uppercase">系统数据</span>
							</div>
						</div>
						<div class="portlet-body">
							<div class="form-group">
								<label>Ip地址</label>
								<div class="input-icon">
									<i class="fa fa-male"></i>
									<input class="form-control" value="<?php echo $user->
	getValue('ip'); ?>" placeholder="未知" disabled=""  type="text">
								</div>
							</div>
							<div class="form-group">
								<label>请求次数</label>
								<div class="input-icon">
									<i class="fa fa-phone-square "></i>
									<input class="form-control" value="<?php echo $user->
	getValue('count'); ?>"  disabled="" placeholder="未知" type="text">
								</div>
							</div>
							<div class="form-group">
								<label>最后访问设备</label>
								<div class="input-icon">
									<i class="fa fa-credit-card"></i>
									<input class="form-control" value="<?php echo $type; ?>" placeholder="未知"  disabled="" type="text"></div>
							</div>
							<div class="form-group">
								<label>最后访问时间</label>
								<div class="input-icon">
									<i class="fa  fa-clock-o"></i>
									<input class="form-control" value="<?php echo $last_time; ?>" placeholder="未知" disabled="" type="text"></div>
							</div>
							<div class="form-group">
								<label>注册时间</label>
								<div class="input-icon">
									<i class="fa  fa-clock-o"></i>
									<input class="form-control" value="<?php echo $create_time; ?>" placeholder="未知" disabled="" type="text"></div>
							</div>
						</div>
					</div>
					<!-- END PORTLET -->
				</div>
				<div class="col-md-6">
					<!-- BEGIN PORTLET -->
					<div class="portlet light ">
						<div class="portlet-title">
							<div class="caption caption-md">
								<i class="icon-bar-chart theme-font hide"></i>
								<span class="caption-subject font-blue-madison bold uppercase">IP数据</span>
							</div>
						</div>
						<div class="portlet-body">
							<form role="form">
								<div class="form-body">
									<?php if ($json_ip["code"] == 0) {
	echo '<div class="form-group">
									<label>国家</label>
									<input class="form-control" value="' . $json_ip["data"]["country"] . '" disabled="" type="text"></div>
								<div class="form-group">
									<label>地区</label>
									<input class="form-control" value="' . $json_ip["data"]["area"] . '" disabled="" type="text"></div>
								<div class="form-group">
									<label>省份</label>
									<input class="form-control" value="' . $json_ip["data"]["region"] . '" disabled="" type="text"></div>
								<div class="form-group">
									<label>城市</label>
									<input class="form-control" value="' . $json_ip["data"]["city"] . '" disabled="" type="text"></div>
								<div class="form-group">
									<label>运营商</label>
									<input class="form-control" value="' . $json_ip["data"]["isp"] . '" disabled="" type="text"></div>
								';
} else {
	echo '
								<div class="form-group">
									<label>IP详情查询失败</label>
									';
}
?>
								</div>
							</form>
						</div>
					</div>
					<!-- END PORTLET -->
				</div>
			</div>
		</div>
	</div>
</div>