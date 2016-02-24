<?php

/**
 *
 */
class wrx_view_download_files {

	function __construct() {
		# code...
	}

	public static function create($url, $title, $des, $size, $indentify) {

		echo '
<h3 class="page-title">
	<small>您的文件已经准备好 | Your file is ready for pickup.</small></h3>
';

		echo '
<div class="note note-success">
<p>报告类型：' . $title . '</p>
<p>报告内容：' . $des . '</p>
<p>文件代码：' . $indentify . '</p>
<p>文件大小：' . $size[1] . '</p>
</div>
';

		echo '
<a onClick="javascript :history.back(-1);" class="btn btn-lg blue"><i class="fa fa-chevron-left"></i>
返回 | Back
</a>
';

		echo '
<a href="' . $url . '" class="btn btn-lg green">
下载 | Download <i class="fa fa-arrow-circle-down"></i>
</a>
';

	}

	public static function error($title, $des, $indentify) {

		echo '
<h3 class="page-title">
<small>抱歉，您的文件无法导出 | Your file has error.</small>
</h3>
';

		echo '
<div class="note note-danger">
<p>报告类型：' . $title . '</p>
<p>报告内容：' . $des . '</p>
<p>文件代码：' . $indentify . '</p>
<p>生成结果：失败，数据为空或无法读取。如果您确定数据存在并频繁出现此问题，请联系开发人员。</p>
</div>
';

		echo '
<a onClick="javascript :history.back(-1);" class="btn btn-lg blue"><i class="fa fa-chevron-left"></i>
返回 | Back
</a>
';
	}

	public static function process($title, $des, $size, $indentify, $result) {

		echo '
<h3 class="page-title">
<small>您的操作已完成 | System has finished your request.</small>
</h3>
';

		echo '
<div class="note note-info">
<p>操作类型：' . $title . '</p>
<p>操作内容：' . $des . '</p>
<p>操作代码：' . $indentify . '</p>
<p>文件大小：' . $size[1] . '</p>
<p>结果：' . $result . '</p>
</div>
';

		echo '
<a onClick="javascript :history.back(-1);" class="btn btn-lg blue"><i class="fa fa-chevron-left"></i>
返回 | Back
</a>
';

	}
}

?>