<?php

ob_end_flush(); //关闭缓存
//echo str_repeat("　",256); //ie下 需要先发送256个字节
set_time_limit(0);
for ($i = 0; $i < 10; $i++) {
	echo "Now Index is :" . $i . "<br>";
	flush();
	sleep(1);
}

if (isset($_POST['sqlFile'])) {
	$file_name = $_POST['sqlFile']; //要导入的SQL文件名
	$dbhost = "localhost"; //数据库主机名
	$dbuser = "wangrunxin"; //数据库用户名
	$dbpass = "wrx52691000"; //数据库密码
	$dbname = "wangrunxin"; //数据库名
	$file_name = $_SERVER['DOCUMENT_ROOT'] . "/cms/files/db/wangrunxin.20151007161900.sql";
	echo $file_name;
	set_time_limit(0); //设置超时时间为0，表示一直执行。当php在safe mode模式下无效，此时可能会导致导入超时，此时需要分段导入
	mysql_connect($dbhost, $dbuser, $dbpass) or die("不能连接数据库 $dbhost"); //连接数据库
	mysql_select_db($dbname) or die("不能打开数据库 $dbname"); //打开数据库

	echo "<p>正在清空数据库,请稍等....<br>";
	$result = mysql_query("SHOW tables");
	while ($currow = mysql_fetch_array($result)) {
		mysql_query("drop TABLE IF EXISTS $currow[0]");
		echo "清空数据表【" . $currow[0] . "】成功！<br>";
	}
	echo "<br>恭喜你清理MYSQL成功<br>";

	echo "正在执行导入数据库操作<br>";
// 导入数据库的MySQL命令
	//读取文件内容
	$filesql = file_get_contents($file_name);

//通过sql语法的语句分割符进行分割
	$segment = explode(";", $filesql);

//循环遍历数组
	foreach ($segment as $current) {
		$sql = $current;
		echo $sql;
		$revertsql = mysql_query($sql) or die("<br>数据库表已存在！" . mysql_error());
		if ($revertsql) {
			echo "还原成功<br>";
		} else {
			echo "还原失败<br>";
		}
	}
	fclose($filename);
	echo "<br>导入完成！";
	mysql_close();
}
?>