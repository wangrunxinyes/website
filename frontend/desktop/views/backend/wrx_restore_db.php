<?php

$code = Yii::app()->data->getValue('code');
$dir = "files/db/";
$file = ScanHelper::scan($dir);
$file_name = "not_exist";
$realname = "not_exist.sql";
foreach ($file as $key => $filename) {
	if ($code == md5($filename)) {
		$file_name = $filename;
	}
}

if (strpos($file_name, ".") !== false) {
	$file_name = substr($file_name, strpos($file_name, ".") + 1);
	if (strpos($file_name, ".") !== false) {
		$realname = substr($file_name, 0, strpos($file_name, "."));
		$realname = strtotime($realname);
	}
}
?>
<iframe id="frame1" src="<?php
echo Yii::app()->assets->getUrlPath('restore.php?file=' . $realname);
?>" style="width:100%; height:650px; background-color:white"></iframe>
<script type="text/javascript">
function getTextNode()
{
var x=document.getElementById("frame1").contentWindow.document
if(x.getElementById("end") != null){
	clearInterval(to_end);
}
x.body.scrollTop= x.body.offsetHeight;
}
var to_end = setInterval(getTextNode,100);
alert("提示：数据库恢复需要较长时间,请耐心等待结果。");
</script>
