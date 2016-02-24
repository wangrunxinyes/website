<?php
$control = json_decode(Yii::app()->
		user->getModel('wrx_weixin_json'));
?>
<div class="portlet box blue">
	<div class="portlet-title">
		<div class="caption"> <i class="fa fa-cog"></i>
			账户设定
		</div>
	</div>
	<div class="portlet-body">
		<ul class="nav nav-tabs">
			<li class="active">
				<a aria-expanded="true" href="#tab_1_0" data-toggle="tab">新增微信公众号</a>
			</li>
			<li class="dropdown">
				<a aria-expanded="false" href="#" class="dropdown-toggle" data-toggle="dropdown">
					编辑已有公众号 <i class="fa fa-angle-down"></i>
				</a>
				<ul class="dropdown-menu" role="menu">

					<?php
$index = 1;
$weixin_array = array();
foreach ($control as $value) {
	$weixin_account = new WeixinBasicUnit();
	if ($weixin_account->
		Build($value)) {
		$weixin_array[$index] = $weixin_account;
		if ($weixin_account->getValue('weixin_open_id') == 'unknown') {
			$name = $weixin_account->getValue('weixin_name') . '【未激活】';
		} else {
			$name = $weixin_account->getValue('weixin_name');
		}
		echo '
					<li class="">
						<a aria-expanded="false" href="#tab_1_' . $index
		. '" tabindex="-1" data-toggle="tab">' . $name . '</a>
					</li>
					';
		$index++;
	}

}
?>
				</ul>
			</li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane fade active in" id="tab_1_0">
				<p>
					<ul class="list-inline" style="text-align:left;">
						<li>公众号名称【仅用于本平台管理，不影响微信账号名称】</li>
					</ul>
					<ul class="list-inline" style="text-align:left;">
						<li>
							<table class="table table-bordered " style="align:center;width: 100%;border: 1px">
								<tbody>
									<tr>
										<td id="ap_td_new_officeip" style="width: 400px;">
											<input id="content" value="" placeholder="公众号名称" style="width: 400px;"></td>
									</tr>
								</tbody>
							</table>
						</li>
					</ul>

					<ul class="list-inline" style="text-align:left;">
						<li>基础信息【下列信息错误可能导致平台无法使用，请谨慎修改】</li>
					</ul>
					<ul class="list-inline" style="text-align:left;">
						<li>
							<table class="table table-bordered " style="align:center;width: 100%;border: 1px">
								<tbody>
									<tr>
										<td id="ap_td_new_officeip" style="width: 400px;">
											<input id="content" value="" placeholder="App Key" style="width: 400px;">
											&nbsp;
											<input id="content" value="" placeholder="App Secret" style="width: 400px;">&nbsp;</td>
									</tr>
								</tbody>
							</table>
						</li>
					</ul>
					<a style="font-size: 12px" class="btn icn-only green">修改</a>
				</p>
			</div>
			<?php
foreach ($weixin_array as $key =>
	$weixin) {
	echo '
			<div class="tab-pane fade" id="tab_1_' . $key . '">
				<p>
					<ul class="list-inline" style="text-align:left;">
						<li>公众号名称【仅用于本平台管理，不影响微信账号名称】</li>
					</ul>
					<ul class="list-inline" style="text-align:left;">
						<li>
							<table class="table table-bordered " style="align:center;width: 100%;border: 1px">
								<tbody>
									<tr>
										<td id="ap_td_new_officeip" style="width: 400px;">
											<input id="content" value="' . $weixin->getValue('weixin_name') . '" placeholder="公众号名称" style="width: 400px;"></td>
									</tr>
								</tbody>
							</table>
						</li>
					</ul>

					<ul class="list-inline" style="text-align:left;">
						<li>基础信息【下列信息错误可能导致平台无法使用，请谨慎修改】</li>
					</ul>
					<ul class="list-inline" style="text-align:left;">
						<li>
							<table class="table table-bordered " style="align:center;width: 100%;border: 1px">
								<tbody>
									<tr>
										<td id="ap_td_new_officeip" style="width: 400px;">
											<input id="content" value="' . $weixin->getValue('weixin_app_key') . '" placeholder="App Key" style="width: 400px;">
											&nbsp;
											<input id="content" value="' . $weixin->getValue('weixin_app_secret') . '" placeholder="App Secret" style="width: 400px;">&nbsp;</td>
									</tr>
								</tbody>
							</table>
						</li>
					</ul>
					<a style="font-size: 12px" class="btn icn-only green">修改</a>
				</p>
			</div>
			';
}

?>
		</div>
	</div>
</div>