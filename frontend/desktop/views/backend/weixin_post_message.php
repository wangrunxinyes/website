<?php
Yii::app()->
	assets->registerGlobalCss('extensions/phone.upload/css/style.css');
Yii::app()->assets->registerGlobalCss('extensions/phone.upload/css/jquery.fileupload.css');
Yii::app()->assets->registerGlobalCss('extensions/phone.upload/css/jquery.fileupload-ui.css');
// Yii::app()->assets->registerGlobalCss('extensions/phone.upload/css/jquery.fileupload-ui-noscript.css');
// Yii::app()->assets->registerGlobalCss('extensions/phone.upload/css/jquery.fileupload-noscript.css');
Yii::app()->assets->registerGlobalCss('extensions/phone.upload/css/blueimp-gallery.min.css');
Yii::app()->assets->registerGlobalCss('global/plugins/bootstrap/css/bootstrap.min.css');
// Yii::app()->assets->registerGlobalCss('global/css/components.css');

Yii::app()->assets->registerGlobalCss('global/plugins/bootstrap-fileinput/bootstrap-fileinput.css');
Yii::app()->assets->registerGlobalCss('global/plugins/bootstrap-modal/css/bootstrap-modal-s.css');
Yii::app()->assets->registerGlobalCss('global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css');

Yii::app()->assets->registerGlobalScript('global/plugins/bootstrap-fileinput/bootstrap-fileinput.js');
Yii::app()->assets->registerGlobalScript('custom.files/js/weixin.handle.msg.edit.js');
//引入js
Yii::app()->assets->registerGlobalScript('extensions/phone.upload/js/tmpl.min.js');
Yii::app()->assets->registerGlobalScript('extensions/phone.upload/js/load-image.all.min.js');
Yii::app()->assets->registerGlobalScript('extensions/phone.upload/js/canvas-to-blob.min.js');
Yii::app()->assets->registerGlobalScript('extensions/phone.upload/js/bootstrap.min.js');
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
Yii::app()->assets->registerGlobalScript('global/plugins/bootstrap-modal/js/bootstrap-modal.js');
Yii::app()->assets->registerGlobalScript('global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js');

?>
<div class="portlet box green">
	<input type="hidden" id="resourse_url" value="<?php echo Yii::app()->
	assets->getUrlPath('backend/ajax')?>">
	<input type="hidden" id="uploadUrl" value="<?php echo Yii::app()->
	assets->getUrlPath('backend/upload')?>">
	<input type="hidden" id="indentify" value="<?php echo Yii::app()->
	weixin->getId();?>">
	<div class="portlet-title">
		<div class="caption"> <i class="fa icon-envelope-open"></i>
			推送消息
		</div>
	</div>
	<div class="portlet-body form">
		<!-- BEGIN FORM-->
		<form id="fileupload" class="form-horizontal form-bordered">
			<div class="form-body">
				<div class="form-group">
					<label class="control-label col-md-3">标题</label>
					<div class="col-md-3">
						<div class="input-icon"> <i class="fa icon-pencil"></i>
							<input id="msg_main_title" class="form-control" placeholder="请输入消息标题" type="text"></div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3">上传新素材</label>
					<div class="col-md-9">
						<div class="fileinput fileinput-new" data-provides="fileinput">
							<!-- Redirect browsers with JavaScript disabled to the origin page -->
							<!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
							<div class="row fileupload-buttonbar">
								<div class="col-lg-7" style="width:100%;">
									<!-- The fileinput-button span is used to style the file input field as button -->
									<span class="btn btn-success fileinput-button">
										<span>选择文件</span>
										<input type="file" name="files[]" multiple>
										<input type="hidden" id="indentify" value="<?php echo Yii::app()->
	user->getModel('id');?>">
										<input type="hidden" id="uploadUrl" value="<?php echo Yii::app()->assets->getUrlPath('support/receive');?>"></span>
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
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
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
					<label class="control-label col-md-3">选择标题背景图</label>
					<div class="col-md-9">
						<div class="fileinput fileinput-new" data-provides="fileinput">
							<div class="fileinput-new thumbnail" data="img_0" style="width: 180px; height: 100px; display:none;">
								<img id="img_0" src="" alt="" >
								<input type="hidden" id="msg_main_bg"></div>
							<br>
							<a class="btn default weixin-image-choose" data-toggle="modal" data="bg_0" href="#responsive">选择图片</a>
							<!-- /.modal -->
						</div>
						<div class="clearfix margin-top-10">
							<span class="label label-danger">提示</span>
							背景图的建议尺寸为360*200
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3">指向地址</label>
					<div class="col-md-9">
						<div class="input-icon">
							<i class="fa icon-pencil"></i>
							<input type="hidden" id="msg_main_id" value="new">
							<input id="msg_main_link" class="form-control" placeholder="用户点击消息后要跳转的页面" value="http://" type="text"></div>
					</div>
				</div>
				<div class="form-group last">
					<label class="control-label col-md-3">子标题</label>
					<div class="col-md-9" id="msg_sub_menu">
						<div class="portlet box blue weixin-submenu" style="display:none;" data="0">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa icon-envelope-letter"></i>
									<label class="title">新子菜单</label>
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
												<input class="form-control weixin-sub-name" placeholder="请输入消息标题" value="新子菜单" type="text"></div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">选择标题背景图</label>
										<div class="col-md-9">
											<div class="fileinput fileinput-new" data-provides="fileinput">
												<div class="fileinput-new thumbnail" data="img_" style="width: 100px; height: 100px; display:none;">
													<img id="img_" src="" alt="" >
													<input type="hidden" id="msg_bg_"></div>
												<br>
												<a class="btn default weixin-image-choose" data-toggle="modal" data="bg_" href="#responsive">选择图片</a>
												<!-- /.modal -->
											</div>
											<div class="clearfix margin-top-10">
												<span class="label label-danger">提示</span>
												子菜单图片的建议尺寸为200*200
											</div>
										</div>
									</div>
									<div class="form-group last">
										<label class="control-label col-md-3">指向地址</label>
										<div class="col-md-9">
											<div class="input-icon">
												<i class="fa icon-pencil"></i>
												<input class="weixin-msg-id" type="hidden" id="msg_id_" value="new">
												<input class="form-control weixin-sub-link" placeholder="用户点击消息后要跳转的页面" value="http://" type="text"></div>
										</div>
									</div>
								</div>
								<!-- END FORM-->
							</div>
						</div>
						<div class="portlet box blue weixin-submenu" data="1">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa icon-envelope-letter"></i>
									<label class="title">新子菜单</label>
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
												<input id="weixin_sub_name_1" class="form-control" placeholder="请输入消息标题" value="新子菜单" type="text"></div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">选择标题背景图</label>
										<div class="col-md-9">
											<div class="fileinput fileinput-new" data-provides="fileinput">
												<div class="fileinput-new thumbnail" data="img_1" style="width: 100px; height: 100px; display:none;">
													<img id="img_1" src="" alt="" >
													<input type="hidden" id="msg_bg_1"></div>
												<br>
												<a class="btn default weixin-image-choose" data-toggle="modal" data="bg_1" href="#responsive">选择图片</a>
												<!-- /.modal -->
											</div>
											<div class="clearfix margin-top-10">
												<span class="label label-danger">提示</span>
												子菜单图片的建议尺寸为200*200
											</div>
										</div>
									</div>
									<div class="form-group last">
										<label class="control-label col-md-3">指向地址</label>
										<div class="col-md-9">
											<div class="input-icon">
												<i class="fa icon-pencil"></i>
												<input class="weixin-msg-id" type="hidden" id="msg_id_1" value="new">
												<input id="weixin_sub_link_1" class="form-control weixin-sub-link" placeholder="用户点击消息后要跳转的页面" value="http://" type="text"></div>
										</div>
									</div>
								</div>
								<!-- END FORM-->
							</div>
						</div>
						<button class="btn blue weixin-create-submenu" onclick="return false;">
							<i class="fa fa-plus-square"></i>
							添加新子菜单
						</button>
					</div>
				</div>
			</div>
			<div class="form-actions">
				<div class="row">
					<div class="col-md-offset-3 col-md-9">
						<button type="submit" class="btn green weixin-submit-msg" onclick="return false;">
							<i class="fa fa-check"></i>
							储存
						</button>
						<button type="button" class="btn default">取消</button>
					</div>
				</div>
			</div>
		</form>
		<!-- END FORM-->
	</div>
</div>
<!-- responsive -->
<div >
	<div id="responsive" class="modal fade" tabindex="-1" data-width="760" style="position:fixed;width:80%; height:50%; top:5%; left:35%">
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