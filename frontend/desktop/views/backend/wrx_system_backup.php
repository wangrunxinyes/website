<?php
$system = wrx_model_system_basic::load();
if ($system->
	getValue('s_back_up_db') == 0) {
	$show_backup = "";
	$state = "正常";
	$last_time = date("Y-m-d H:i:s", $system->getValue('s_last_back_up_db'));
} elseif ($system->getValue('s_back_up_db') == 1) {
	$show_backup = "style='display:none'";
	$state = "正在备份中";
	$last_time = date("Y-m-d H:i:s", $system->getValue('s_last_back_up_db'));
} else {
	$show_backup = "style='display:none'";
	$state = "异常";
	$last_time = date("Y-m-d H:i:s", $system->getValue('s_last_back_up_db'));
}
$helper = new backend_system_restore_helper();

?>
<div class="alert alert-success"> <strong>数据库状态：
		<?php echo $state;?></strong>
</div>
<div class="alert alert-info">
	上次备份时间： <strong><?php echo $last_time;?></strong>
	说明：系统只保存最近的
	<strong>10</strong>
	个备份文件.
</div>
<a href="<?php
echo Yii::app()->
	assets->getUrlPath('backend/export/type/' . md5('db'));
?>" class="btn btn-lg green"
	<?php echo $show_backup;?>
	><i class="fa  fa-database"></i>
现在备份 | Backup
</a>

<a href="<?php
echo Yii::app()->
	assets->getUrlPath('backend/export/type/' . md5('db'));
?>" class="btn btn-lg blue" style="display:none;">
下载备份文件 | Download <i class="fa  fa-database"></i>
</a>
<br><br>
<div class="portlet box blue">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa  fa-file-text-o"></i>
			备份文件记录
		</div>
		<div class="tools">
			<a title="" data-original-title="" href="javascript:;" class="collapse"></a>
		</div>
	</div>
	<div class="portlet-body">
		<div style="" class="table-container">

			<div class="dataTables_wrapper dataTables_extended_wrapper no-footer" id="datatable_products_wrapper">
				<div class="table-scrollable">
					<table role="grid" aria-describedby="datatable_products_info" class="table table-striped table-bordered table-hover dataTable no-footer" id="datatable_products">
						<thead>
							<tr role="row" class="heading">
								<th aria-sort="ascending" aria-label="
										 id
									: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="datatable_products" tabindex="0" class="sorting_asc" width="10%">编号</th>
								<th aria-label="
										 weixin_img
									: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="datatable_products" tabindex="0" class="sorting" width="15%">备份时间</th>
								<th aria-label="
										 weixin_name
									: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="datatable_products" tabindex="0" class="sorting" width="15%">备份大小</th>
								<th aria-label="
										 Actions
									: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="datatable_products" tabindex="0" class="sorting" width="10%">操作</th>
							</tr>
						</thead>
						<tbody>
							<?php $helper->get_backup_list();?></tbody>
					</table>
				</div>
			</div>
		</div>

		<!-- END EXAMPLE TABLE PORTLET-->
	</div>
</div>