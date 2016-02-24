<?php
//get data;
$type = Yii::app()->data->getValue('type');
$request_date = false;
$system = false;
if (is_null($type)) {
	$this->redirect(array('/backend/deny'));
} else {
	switch ($type) {
	case md5('weixin_msg'):
		$type = 'weixin_msg';
		$request_date = true;
		break;
	case md5('db'):
		$type = 'db';
		$system = true;
		$request_date = true;
		break;
	default:
		$this->redirect(array('/backend/deny'));
		break;
	}
}

$helper = new wrx_system_export_helper();

if (!$system) {
	$date = Yii::app()->data->getValue('date');
	if (!is_null($date)) {
		$year = date('Y', $date);
		$month = date('m', $date);
	} else if ($request_date) {
		$this->redirect(array('/backend/deny'));
	} else {
		$year = 0;
		$month = 0;
	}

	$helper->create("weixin_msg", array("Y" => $year, "M" => $month));
	$export = new backend_export_helper();
	$url = $export->export($helper->get_data(), $helper->get_title(), $helper->get_des(), $helper->get_identify());
	if (!is_null($url)) {
		$size = $export->get_size();
	}
} else {
	switch ($type) {
	case 'db':
		$system = wrx_model_system_basic::load();
		$system->backup_db();
		$data = new MysqlDump();
		$result = $data->dbDump("localhost", "wangrunxin", "wrx52691000", "wangrunxin");
		if ($result) {
			$system->backup_db_finish(0);
			$filesizeHelper = new backend_count_file_size();
			$url = $data->getUrl();
			$size = $filesizeHelper->getFileSize($url);
			$helper->set_attribute(md5('wangrunxin'), '数据库备份', '数据库备份文件，字符编码: utf-8.', null);
			$system_result = "备份成功.";
		} else {
			$system->backup_db_finish(2);
			$url = null;
			$helper->set_attribute(md5('wangrunxin'), '数据库备份', '数据库备份文件，字符编码: utf-8.', null);
		}
		break;

	default:
		# code...
		break;
	}
}
echo '<div class="portlet box green">
<div class="portlet-title">
	<div class="caption"> <i class="fa fa-sun-o"></i>
		处理结果 | Process result
	</div>
</div>
<div class="portlet-body">
';

if (is_null($url)) {
	$view = wrx_view_download_files::error($helper->get_title(), $helper->get_des(), $helper->get_identify());
} else {
	if ($system) {
		$view = wrx_view_download_files::process($helper->get_title(), $helper->get_des(), $size, $helper->get_identify(), $system_result);
	} else {
		$view = wrx_view_download_files::create($url, $helper->get_title(), $helper->get_des(), $size, $helper->get_identify());
	}
}

for ($i = 0; $i < 15; $i++) {
	echo "<br>";
}

echo '</div></div>';

?>