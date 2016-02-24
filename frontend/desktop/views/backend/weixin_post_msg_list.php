<?php

Yii::app()->
	assets->registerGlobalCss('custom.files/css/backend.css');
$list = new wrx_view_post_msg_list();
$list->execute();
?>
<!-- BEGIN EXAMPLE TABLE PORTLET-->

<div style="" class="table-container">

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
									: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="datatable_products" tabindex="0" class="sorting" width="15%">消息标题</th>
						<th aria-label="
										 weixin_name
									: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="datatable_products" tabindex="0" class="sorting" width="15%">创建时间</th>
						<th aria-label="
										 real_name
									: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="datatable_products" tabindex="0" class="sorting" width="10%">状态</th>
						<th aria-label="
										 phone
									: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="datatable_products" tabindex="0" class="sorting" width="10%">推送者</th>
						<th aria-label="
										 create_date
									: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="datatable_products" tabindex="0" class="sorting" width="15%">推送日期</th>
									<th aria-label="
										 create_date
									: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="datatable_products" tabindex="0" class="sorting" width="15%">推送用户群</th>
						<th aria-label="
										 member_card
									: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="datatable_products" tabindex="0" class="sorting" width="10%">推送状态</th>
						<th aria-label="
										 Actions
									: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="datatable_products" tabindex="0" class="sorting" width="10%">操作</th>
					</tr>
					<!-- <tr role="row" class="filter">
						<td colspan="1" rowspan="1">
							<input class="form-control form-filter input-sm" name="product_id" type="text"></td>
						<td colspan="1" rowspan="1">
							<input class="form-control form-filter input-sm" name="product_name" type="text"></td>
						<td colspan="1" rowspan="1">
							<input class="form-control form-filter input-sm" name="product_name" type="text"></td>
						<td colspan="1" rowspan="1">
							<input class="form-control form-filter input-sm" name="product_name" type="text"></td>
						<td colspan="1" rowspan="1">
							<input class="form-control form-filter input-sm" name="product_name" type="text"></td>
						<td colspan="1" rowspan="1">
							<div class="input-group date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy">
								<input class="form-control form-filter input-sm" readonly="" name="product_created_from" placeholder="From" type="text">
								<span class="input-group-btn">
									<button class="btn btn-sm default" type="button"> <i class="fa fa-calendar"></i>
									</button>
								</span>
							</div>
							<div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
								<input class="form-control form-filter input-sm" readonly="" name="product_created_to " placeholder="To" type="text">
								<span class="input-group-btn">
									<button class="btn btn-sm default" type="button"> <i class="fa fa-calendar"></i>
									</button>
								</span>
							</div>
						</td>
						<td colspan="1" rowspan="1">
							<input class="form-control form-filter input-sm" name="product_name" type="text"></td>
						<td colspan="1" rowspan="1">
							<div class="margin-bottom-5">
								<button class="btn btn-sm yellow filter-submit margin-bottom">
									<i class="fa fa-search"></i>
									搜索
								</button>
							</div>
							<button class="btn btn-sm red filter-cancel">
								<i class="fa fa-times"></i>
								重置
							</button>
						</td>
					</tr> -->
				</thead>
				<tbody>
					<?php $list->echoFormat();?></tbody>
			</table>
		</div>
		<div class="row">
			<div class="col-md-8 col-sm-12">
				<div id="datatable_products_paginate" class="dataTables_paginate paging_bootstrap_extended">
					<div class="pagination-panel">
						页数
						<a href="#" class="btn btn-sm default prev disabled" title="Prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<input class="pagination-panel-input form-control input-mini input-inline input-sm" maxlenght="5" style="text-align:center; margin: 0 5px;" type="text" value="<?php $list->
	echoPage();?>">
						<a href="#" class="btn btn-sm default next" title="Next">
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
					<label>
						<?php $list->echoTotal();?></label>
					条数据| 当前显示第
					<label>
						<?php $list->echoStart();?></label>
					到
					<label>
						<?php $list->echoEnd();?></label>
					条
				</div>
			</div>
			<div class="col-md-4 col-sm-12">
				<div class="table-group-actions pull-right">
					<span></span>
					<button class="btn btn-sm yellow table-group-action-submit" href="<?php
echo Yii::app()->assets->getUrlPath('backend/postmsglist');
?>">
						<i class="fa fa-check"></i>
						重载数据
					</button>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- END EXAMPLE TABLE PORTLET-->