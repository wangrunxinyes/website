<div class="row">
	<div class="col-md-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption"> <i class="fa fa-globe"></i>
					微信公众号
				</div>
			</div>
			<div class="portlet-body" id = "portletbody_message">

			<ul class="list-inline" style="text-align:left;">
					<li>填写公众号名称【仅用于本平台管理，不影响微信账号名称】</li>
				</ul>
				<ul class="list-inline" style="text-align:left;">
					<li>
						<table class="table table-bordered " style="align:center;width: 100%;border: 1px">
							<tr>
								<td id="ap_td_new_officeip" style="width: 400px;">
									<input id="content" value="<?php
print_r(Yii::app()->
		weixin->getWeixin('weixin_name'));
?>" placeholder="公众号名称" style="width: 400px;">
								</td>
							</tr>
						</table>
					</li>
				</ul>

				<ul class="list-inline" style="text-align:left;">
					<li>基础信息【下列信息错误可能导致平台无法使用，请谨慎修改】</li>
				</ul>
				<ul class="list-inline" style="text-align:left;">
					<li>
						<table class="table table-bordered " style="align:center;width: 100%;border: 1px">
							<tr>
								<td id="ap_td_new_officeip" style="width: 400px;">
									<input id="content" value="<?php
print_r(Yii::app()->
		weixin->getWeixin('weixin_app_key'));
?>" placeholder="App Key" style="width: 400px;">
								&nbsp;
									<input id="content" value="<?php
print_r(Yii::app()->
		weixin->getWeixin('weixin_app_secret'));
?>" placeholder="App Secret"style="width: 400px;">
									&nbsp;
								</td>
							</tr>
						</table>
					</li>
				</ul>


				<a style="font-size: 12px" class="btn icn-only green">修改</a>
			</div>

		</div>
	</div>
	<!-- END EXAMPLE TABLE PORTLET-->
</div>