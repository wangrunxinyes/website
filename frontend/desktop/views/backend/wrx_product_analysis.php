<?php

Yii::app()->
	assets->registerGlobalCss('custom.files/css/backend.css');
Yii::app()->assets->registerGlobalScript('custom.files/js/handle.user.list.js');
Yii::app()->assets->registerGlobalScript('custom.files/js/handle.ajax.table.js');
Yii::app()->assets->registerGlobalCss('global/plugins/bootstrap-datepicker/css/datepicker3.css');
Yii::app()->assets->registerGlobalScript('global/plugins/select2/select2.min.js');
Yii::app()->assets->registerGlobalScript('global/plugins/bootbox/bootbox.min.js');

//pie
Yii::app()->assets->registerGlobalScript('custom.files/js/handle.chart.product.analysis.js');
Yii::app()->assets->registerGlobalScript('global/plugins/amcharts/amcharts/amcharts.js');
Yii::app()->assets->registerGlobalScript('global/plugins/amcharts/amcharts/serial.js');
Yii::app()->assets->registerGlobalScript('global/plugins/amcharts/amcharts/pie.js');
Yii::app()->assets->registerGlobalScript('global/plugins/amcharts/amcharts/themes/light.js');

$analysis = new processer_product_analysis();
$analysis->count_behavior();
$analysis_data = $analysis->getFrequency();

?>
<script type="text/javascript">
var wrx_chart_data = [
<?php
if (!is_null($analysis_data)) {
	if (is_array($analysis_data)) {
		if (isset($analysis_data['product']) && is_array($analysis_data['product'])) {
			foreach ($analysis_data['product'] as $key => $value) {
				echo '{"country": "' . urldecode($key) . '","litres": ' . $value . '},';
			}
		}
	}
}
?>
];

var wrx_chart_data_type = [
<?php
if (!is_null($analysis_data)) {
	if (is_array($analysis_data)) {
		if (isset($analysis_data['type']) && is_array($analysis_data['type'])) {
			foreach ($analysis_data['type'] as $key => $value) {
				echo '{"country": "' . urldecode($key) . '","litres": ' . $value . '},';
			}
		}
	}
}
?>
];
</script>
<script>
jQuery(document).ready(function() {
   ChartsAmcharts.init();
});
</script>
<div class="row">
	<div class="col-md-6">
		<!-- BEGIN CHART PORTLET-->
		<div class="portlet light bordered">
			<div class="portlet-title">
				<div class="caption"> <i class="icon-bar-chart font-green-haze"></i>
					<span class="caption-subject bold uppercase font-green-haze">产品种类</span>
					<span class="caption-helper">近30天统计数据</span>
				</div>
				<div class="tools">
					<a href="javascript:;" class="collapse"></a>
					<a href="javascript:;" class="fullscreen"></a>
				</div>
			</div>
			<div class="portlet-body">
				<div id="chart_1" class="chart" style="height: 400px; overflow: hidden; text-align: center;"></div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<!-- BEGIN CHART PORTLET-->
		<div class="portlet light bordered">
			<div class="portlet-title">
				<div class="caption"> <i class="icon-bar-chart font-green-haze"></i>
					<span class="caption-subject bold uppercase font-green-haze">产品</span>
					<span class="caption-helper">近30天统计数据</span>
				</div>
				<div class="tools">
					<a href="javascript:;" class="collapse"></a>
					<a href="javascript:;" class="fullscreen"></a>
				</div>
			</div>
			<div class="portlet-body">
				<div id="chart_6" class="chart" style="height: 400px; overflow: hidden; text-align: center;"></div>
			</div>
		</div>
	</div>
</div>

<div class="portlet box green">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-bar-chart-o"></i>
			统计数据表
		</div>
		<div class="tools">
			<a title="" data-original-title="" href="javascript:;" class="collapse"></a>
		</div>
	</div>
	<div class="portlet-body flip-scroll">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->

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
									: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="datatable_products" tabindex="0" class="sorting" width="15%">名称</th>
								<th aria-label="
										 weixin_name
									: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="datatable_products" tabindex="0" class="sorting" width="15%">产品类别</th>
								<th aria-label="
										 real_name
									: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="datatable_products" tabindex="0" class="sorting" width="10%">价格</th>
								<th aria-label="
										 create_date
									: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="datatable_products" tabindex="0" class="sorting" width="15%">点击量</th>
								<th aria-label="
										 create_date
									: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="datatable_products" tabindex="0" class="sorting" width="15%">创建时间</th>
							</tr>
						</thead>
						<tbody class="wrx-table-body">
							<?php
foreach ($analysis->
	getDetails() as $key => $value) {
	if (is_array($value)) {
		echo '
							<tr class="odd" role="row">
								<td class="sorting_1">' . $value['id'] . '</td>
								<td>' . urldecode($key) . '</td>
								<td>' . $value['type'] . '</td>
								<td>' . $value['price'] . '</td>
								<td>' . $value['click'] . '</td>
								<td>' . date("Y/m/d H:i:s", $value['time']) . '</td>
							</tr>
							';
	} else {
		echo '
							<tr class="odd" role="row">
								<td class="sorting_1">-</td>
								<td>' . urldecode($key) . '</td>
								<td>-</td>
								<td>-</td>
								<td>' . $value . '</td>
								<td>-</td>
							</tr>
							';
	}

}
?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<!-- END EXAMPLE TABLE PORTLET-->
	</div>
</div>