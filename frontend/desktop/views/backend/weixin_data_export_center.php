<?php
$type = Yii::app()->data->getValue("type");
if ($type != md5('user') &&
	$type != md5('msg') &&
	$type != md5('post_msg') &&
	$type != md5('product')) {
	$this->redirect(array('/backend/deny'));
} else {
	$data = wrx_view_date_export_center::create($type);
	$format = $data->get_data();
}
?>
<div class="portlet box blue">
	<div class="portlet-title">
		<div class="caption"> <i class="fa icon-docs "></i>
			数据导出
		</div>
	</div>
	<div class="portlet-body">
		<?php
if (isset($format['a'])) {
	echo '<div class="alert alert-block alert-danger fade in">
		<button type="button" class="close" data-dismiss="alert"></button>
		<h4 class="alert-heading">' . $format['a']['title'] . '</h4>
		<p>' . $format['a']['des'] . '</p>
		' . $format['a']['extend'] . '
		<p>
			<a class="btn green" href="' . $format['a']['link'] . '">生成报告</a>
		</p>
	</div>
	';
}

if (isset($format['b'])) {
	echo '
	<div class="alert alert-block alert-success fade in">
	<form id="b" action="' . $format['b']['link'] . '" method="POST">
		<button type="button" class="close" data-dismiss="alert"></button>
		<h4 class="alert-heading">' . $format['b']['title'] . '</h4>
		<p>' . $format['b']['des'] . '</p>
		' . $format['b']['extend'] . '
		<p>
			<a class="btn blue" target="_blank" onclick="document.getElementById(\'b\').submit();" >生成报告</a>
		</p></form>
	</div>
	';
}

if (isset($format['c'])) {
	echo '
	<div class="alert alert-block alert-info fade in">
	<form id="c" action="' . $format['c']['link'] . '" method="POST">
		<button type="button" class="close" data-dismiss="alert"></button>
		<h4 class="alert-heading">' . $format['c']['title'] . '</h4>
		<p>' . $format['c']['des'] . '</p>
		' . $format['c']['extend'] . '
		<p>
			<a class="btn purple" target="_blank" onclick="document.getElementById(\'c\').submit();">生成报告</a>
		</p></form>
	</div>
	';
}

if (isset($format['d'])) {
	echo '
	<div class="alert alert-block alert-warning fade in">
		<button type="button" class="close" data-dismiss="alert"></button>
		<h4 class="alert-heading">' . $format['d']['title'] . '</h4>
		<p>' . $format['d']['des'] . '</p>
		' . $format['d']['extend'] . '
		<p>
			<a class="btn red" href="' . $format['d']['link'] . '">生成报告</a>
		</p>
	</div>
	';
}

?>
</div>
</div>