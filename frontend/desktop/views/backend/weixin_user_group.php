<?php
Yii::app()->
	assets->registerGlobalCss('admin/pages/css/inbox.css');
Yii::app()->assets->registerGlobalScript('admin/pages/scripts/inbox.js');
Yii::app()->assets->registerGlobalScript('global/plugins/uniform/jquery.uniform.min.js');
Yii::app()->assets->registerGlobalScript('custom.files/js/handle.ajax.table.js');
?>
<script>
jQuery(document).ready(function() {
   Inbox.init();
   var table = table_class.createNew();
   table.reload('group=0', 1);
   $('.wrx-reload_table').on('click', function(){
   	    var table = table_class.createNew();
		var data = "group=" + $(this).attr("data-title");
        table.reload(data, 1);
	});
});
</script>

<input type="hidden" value="<?php echo md5('weixin_user_group');?>
" id="wrx-table-type">
<input type="hidden" value="<?php echo Yii::app()->
	assets->getUrlPath('backend/ajax')?>" id="wrx-table-url">
<div class="row inbox">
	<div class="col-md-2">
		<ul class="inbox-nav margin-bottom-10">
			<li class="compose-btn">
				<a href="javascript:;" data-title="Compose" class="btn green"> <i class="fa fa-edit"></i>
					新建分组
				</a>
			</li>
			<?php
foreach (WeixinGroupUnit::load_all_group_for_option() as $key =>
	$value) {
	if ($key == 0) {
		echo '
			<li class="' . $key . ' inbox active">
				<a href="javascript:;" class="btn wrx-reload_table" data-title="' . $key . '">' . $value . '</a> <b></b>
			</li>
			';
	} else {
		echo '
			<li class="' . $key . ' inbox">
				<a href="javascript:;" class="btn wrx-reload_table" data-title="' . $key . '">' . $value . '</a> <b></b>
			</li>
			';
	}

}
?>
		</ul>
	</div>
	<div class="col-md-10">
		<div class="inbox-header">
			<h1 class="pull-left">默认分组</h1>
		</div>
		<div style="display: none;" class="inbox-loading">Loading...</div>
		<div class="inbox-content">
			<table class="table table-striped table-advance table-hover">
				<thead>
					<tr>
						<th colspan="3">
							<div class="btn-group">
								<a class="btn btn-sm blue dropdown-toggle" href="#" data-toggle="dropdown">
									选中操作 <i class="fa fa-angle-down"></i>
								</a>
								<ul class="dropdown-menu">
									<?php
foreach (WeixinGroupUnit::load_all_group_for_option() as $key =>
	$value) {
	echo '
									<li>
										<a href="#" data="' . $key . '">移动至' . $value . '</a>
									</li>
									';
}
?>
								</ul>
							</div>
						</th>
						<th class="pagination-control" colspan="3">
							<span class="pagination-info">
							<input class="wrx-cur-page" readonly="true" type="hidden">
								第<label class="wrx-start-id"></label>
								-
								<label class="wrx-end-id"></label>条
								共
								<label class="wrx-total-item"></label>条数据
							</span>
							<a class="btn btn-sm blue">
								<i class="fa fa-angle-left wrx-prev-page"></i>
							</a>
							<a class="btn btn-sm blue">
								<i class="fa fa-angle-right wrx-next-page"></i>
							</a>
						</th>
					</tr>
				</thead>
				<tbody class="wrx-table-body"></tbody>
			</table>
		</div>
	</div>
</div>