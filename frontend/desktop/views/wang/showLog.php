<?php
date_default_timezone_set("PRC");
$time = time();
$date = date("Y:m:d 00:00:00", $time);
$time = strtotime($date);

Yii::app()->
	assets->registerGlobalCss("global/css/components.css");
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
$should_off = $on_time + 25 * 3600;
?>
<div class="portlet blue box" style="width:80%;margin-left:10%;margin-top:5%;">
	<div class="portlet-title">
		<div class="caption"> <i class="fa fa-cogs"></i>
			今日签到
		</div>
	</div>
	<div class="portlet-body">
		<h4 class="block">
			<?php
if ($on_time == 0) {
	echo "尚未签到";
} else {
	echo date('Y/m/d H:i:s', $on_time);
	echo '<input type="hidden" id="off_time" value="' . $should_off . '">';
}
?></h4>
	</div>
</div>

<div class="portlet green box" style="width:80%;margin-left:10%;margin-top:5%;">
	<div class="portlet-title">
		<div class="caption"> <i class="fa fa-cogs"></i>
			今日签退
		</div>
	</div>
	<div class="portlet-body">
		<h4 class="block">
			<?php
if ($off_time == 0) {
	echo "尚未签退";
} else {
	echo date('Y/m/d H:i:s', $off_time);
}
?></h4>
	</div>
</div>

<div class="portlet red box" style="width:80%;margin-left:10%;margin-top:5%;">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-cogs"></i>
			下班时间
		</div>
	</div>
	<div class="portlet-body">
		 <?php
if ($off_time == 0 && $on_time != 0 && time() < $on_time + 9 * 3600) {
	$remain = $should_off - time();
	echo '<input id="count" type="hidden" value="' . $remain . '"><h4 class="block" id="clock"></h4>';
} elseif ($on_time == 0) {
	echo '<h4 class="block" id="clock">尚未开始。</h4>';
} else {
	echo '<h4 class="block" id="clock">已下班。</h4>';

}
?>
	</div>
</div>

<script type="text/javascript">

var count_id = 0;

function count(){
	var data = $("#count").val();
	if(data <= 16*3600 || isNaN(data))
	{
		data = "已下班";
		clearInterval(count_id);
	}else{
		data--;
		var newDate = new Date();
		newDate.setTime(data * 1000);
		show = newDate.format('h:m:s');
	}
	$("#clock").html(show);
	$("#count").val(data);
}

$(function(){
	if($("#count").length >0)
	{
		count_id = setInterval(count, 1000);
	}
});

Date.prototype.format = function(format) {
       var date = {
              "M+": this.getMonth() + 1,
              "d+": this.getDate(),
              "h+": this.getHours(),
              "m+": this.getMinutes(),
              "s+": this.getSeconds(),
              "q+": Math.floor((this.getMonth() + 3) / 3),
              "S+": this.getMilliseconds()
       };
       if (/(y+)/i.test(format)) {
              format = format.replace(RegExp.$1, (this.getFullYear() + '').substr(4 - RegExp.$1.length));
       }
       for (var k in date) {
              if (new RegExp("(" + k + ")").test(format)) {
                     format = format.replace(RegExp.$1, RegExp.$1.length == 1
                            ? date[k] : ("00" + date[k]).substr(("" + date[k]).length));
              }
       }
       return format;
}

</script>