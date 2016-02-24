<?php

Yii::app()->
	assets->registerGlobalCss('custom.files/css/backend.css');
Yii::app()->assets->registerGlobalScript('custom.files/js/handle.user.list.js');
Yii::app()->assets->registerGlobalScript('custom.files/js/handle.ajax.table.js');
Yii::app()->assets->registerGlobalCss('global/plugins/bootstrap-datepicker/css/datepicker3.css');
Yii::app()->assets->registerGlobalScript('global/plugins/select2/select2.min.js');
Yii::app()->assets->registerGlobalScript('global/plugins/bootbox/bootbox.min.js');
Yii::app()->assets->registerGlobalScript('admin/pages/scripts/todo.js');
Yii::app()->assets->registerGlobalScript('global/plugins/flot/jquery.flot.min.js');
Yii::app()->assets->registerGlobalScript('global/plugins/flot/jquery.flot.stack.min.js');
$list = new wrx_view_user_behavior_list();
$list->execute();
$data = new backend_user_behavior_data_count();
$result = $data->get_data();
?>

<script>
jQuery(document).ready(function() {
   ChartsFlotcharts.init();
   ChartsFlotcharts.initCharts();
   // ChartsFlotcharts.initPieCharts();
   // ChartsFlotcharts.initBarCharts();
});
</script>
<div class="portlet box blue">
	<div class="portlet-title">
		<div class="caption"> <i class="fa fa-gift"></i>
			近十天用户事件统计
		</div>
		<div class="tools">
			<a href="javascript:;" class="collapse"></a>
		</div>
	</div>
	<div class="portlet-body">
		<div id="chart_1" class="chart"></div>
	</div>
</div>

<div class="portlet box green">
	<div class="portlet-title">
		<div class="caption"> <i class="fa fa-cogs"></i>
			事件列表
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
									: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="datatable_products" tabindex="0" class="sorting" width="15%">微信头像</th>
								<th aria-label="
										 weixin_name
									: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="datatable_products" tabindex="0" class="sorting" width="15%">微信账号</th>
								<th aria-label="
										 real_name
									: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="datatable_products" tabindex="0" class="sorting" width="10%">操作类型</th>
								<th aria-label="
										 create_date
									: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="datatable_products" tabindex="0" class="sorting" width="15%">参考编号</th>
								<th aria-label="
										 create_date
									: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="datatable_products" tabindex="0" class="sorting" width="15%">时间</th>
								<th aria-label="
										 Actions
									: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="datatable_products" tabindex="0" class="sorting" width="10%" style="display:none;">操作</th>
							</tr>
							<tr role="row" class="filter" style="display:none;">
								<td colspan="1" rowspan="1">-</td>
								<td colspan="1" rowspan="1">-</td>
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
											<button class="btn btn-sm default" type="button">
												<i class="fa fa-calendar"></i>
											</button>
										</span>
									</div>
									<div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
										<input class="form-control form-filter input-sm" readonly="" name="product_created_to " placeholder="To" type="text">
										<span class="input-group-btn">
											<button class="btn btn-sm default" type="button">
												<i class="fa fa-calendar"></i>
											</button>
										</span>
									</div>
								</td>
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
							</tr>
						</thead>
						<tbody class="wrx-table-body">
							<?php $list->echoFormat();?></tbody>
					</table>
				</div>
				<div class="row">
					<div class="col-md-8 col-sm-12">
					    <input id="wrx-table-type" type="hidden" value="<?php echo md5('weixin_user_analysis');?>">
					    <input id="wrx-table-url" type="hidden" value="<?php echo Yii::app()->assets->getUrlPath('backend/ajax');?>">
						<div id="datatable_products_paginate" class="dataTables_paginate paging_bootstrap_extended">
							<div class="pagination-panel">
								页数
								<a class="btn btn-sm default prev wrx-prev-page disabled" title="Prev">
									<i class="fa fa-angle-left"></i>
								</a>
								<input class="wrx-cur-page pagination-panel-input form-control input-mini input-inline input-sm" maxlenght="5" style="text-align:center; margin: 0 5px;" type="text" value="<?php $list->
	echoPage();?>">
								<a class="btn btn-sm default next wrx-next-page" title="Next">
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
					<div class="col-md-4 col-sm-12">

						<div class="table-group-actions pull-right">
							<span></span>
							<button class="btn btn-sm green wrx-refresh-this-view">
								<i class="fa fa-refresh"></i>
								刷新列表
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- END EXAMPLE TABLE PORTLET-->
	</div>
</div>
<script type="text/javascript">
	var ChartsFlotcharts = function() {


    return {

        //main function to initiate the module


        init: function() {

            Metronic.addResizeHandler(function() {

                Charts.initPieCharts();

            });



        },



        initCharts: function() {



            if (!jQuery.plot) {

                return;

            }



            var data = [];

            var totalPoints = 250;



            // random data generator for plot charts



            function getRandomData() {

                if (data.length > 0) data = data.slice(1);

                // do a random walk

                while (data.length < totalPoints) {

                    var prev = data.length > 0 ? data[data.length - 1] : 50;

                    var y = prev + Math.random() * 10 - 5;

                    if (y < 0) y = 0;

                    if (y > 100) y = 100;

                    data.push(y);

                }

                // zip the generated y values with the x values

                var res = [];

                for (var i = 0; i < data.length; ++i) {

                    res.push([i, data[i]]);

                }



                return res;

            }




            //bars with controls



            function chart1() {

                if ($('#chart_1').size() != 1) {

                    return;

                }

                var d1 = [];
                var d2 = [];
                var d3 = [];
                var d4 = [];

                <?php
foreach ($result as $key => $value) {
	echo 'd1.push([' . $key . ', ' . $value['e'] . ']);';
	echo 'd2.push([' . $key . ', ' . $value['m'] . ']);';
	echo 'd3.push([' . $key . ', ' . $value['w'] . ']);';
	echo 'd4.push([' . $key . ', ' . $value['o'] . ']);';
}
echo 'd1.push([10, 0]);';
echo 'd2.push([10, 0]);';
echo 'd3.push([10, 0]);';
echo 'd4.push([10, 0]);';
?>


                var stack = true,

                    bars = true,

                    lines = false,

                    steps = false;



                function plotWithOptions() {

                    $.plot($("#chart_1"),



                        [{

                            label: "微信菜单点击",

                            data: d1,

                            lines: {

                                lineWidth: 1,

                            },

                            shadowSize: 0

                        }, {

                            label: "微信发送信息",

                            data: d2,

                            lines: {

                                lineWidth: 1,

                            },

                            shadowSize: 0

                        }, {

                            label: "网页访问",

                            data: d3,

                            lines: {

                                lineWidth: 1,

                            },

                            shadowSize: 0

                        }, {

                            label: "其他",

                            data: d4,

                            lines: {

                                lineWidth: 1,

                            },

                            shadowSize: 0

                        }]



                        , {

                            series: {

                                stack: stack,

                                lines: {

                                    show: lines,

                                    fill: true,

                                    steps: steps,

                                    lineWidth: 0, // in pixels

                                },

                                bars: {

                                    show: bars,

                                    barWidth: 0.5,

                                    lineWidth: 0, // in pixels

                                    shadowSize: 0,

                                    align: 'center'

                                }

                            },

                            xaxis: {

                                    tickColor: "#eee",

                                    ticks: [[10, " "],
                                    <?php
for ($i = 0; $i < 10; $i++) {
	$date = date("Y-m-d", strtotime("-" . $i . " day"));
	$index = 9 - $i;
	echo '[' . $index . ', "' . unicode_helper::unicode_encode($date) . '"],';
}
?>
                                    ]

                            },

                            grid: {

                                tickColor: "#eee",

                                borderColor: "#eee",

                                borderWidth: 1

                            }

                        }

                    );

                }
                plotWithOptions();
            }
            chart1();
        },
    };
}();
</script>