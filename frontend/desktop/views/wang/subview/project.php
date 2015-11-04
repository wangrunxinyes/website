<?php
Yii::app()->
	assets->registerGlobalCss("extensions/time.line/css/normalize.css");
Yii::app()->assets->registerGlobalCss("extensions/time.line/css/default.css");
Yii::app()->assets->registerGlobalCss("extensions/time.line/assets/style/base.css");

header("Content-type: text/html; charset=utf-8");

$con = mysqli_connect("localhost", "wangrunxin", "wrx52691000") or die("can't connect the server");
If (!$con) {
	//die output a message and terminate the current script
	die('Could not connect: ' . mysqli_connect_errno());
}
mysqli_select_db($con, 'sqlwangrunxin') or die('Could not select database.');

$query = 'SELECT *
FROM  `appinfo`
ORDER BY  `appinfo`.`createtime` DESC
LIMIT 0 , 30
';
mysqli_query($con, 'set names utf8');
$result = mysqli_query($con, $query) or die('server_error.');

?>
	<div id="timeline">
		<?php if (mysqli_num_rows($result) != 0) {
	$i = 0;
	while ($row = mysqli_fetch_array($result)) {
		$attribute = "";
		if ($i % 2 == 0) {
			$attribute = "right";
		}

		$icon = $row[3];
		$viewnum = $row[7];
		$createTime = $row[6];
		$likenum = $row[8];
		$description = $row[2];
		$id = $row[0];
		$name = $row[1];
		if ($id != 0) {
			echo '<div class="timeline-item">
		<div class="timeline-icon">
			</div>
		<div class="timeline-content ' . $attribute . '">
			<h2 style="font-size:90%">' . $name . '<small style="float: right;">' . $createTime . '</small></h2>
			<img style="height:150px;margin-top:10px;" src="' . $icon . '" alt="">
			<p>' . $description . '</p>
			<a href="#" class="btn">详情 | Detail</a>
		</div>
	</div>
	<div class="portfolio app mix_all" data-cat="app" style="display: none; opacity: 1;">
		<div class="portfolio-wrapper ">
			<a class="b-link-stripe b-animate-go  thickbox play-icon">
				<img href="javascript:void(0);" onclick="getDetails(id)" id="' . $id . '" class="img-responsive" src="' . $icon . '" alt=""  />
				<div class="simple-in">
					<ul class="social" style="margin-top: 10%;">
						<li>
							<span></span>
							' . $viewnum . '
						</li>
						<li>
							<span class="text"></span>
							' . $createTime . '
						</li>
						<li>
							<span class="number"></span>
							' . $likenum . '
						</li>

					</ul>
				</div>
			</a>
			<div class="simple-out">
				<h4>
					<a href="javascript:void(0);" onclick="getDetails(id)" id="' . $id . '" >' . $name . '</a>
				</h4>
				<span>' . $createTime . '</span>
				<p></p>
				<a href="javascript:void(0);" onclick="getDetails(id)" id="' . $id . '" class="read-more">
					<span></span>
					DETAILS
				</a>
			</div>
		</div>
	</div>
	';

			$i++;
		}
	}
}
?>
</div>

<?php
mysqli_free_result($result);
mysqli_close($con);

?>