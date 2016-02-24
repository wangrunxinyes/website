<?php
$id = Yii::app()->
	data->getValue('id');
$user = new WeixinUserUnit();
$user->getUserByUserName($id);

$card = new MemberCardUnit();
$card->getMemberCardById($user->getValue('user_id'));

if ($user->getValue('sex') == 1) {
	$sex = "男";
} elseif ($user->getValue('sex') == 2) {
	$sex = "女";
} else {
	$sex = "未知";
}

if ($user->getValue('real_name') == 'unknown') {
	$name = "";
} else {
	$name = $user->getValue('real_name');
}

if ($user->getValue('phone') == 'unknown') {
	$phone = "";
} else {
	$phone = $user->getValue('phone');
}

if (is_null($card->getValue('id'))) {
	$member_card = "";
} else {
	$member_card = $card->getValue('member_card_id');
}

$create_time = date("Y/m/d H:i:s", $user->getValue('create_time'));

?>
<div class="portlet box blue">
	<div class="portlet-title">
		<div class="caption"> <i class="fa fa-gift"></i>
			用户信息详情
		</div>
	</div>
	<div class="portlet-body form">
		<div class="profile-content">
			<div class="row">
				<div class="col-md-6">
					<!-- BEGIN PORTLET -->
					<div class="portlet light ">
						<div class="portlet-title">
							<div class="caption caption-md"> <i class="icon-bar-chart theme-font hide"></i>
								<span class="caption-subject font-blue-madison bold uppercase">微信数据</span>
							</div>
						</div>
						<div class="portlet-body">
							<form role="form">
								<div class="form-body">
									<div class="form-group">
										<img src="<?php echo $user->getValue("weixin_photo");?>" style="width:64px;"></div>
									<div class="form-group">
										<label>微信用户名</label>
										<input class="form-control" value="<?php echo $user->getValue("weixin_name");?>" disabled="" type="text"></div>
									<div class="form-group">
										<label>性别</label>
										<input class="form-control" value="<?php echo $sex;?>" disabled="" type="text"></div>
									<div class="form-group">
										<label>国家</label>
										<input class="form-control" value="<?php echo $user->getValue("country");?>" disabled="" type="text"></div>
									<div class="form-group">
										<label>省份</label>
										<input class="form-control" value="<?php echo $user->getValue("province");?>" disabled="" type="text"></div>
									<div class="form-group">
										<label>城市</label>
										<input class="form-control" value="<?php echo $user->getValue("city");?>" disabled="" type="text"></div>
								</div>
							</form>
						</div>
					</div>
					<!-- END PORTLET -->
				</div>
				<div class="col-md-6">
					<!-- BEGIN PORTLET -->
					<div class="portlet light">
						<div class="portlet-title tabbable-line">
							<div class="caption caption-md">
								<i class="icon-globe theme-font hide"></i>
								<span class="caption-subject font-blue-madison bold uppercase">系统数据</span>
							</div>
						</div>
						<div class="portlet-body">
							<div class="form-group">
								<label>姓名</label>
								<div class="input-icon">
									<i class="fa fa-male"></i>
									<input class="form-control" value="<?php echo $name;?>" placeholder="未知" type="text"></div>
							</div>
							<div class="form-group">
								<label>手机号</label>
								<div class="input-icon">
									<i class="fa fa-phone-square "></i>
									<input class="form-control" value="<?php echo $phone;?>" placeholder="未知" type="text"></div>
							</div>
							<div class="form-group">
								<label>会员编号</label>
								<div class="input-icon">
									<i class="fa fa-credit-card"></i>
									<input class="form-control" value="<?php echo $member_card;?>" placeholder="未知" type="text"></div>
							</div>
							<div class="form-group">
								<label>注册时间</label>
								<div class="input-icon">
									<i class="fa  fa-clock-o"></i>
									<input class="form-control" value="<?php echo $create_time;?>" placeholder="未知" disabled="" type="text"></div>
							</div>
							<div class="form-group">
								<label>用户组别</label>
								<select class="form-control">
									<?php
$group = $user->
	getValue('weixin_group');
$groups = WeixinGroupUnit::load_all_group_for_option();
foreach ($groups as $key => $value) {
	if ($key == $group) {
		echo '
									<option selected="selected" value="' . $key . '">' . $value . '</option>
									';
	} else {
		echo '
									<option value="' . $key . '">' . $value . '</option>
									';
	}
}
?>
								</select><br>
								<button type="submit" class="btn blue">保存</button>
							</div>
						</div>
					</div>
					<!-- END PORTLET -->
				</div>
			</div>
		</div>
	</div>
</div>