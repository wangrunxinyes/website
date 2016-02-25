<?php

Yii::app()->
	assets->registerGlobalCss('custom.files/css/backend.css');
Yii::app()->assets->registerGlobalScript('custom.files/js/handle.user.list.js');
Yii::app()->assets->registerGlobalScript('global/plugins/select2/select2.min.js');
Yii::app()->assets->registerGlobalScript('global/plugins/bootbox/bootbox.min.js');
Yii::app()->assets->registerGlobalScript('admin/pages/scripts/todo.js');

//table
Yii::app()->assets->registerGlobalScript('custom.files/js/handle.ajax.table.js');
//search
Yii::app()->assets->registerGlobalScript('custom.files/js/handle.search.js');

$list = new wrx_view_user_list();
$list->execute();
?>
<!-- BEGIN EXAMPLE TABLE PORTLET-->
<script type="text/javascript">
	$(document).ready(function(){
		$('.date-picker').datepicker({
            rtl: Metronic.isRTL(),
            autoclose: true
        });
	});
</script>
<div style="" class="table-container">
<input type="hidden" value="<?php echo md5("weixin_user_list"); ?>" id="wrx-table-type">
	<div class="dataTables_wrapper dataTables_extended_wrapper no-footer" id="datatable_products_wrapper">
		<div class="table-scrollable">
			<table role="grid" aria-describedby="datatable_products_info" class="table table-striped table-bordered table-hover dataTable no-footer" id="datatable_products">
				<thead>
					<tr role="row" class="heading">
						<th aria-sort="ascending" aria-label="
										 id
									: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="datatable_products" tabindex="0" class="sorting_asc" width="10%">ID</th>
						<th aria-label="
										 weixin_img
									: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="datatable_products" tabindex="0" class="sorting" width="15%">IP地址</th>
						<th aria-label="
										 weixin_name
									: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="datatable_products" tabindex="0" class="sorting" width="15%">访问次数</th>
						<th aria-label="
										 real_name
									: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="datatable_products" tabindex="0" class="sorting" width="10%">设备类型</th>
						<th aria-label="
										 phone
									: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="datatable_products" tabindex="0" class="sorting" width="10%">最后访问时间</th>
						<th aria-label="
										 create_date
									: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="datatable_products" tabindex="0" class="sorting" width="15%">初次访问日期</th>
						<th aria-label="
										 Actions
									: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="datatable_products" tabindex="0" class="sorting" width="10%">操作</th>
					</tr>
				</thead>
				<tbody class="wrx-table-body">
					<?php $list->echoFormat();?></tbody>
			</table>
		</div>
		<div class="row">
			<div class="col-md-8 col-sm-12">
				<div id="datatable_products_paginate" class="dataTables_paginate paging_bootstrap_extended">
					<div class="pagination-panel">
						页数
						<a href="#" class="btn btn-sm default wrx-prev-page prev disabled" title="Prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<input class="pagination-panel-input wrx-cur-page form-control input-mini input-inline input-sm" maxlenght="5" style="text-align:center; margin: 0 5px;" type="text" value="<?php $list->
	echoPage();?>">
						<a href="#" class="btn btn-sm default next wrx-next-page" title="Next">
							<i class="fa fa-angle-right"></i>
						</a>
						共
						<span class="pagination-panel-total">
							<?php $list->echoTotalPage();?></span>
						页
					</div>
				</div>
				<div aria-live="polite" role="status" id="datatable_products_info" class="dataTables_info">
					<span class="seperator">| 搜索到</span>
					<label class="wrx-total-item">
						<?php $list->echoTotal();?></label>
					条数据| 当前显示第
					<label class="wrx-start-id">
						<?php $list->echoStart();?></label>
					到
					<label class="wrx-end-id">
						<?php $list->echoEnd();?></label>
					条
				</div>
			</div>
		</div>
	</div>
</div>

<!-- END EXAMPLE TABLE PORTLET-->


