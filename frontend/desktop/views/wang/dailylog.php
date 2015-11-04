<?php

date_default_timezone_set("PRC");
$time = time();
$date = date("Y:m:d 00:00:00", $time);
$time = strtotime($date);
$data = R::getAll('select * from worklog where time > "' . $time . '"');
$on_time = 0;
$off_time = 0;

if (!is_null($data)) {
	if (isset($data[0])) {

		foreach ($data as $key => $value) {
			if ($value['type'] == "on") {
				if ($value['time'] > $on_time) {
					$on_time = $value['time'];
				}
			}

			if ($value['type'] == "off") {
				if ($value['time'] > $off_time) {
					$off_time = $value['time'];
				}
			}
		}
	}
}

?>
<!DOCTYPE html >

<html lang = "en" >

<head >
	<meta charset = "utf-8" / >
	<title >Daily log</title>
	<meta http - equiv = "X-UA-Compatible"
content = "IE=edge" >
	<meta content = "width=device-width, initial-scale=1.0"
name = "viewport" / >
	<meta http - equiv = "Content-type"
content = "text/html; charset=utf-8" >
	<style type="text/css">
	.green.btn {
    color: #FFF;
    background-color: #35AA47;
}

.btn-lg {
    padding: 10px 16px;
    font-size: 18px;
    line-height: 1.33;
    vertical-align: middle;
}

.btn {
    border-width: 0px;
    padding: 7px 14px;
    font-size: 14px;
    outline: medium none !important;
    background-image: none !important;
    filter: none;
    box-shadow: none;
    text-shadow: none;
}

div, input, select, textarea, span, img, table, label, td, th, p, a, button, ul, code, pre, li {
    border-radius: 0px !important;
}

body {
    color: #333;
    font-family: "Open Sans",sans-serif;
    font-size: 13px;
    direction: ltr;
}
	</style>
</head>
<body class = "page-header-fixed page-quick-sidebar-over-content " >

	<div style = "text-align:center; height:100%; margin-top:10%;" >

		<div style = "text-align:center; height:100%; margin-top:10%;" >
			<?php

if ($on_time != 0 && $off_time != 0) {
	$this->
		redirect(array('wang/show'));
} elseif ($on_time == 0) {
	echo '
			<button type = "button"
class = "btn blue btn-lg log" data="on" style="font-size:50px;">签到</button>
			';
} elseif ($off_time == 0) {
	echo '
			<button type = "button"
class = "btn green btn-lg log" data="off" style="font-size:50px;">签退</button>
			';
}
?>
			<input type="hidden" id="request_url" value="<?php echo Yii::app()->assets->getUrlPath("wang/store")?>"></div>

	</div>

	<script type = "text/javascript" >
$(document).ready(function(){
	$(".log").on("click", function() {
		var data = $(this).attr("data");
		var url = $("#request_url").val();
		$.ajax({
				type: "POST",
				url: url,
				data: "type=" + data,
				datatype: "json",

				beforeSend: function() {
				},

				success: function(data) {
					alert(data);
				},

				complete: function(XMLHttpRequest, textStatus) {
				},

				error: function() {
				}
			});
	});
});
	</script>
</body>

</html>