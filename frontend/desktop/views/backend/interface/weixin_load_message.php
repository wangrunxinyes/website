<?php

$img = Yii::app()->data->getValue('img');
$id = Yii::app()->data->getValue('data');
$open_id = Yii::app()->weixin->getWeixin('weixin_open_id');

$un_messages = R::getAll('select id from weixin_message_db where fromusername = "' . $id
	. '" AND tousername = "' . $open_id . '" AND isnull(reply) order by time asc');

echo '
<div class="scroller" style="max-height: 600px;" data-always-visible="0" data-rail-visible="0" data-handle-color="#dae3e7">
	<form action="#" class="form-horizontal">
		<!-- TASK HEAD -->
		<div class="tabbable-line">
			<ul class="nav nav-tabs ">
				<li class="active">
					<a href="#tab_1" data-toggle="tab">历史记录</a>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="tab_1">
					<!-- TASK COMMENTS -->
					<div class="form-group">
						<div class="col-md-12">
							<ul class="media-list">
								';

foreach ($un_messages as $key => $value) {
	$msg = new wrx_model_message();
	$msg->getMessage($value['id']);
	echo '
								<li class="media" id="weixin_message_details_' . $msg->getValue('message_id') . '" style="width: 100%;">
									<a class="pull-left" href="#">
										<img class="todo-userpic" src="' . $img . '" height="27px" width="27px"></a>
									<div class="media-body todo-comment" style="width: 60%;">
										<button type="button" user="' . $msg->getValue('weixin_name') . '" data="' . $msg->getValue('message_id') . '" class="todo-comment-btn wrx-mark btn btn-circle btn-default btn-xs">&nbsp; 已处理 ----------
										</button>
										<button type="button" user="' . $msg->getValue('weixin_name') . '" data="' . $msg->getValue('message_id') . '" class="todo-comment-btn wrx-reply btn btn-circle btn-default btn-xs">&nbsp; 回复 &nbsp;
										</button>
										<p class="todo-comment-head">
											<span class="todo-comment-username">' . $msg->getValue('weixin_name') . '</span>
											&nbsp;
											<span class="todo-comment-date">' . date("Y/m/d H:i:s", $msg->getValue('time')) . '</span>
										</p>
										<p class="todo-text-color">' . $msg->getValue('content') . '</p>
									</div>
								</li>
								';

}

echo '
							</ul>
						</div>
					</div>
					<!-- END TASK COMMENTS -->
				</div>
			</div>
		</div>
	</form>
</div>
';

?>