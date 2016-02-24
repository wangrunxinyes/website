<?php
Yii::app()->
	assets->registerGlobalCss('global/plugins/bootstrap-datepicker/css/datepicker3.css');
Yii::app()->assets->registerGlobalScript('global/plugins/select2/select2.min.js');
Yii::app()->assets->registerGlobalScript('global/plugins/bootbox/bootbox.min.js');
Yii::app()->assets->registerGlobalScript('admin/pages/scripts/todo.js');
Yii::app()->assets->registerGlobalScript('custom.files/js/handle.popup.api.js');
Yii::app()->assets->registerGlobalScript('custom.files/weixin.js/weixin.check.user.message.js');
?>
<!-- BEGIN TODO CONTENT -->
<div class="todo-content">
	<div class="portlet light">
		<!-- PROJECT HEAD -->
		<div class="portlet-title">
			<div class="caption"> <i class="icon-bar-chart font-green-sharp hide"></i>
				<span class="caption-helper">处理</span>
				&nbsp;
				<span class="caption-subject font-green-sharp bold uppercase">用户留言</span>
				<a class="btn btn-circle btn-xs green weixin-refresh" style="right: 40px;
position: absolute;">
															刷新 <i class="fa fa-plus"></i>
															</a>
			</div>
		</div>
		<!-- end PROJECT HEAD -->
		<div class="portlet-body">
			<div class="row">
				<div class="col-md-5 col-sm-4">
					<div class="scroller" style="max-height: 600px;" data-always-visible="0" data-rail-visible="0" data-handle-color="#dae3e7">
						<div class="todo-tasklist" id="weixin_user_list">
							<?php
$list = new wrx_view_message_list();
$list->execute();

echo '
							<input type="hidden" value="weixin_reply_message" id="reply_type">
							';
?>
						</div>
					</div>
				</div>
				<div class="todo-tasklist-devider"></div>
				<div class="col-md-7 col-sm-8" id="weixin_content_history"></div>
			</div>
		</div>
	</div>
</div>
<!-- END TODO CONTENT -->
<script>
    jQuery(document).ready(function() {

UIReplyDialogApi.init();//init popup;
WeixinMessageHelper.init();
    });
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>