<?php
Yii::app()->
	assets->registerGlobalCss('global/plugins/bootstrap-fileinput/bootstrap-fileinput.css');
Yii::app()->assets->registerGlobalCss('global/plugins/bootstrap/css/bootstrap.min.css');
Yii::app()->
	assets->registerGlobalCss('extensions/phone.upload/css/style.css');
Yii::app()->assets->registerGlobalCss('global/plugins/bootstrap-modal/css/bootstrap-modal-s.css');
Yii::app()->assets->registerGlobalCss('global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css');

Yii::app()->assets->registerGlobalCss('extensions/phone.upload/css/jquery.fileupload.css');
Yii::app()->assets->registerGlobalCss('extensions/phone.upload/css/jquery.fileupload-ui.css');
Yii::app()->assets->registerGlobalScript('extensions/phone.upload/js/tmpl.min.js');
Yii::app()->assets->registerGlobalScript('extensions/phone.upload/js/load-image.all.min.js');
Yii::app()->assets->registerGlobalScript('extensions/phone.upload/js/canvas-to-blob.min.js');
// Yii::app()->assets->registerGlobalScript('extensions/phone.upload/js/bootstrap.min.js');
Yii::app()->assets->registerGlobalScript('extensions/phone.upload/js/jquery.blueimp-gallery.min.js');
Yii::app()->assets->registerGlobalScript('extensions/phone.upload/js/vendor/jquery.ui.widget.js');
Yii::app()->assets->registerGlobalScript('extensions/phone.upload/js/jquery.iframe-transport.js');
Yii::app()->assets->registerGlobalScript('extensions/phone.upload/js/jquery.fileupload.js');
Yii::app()->assets->registerGlobalScript('extensions/phone.upload/js/jquery.fileupload-process.js');
Yii::app()->assets->registerGlobalScript('extensions/phone.upload/js/jquery.fileupload-image.js');
Yii::app()->assets->registerGlobalScript('extensions/phone.upload/js/jquery.fileupload-audio.js');
Yii::app()->assets->registerGlobalScript('extensions/phone.upload/js/jquery.fileupload-validate.js');
Yii::app()->assets->registerGlobalScript('extensions/phone.upload/js/jquery.fileupload-video.js');
Yii::app()->assets->registerGlobalScript('extensions/phone.upload/js/jquery.fileupload-ui.js');
Yii::app()->assets->registerGlobalScript('extensions/phone.upload/js/main.js');
Yii::app()->assets->registerGlobalScript('global/plugins/select2/select2.min.js');
Yii::app()->assets->registerGlobalScript('global/plugins/bootbox/bootbox.min.js');
Yii::app()->assets->registerGlobalScript('extensions/editor/kindeditor-min.js');
Yii::app()->assets->registerGlobalScript('extensions/editor/lang/zh_CN.js');
Yii::app()->assets->registerGlobalScript('custom.files/js/handle.save.product.js');

//loading data;
$id = Yii::app()->data->getValue('id');
if (is_null($id)) {
	$this->redirect(array('backend/deny'));
}
$id = base64_decode($id);
$product = new wrx_model_product();
$result = $product->load_unit_by_id($id);
if (!$result || is_null($product->getValue('id')) || $product->getValue('id')
	< 1) {
	$this->
		redirect(array('backend/deny'));
}

$code = urldecode($product->getValue('p_id'));
?>
	<div class="form-horizontal">
		<input type="hidden" id="des" value="<?php echo md5('product' . $code);?>">
		<input type="hidden" id="p_id" value="<?php echo $code;?>">
		<input type="hidden" id="uploadUrl" value="<?php echo Yii::app()->assets->getUrlPath('backend/upload')?>">
		<input type="hidden" id="indentify" value="<?php echo Yii::app()->weixin->getId();?>">
		<input type="hidden" id="pid" value="<?php echo $product->getValue('id')?>">
		<div id="fileupload" class="form-horizontal form-bordered">
			<div class="form-group">
				<label class="col-md-2 control-label" for="title">产品名称</label>
				<div class="col-md-9">
					<input id="p_name" class="form-control" value="<?php echo urldecode($product->getValue('p_name'))?>" placeholder="" type="text"></div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label" for="title">产品类别</label>
				<div class="col-md-9">
					<select id="p_type" class="form-control input-medium">
						<option value="1">德风生活馆</option>
						<option value="2">台湾生活馆</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label" for="title">产品图片</label>
				<div class="col-md-9">
					<div class="fileinput fileinput-new" data-provides="fileinput">
						<!-- Redirect browsers with JavaScript disabled to the origin page -->
						<!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
						<div class="row fileupload-buttonbar">
							<div class="col-lg-7" style="width:100%;">
								<!-- The fileinput-button span is used to style the file input field as button -->
								<span class="btn btn-success fileinput-button">
									<span>选择文件</span>
									<input name="files[]" multiple="" type="file">
									<input id="indentify" value="1" type="hidden">
									<input id="uploadUrl" value="http://localhost/cms/support/receive" type="hidden"></span>
								<button type="submit" class="btn btn-primary start">
									<span>全部上传</span>
								</button>
								<button type="reset" class="btn btn-warning cancel">
									<span>取消上传</span>
								</button>
								<!-- The global file processing state -->
								<span class="fileupload-process"></span>
							</div>
							<!-- The global progress state -->
							<div class="col-lg-5 fileupload-progress fade">
								<!-- The global progress bar -->
								<div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
									<div class="progress-bar progress-bar-success" style="width:0%;"></div>
								</div>
								<!-- The extended global progress state -->
								<div class="progress-extended">&nbsp;</div>
							</div>
						</div>
						<!-- The table listing the files available for upload/download -->
						<table role="presentation" class="table table-striped">
							<tbody class="files"></tbody>
						</table>
						<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            {% if (!i && !o.options.autoUpload) { %}
                <button class="btn btn-primary start" disabled>
                    <span>上传</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class="btn btn-warning cancel">
                    <span>取消</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
						<!-- The template to display files available for download -->
						<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        <td>
            <span class="preview">
                {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img style="width:auto;height:90px;" src="{%=file.thumbnailUrl%}"></a>
                {% } %}
            </span>
        </td>
        <td>
            {% if (file.error) { %}
                <div><span class="label label-danger">系统异常</span> {%=file.error%}</div>
            {% }  else { %}
                <div><span class="label label-success">上传成功</span></div>
             {% } %}
        </td>
        <td>
            {% if (file.deleteUrl) { %}
            {% } else { %}
                <button class="btn btn-warning cancel">
                    <span>确定</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2">选择标题背景图</label>
				<div class="col-md-9">
					<div class="fileinput fileinput-new" data-provides="fileinput">
						<div class="fileinput-new thumbnail" data="img_0" style="width: 180px; height: 60px;">
							<img id="img_0" src="<?php echo Yii::app()->
	assets->getUrlPath(urldecode($product->getValue('p_bg')))?>" alt="" >
							<input type="hidden" id="p_main_bg" value="<?php echo urldecode($product->getValue('p_bg'));?>"></div>
						<br>
						<a class="btn default weixin-image-choose" data-toggle="modal" data="bg_0" href="#responsive">选择图片</a>
						<!-- /.modal -->
					</div>
					<div class="clearfix margin-top-10">
						<span class="label label-danger">提示</span>
						背景图的建议比例为9:3
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label" for="title">产品简介</label>
				<div class="col-md-9">
					<input id="p_introduction" class="form-control" value="<?php echo urldecode($product->getValue('p_des'))?>" placeholder="" type="text"></div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label" for="title">详细信息</label>
				<div class="col-md-9">
					<textarea id="p_details" name="p_details" style="width:100%;height:200px;visibility:hidden;">
						<?php echo urldecode($product->getValue('p_details'))?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-1 control-label" for="title"></label>
				<div class="col-md-10">
					<div class="row">
						<div class="tabbable tabbable-custom">
							<ul class="nav nav-tabs">
								<input type="hidden" value="d" id="p_view_type">
								<li class="active">
									<a aria-expanded="true" href="#tab_1_1" data-toggle="tab">默认视图</a>
								</li>
								<li class="">
									<a aria-expanded="false" href="#tab_1_2" data-toggle="tab">自定义HTML</a>
								</li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane fontawesome-demo active" id="tab_1_1">
									<div class="note note-success">
										<p>提示：选择此选项卡，您将使用默认html页面作为产品的展示界面。</p>
									</div>

									<div class="form-horizontal">
										<div class="form-group">
											<label class="control-label col-md-2">产品图片</label>
											<div class="col-md-9">
												<div class="fileinput fileinput-new" data-provides="fileinput">
													<div class="fileinput-new thumbnail" data="img_a" style="width: 100px; height: 100px;">
														<img id="img_a" src="<?php echo Yii::app()->
	assets->getUrlPath(urldecode($product->getValue('p_photo')))?>" alt="">
														<input id="weixin_sub_img_a" value="<?php echo urldecode($product->getValue('p_photo'));?>" type="hidden"></div>
													<br>
													<a class="btn default weixin-image-choose" data-toggle="modal" data="bg_a" href="#responsive">选择图片</a>
													<!-- /.modal -->
												</div>
												<div class="clearfix margin-top-10">
													<span class="label label-danger">提示</span>
													产品图片的建议比例为1:1
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label" for="title">价格</label>
											<div class="col-md-9">
												<input id="p_price" class="form-control" value="<?php echo $product->getValue('p_price')?>" placeholder="" type="text"></div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label" for="title">当前优惠说明</label>
											<div class="col-md-9">
												<textarea id="p_off_details" class="form-control" type="text"><?php echo trim(urldecode($product->getValue('p_activity')))?></textarea>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label" for="title">优惠价格</label>
											<div class="col-md-9">
												<input id="p_off_price" class="form-control" value="<?php echo $product->getValue('p_off_price')?>" placeholder="" type="text"></div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label" for="title">启用优惠</label>
											<div class="col-md-9">
												<input type="checkbox" id='p_off_trigger'></div>
										</div>
										<div class="portlet box blue weixin-subdes" style="display:none;" data="0">
											<div class="portlet-title">
												<div class="caption"> <i class="fa icon-envelope-letter"></i>
													<label class="title">新介绍段落</label>
												</div>
												<div class="tools">
													<a title="" data-original-title="" href="javascript:;" class="collapse"></a>
													<a title="" data-original-title="" href="javascript:;" class="remove"></a>
												</div>
											</div>
											<div class="portlet-body form">
												<!-- BEGIN FORM-->
												<div class="form-body">
													<div class="form-group">
														<label class="control-label col-md-3">标题</label>
														<div class="col-md-6">
															<div class="input-icon"> <i class="fa icon-pencil"></i>
																<input class="form-control weixin-sub-name" placeholder="请输入消息标题" value="新介绍段落" type="text"></div>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">展示背景图</label>
														<div class="col-md-9">
															<div class="fileinput fileinput-new" data-provides="fileinput">
																<div class="fileinput-new thumbnail" data="img_" style="width: 180px; height: 120px; display:none;">
																	<img id="img_" src="" alt="">
																	<input class="weixin-sub-img" type="hidden"></div>
																<br>
																<a class="btn default weixin-image-choose" data-toggle="modal" data="bg_" href="#responsive">选择图片</a>
																<!-- /.modal -->
															</div>
															<div class="clearfix margin-top-10">
																<span class="label label-danger">提示</span>
																介绍图片的建议比例为9:6
															</div>
														</div>
													</div>
													<div class="form-group last">
														<label class="control-label col-md-3">介绍段落</label>
														<div class="col-md-9">
															<textarea class="weixin-sub-des" style="width:100%;height:200px;visibility:hidden;">请输入产品详细介绍</textarea>
															<!-- <textarea class="form-control weixin-sub-des" value="" placeholder="" type="text"></textarea>
														-->
													</div>
												</div>
											</div>
											<!-- END FORM-->
										</div>
									</div>
									<?php
$des = $product->
	getValue('p_image');
$json = json_decode($des);
$index = 1;

if (!is_null($json)) {
	if (count($json) > 0) {
		foreach ($json as $key => $item) {
			$title = $item->{'title'};
			$img = $item->{'img'};
			$des = $item->{'des'};

			echo '
	<script type="text/javascript">
	KindEditor.ready(function(K) {

  sub_des[' . $index . '] = K.create(\'textarea[name="weixin_sub_des_' . $index . '"]\', {
    allowFileManager: true
  });
});
</script>
									<div class="portlet box blue weixin-subdes" style="display:;" data="' . $index . '">
										<div class="portlet-title">
											<div class="caption">
												<i class="fa icon-envelope-letter"></i>
												<label class="title"></label>
											</div>
											<div class="tools">
												<a title="" data-original-title="" href="javascript:;" class="collapse"></a>
												<a title="" data-original-title="" href="javascript:;" class="remove"></a>
											</div>
										</div>
										<div class="portlet-body form">
											<!-- BEGIN FORM-->
											<div class="form-body">
												<div class="form-group">
													<label class="control-label col-md-3">标题</label>
													<div class="col-md-6">
														<div class="input-icon">
															<i class="fa icon-pencil"></i>
															<input class="form-control weixin-sub-name" id="weixin_sub_name_' . $index . '" placeholder="请输入消息标题" value="' . urldecode($title) . '" type="text"></div>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">展示背景图</label>
													<div class="col-md-9">
														<div class="fileinput fileinput-new" data-provides="fileinput">
															<div class="fileinput-new thumbnail" data="img_' . $index . '" style="width: 180px; height: 120px;">
																<img id="img_' . $index . '" src="' . Yii::app()->assets->getUrlPath(urldecode($img)) . '" alt="">
																<input id="weixin_sub_img_' . $index . '" class="weixin-sub-img" value="' . urldecode($img) . '" type="hidden"></div>
															<br>
															<a class="btn default weixin-image-choose" data-toggle="modal" data="bg_' . $index . '" href="#responsive">选择图片</a>
															<!-- /.modal -->
														</div>
														<div class="clearfix margin-top-10">
															<span class="label label-danger">提示</span>
															介绍图片的建议比例为9:6
														</div>
													</div>
												</div>
												<div class="form-group last">
													<label class="control-label col-md-3">介绍段落</label>
													<div class="col-md-9">
														<textarea id="weixin_sub_des_' . $index . '" class="weixin-sub-des"  name="weixin_sub_des_' . $index . '" style="width:100%;height:200px;visibility:hidden;">
														' . urldecode($des) . '</textarea>
													</div>
												</div>
											</div>
											<!-- END FORM-->
										</div>
									</div>
									';
			$index++;
		}
	}
}
?>
									<button class="btn blue weixin-create-subdes" onclick="return false;">
										<i class="fa fa-plus-square"></i>
										添加新介绍段落
									</button>
								</div>
							</div>
							<div class="tab-pane glyphicons-demo" id="tab_1_2">
								<div class="note note-success">
									<p>提示：选择此选项卡，您将使用自定义的html页面作为产品的展示界面，所显示的内容均以您设计的页面为准。</p>
								</div>
								<textarea name="content" style="width:100%;height:400px;visibility:hidden;">欢迎使用自定义HTML编辑器</textarea>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-1 control-label" for="title"></label>
			<div class="col-md-2">
				<a class="btn green-meadow btn-lg weixin-save-product">保存</a>
			</div>

			<div class="col-md-2">
				<input type="hidden" value="<?php echo Yii::app()->
	assets->getUrlPath('support/item')?>" id="preview_url">
				<a id="product_preview" href="<?php echo Yii::app()->
	assets->getUrlPath('support/item/id/' . base64_encode($product->getValue('id')))?>" target="_blank" class="btn green btn-lg">预览
				</a>
			</div>

			<div class="col-md-2">
				<a href="javascript:;" class="btn red btn-lg">取消</a>
			</div>
		</div>
	</div>
</div>
<div >
	<div id="responsive" class="modal fade" tabindex="-1" data-width="760" style="position:fixed;width:80%; height:90%; top:5%; left:35%">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
			<h4 class="modal-title">图片素材</h4>
		</div>
		<div class="modal-body" id="wrx_modal_body"></div>
		<div class="modal-footer">
			<button type="button" data-dismiss="modal"  class="btn blue">关闭</button>
		</div>
	</div>
</div>