<?php
Yii::app()->assets->registerGlobalCss('custom.files/css/styles.css');
Yii::app()->assets->registerGlobalScript('custom.files/js/weixin.handle.push.msg.js');
$id = Yii::app()->data->getValue('id');
if ($id != null) {
	$msg = new WeixinPostMsgUnit();
	$submsg = $msg->get_msg_by_id($id);
	if ($msg->getValue('id') != $id) {
		$this->redirect(array('/backend/deny'));
	}
} else {
	$this->redirect(array('/backend/deny'));
}

?>
<div class="portlet box green">
	<div class="portlet-title">
		<div class="caption"> <i class="fa icon-envelope-open"></i>
			推送
		</div>
	</div>
	<div class="portlet-body form">
		<div class="form-body">
			<div class="form-horizontal form-bordered">
				<div class="form-group">

					<div class="col-md-5">
						预览
						<div class="accordion">
							<div style="display: block; width:280px; height:155.5px;" class="sub-nav active">
								<img src="<?php echo $msg->getValue('bg');?>" style="width:100%; height:100%; z-index:-1;">
								<div class="html about-me" style=" height:50px; width:280px;background-color:#333; opacity: 0.5;margin-top:-50px;">
									<label style="color:white; float:left;"><?php echo $msg->getValue('title');?></label>
								</div>
							</div>
							<?php
if (!is_null($submsg)) {
	foreach ($submsg as $key => $s_msg) {
		echo '<a>
								<label style="width:200px;height:100%">' . $s_msg['title'] . '</label>
								<img src="' . $s_msg['bg'] . '" style="width:32px; height:32px;float: right;margin-top: -7px;"></a>
						';
	}
}

?>
							</div>
					</div>
					<div class="col-md-5">
						<div class="form-body">
							<div class="form-horizontal form-bordered">
								<div class="form-group">
									<label class="control-label col-md-5">【<?php echo $msg->getValue('title');?>】链接</label>
									<label class="control-label col-md-6"><?php echo $msg->getValue('url');?></label>
								</div>
								<?php
if (!is_null($submsg)) {
	foreach ($submsg as $key => $s_msg) {
		echo '<div class="form-group">
									<label class="control-label col-md-5">【' . $s_msg['title'] . '】链接</label>
									<label class="control-label col-md-6">' . $s_msg['url'] . '</label>
								</div>';
	}
}

?>
								<div class="form-group">
									<label class="control-label col-md-5">推送至用户组</label>
									<br>
									<select class=" col-md-6">
<?php
foreach (WeixinGroupUnit::load_all_group_for_option() as $key =>
	$value) {
	echo '<option value="' . $key . '">' . $value . '</option>
';
}
?>
									</select>
								</div>
								<div class="form-group last"><br>
								<label class="control-label col-md-5"></label>
									<button class="btn blue weixin-push-msg" onclick="return false;"> <i class="fa fa-plus-square"></i>
										推送
									</button>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>