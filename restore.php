<link href="assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>

<div style="margin:10px;">
<?php
//set general setting;
date_default_timezone_set("PRC");
ob_end_flush(); //关闭缓存
//echo str_repeat("　",256); //ie下 需要先发送256个字节
set_time_limit(0);

$dbhost = "localhost"; //数据库主机名
$dbuser = "wangrunxin"; //数据库用户名
$dbpass = "wrx52691000"; //数据库密码
$dbname = "wangrunxin"; //数据库名

if (isset($_GET['file'])) {
	$file = $_GET['file'];
} else {
	$file = "no_exist.sql";
}
if (strlen($file) != 10) {
	$file = "no_exist.sql";
} else {
	$file = $dbname . "." . date("YmdHis", $file) . "." . "sql";
}

$file_name = $_SERVER['DOCUMENT_ROOT'] . "/files/db/" . $file;
if (!file_exists($file_name)) {
	echo '<div class="alert alert-danger">
	<strong>错误!</strong> 备份文件<label style="display:none;">' . $file_name . '</label>不存在.
							</div>';
	exit;
}
echo '<h3 class="page-title">
			恢复数据库:' . md5($file) . '
			</h3>';
set_time_limit(0); //设置超时时间为0，表示一直执行。当php在safe mode模式下无效，此时可能会导致导入超时，此时需要分段导入
mysql_connect($dbhost, $dbuser, $dbpass) or die("不能连接数据库 $dbhost"); //连接数据库
mysql_select_db($dbname) or die("不能打开数据库 $dbname"); //打开数据库

echo '<h2><span class="label label-success">正在清空数据库,请稍候... </span></h2>';
$result = mysql_query("SHOW tables");
while ($currow = mysql_fetch_array($result)) {
	mysql_query("drop TABLE IF EXISTS $currow[0]");
	echo '<h4><span class="label label-info">
	清空数据表【' . $currow[0] . '】成功。 </span></h4>';
	flush();
	sleep(0.2);
}
echo '<h2><span class="label label-success">清理数据成功，正在执行导入数据库操作... </span></h2>';
flush();
sleep(2);
// 导入数据库的MySQL命令
//读取文件内容
flush();
$filesql = file_get_contents($file_name);

//通过sql语法的语句分割符进行分割
$segment = explode(";", $filesql);
$index = 0;
$success = 0;
$fail = 0;
//循环遍历数组
foreach ($segment as $current) {
	$sql = $current;
	if (is_null($sql) || strlen($sql) < 3) {
		continue;
	}
	$index++;
	$revertsql = mysql_query($sql) or die("<br>" . mysql_error());
	if ($revertsql) {
		echo '<div class="note note-success">';
		echo $index . ". " . mb_substr($sql, 0, 60, 'utf-8') . "...";
		echo "还原成功<br>";
		$success++;
		echo '</div>';
	} else {
		echo '<div class="alert alert-danger">';
		echo $index . ". " . mb_substr($sql, 0, 60, 'utf-8') . "...";
		echo $sql . "还原失败<br>";
		$fail++;
		echo '</div>';
	}
	flush();
}
$sql = "UPDATE wrx_model_system_basic SET s_back_up_db = '0' WHERE s_back_up_db = '1'";
$index++;
if (mysql_query($sql)) {
	echo '<div class="note note-success">';
	echo "设置数据库状态成功<br>";
	$success++;
	echo '</div>';
} else {
	echo '<div class="alert alert-danger">';
	echo $sql . "设置数据库状态失败<br>";
	$fail++;
	echo '</div>';
}

mysql_close();

echo '<div class="alert alert-block alert-info fade in" style="margin-top: 20px; height: 70px;">
								<h4 class="alert-heading" style="margin: 10px;">导入完成</h4>
								<p>
									<a class="btn purple" style="margin: 10px;">
									共' . $index . '条数据 </a>
								</p>
							</div>';

echo '<div class="alert alert-block alert-success fade in" style="margin-top: 20px; height: 70px;">
								<h4 class="alert-heading" style="margin: 10px;">操作成功</h4>
								<p>
									<a class="btn green" style="margin: 10px;">
									' . $success . '条数据</a>

								</p>
							</div>';

echo '<div class="alert alert-block alert-danger fade in" style="margin-top: 20px; height: 70px;">
								<h4 class="alert-heading" style="margin: 10px;">操作失败</h4>
								<p>
									<a class="btn red" style="margin: 10px;">
									' . $fail . '条数据 </a>
								</p>
							</div>';
echo "<input type='hidden' id='end' value='end'>";
?>
	</div>