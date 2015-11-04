<?php

echo "Yii framework test";

echo "test widget";

$css = '
<div class="main">
<input type="text">
<lable>aaaaaaaaaaaa</lable>
</div>';

$cClipWidget = new CClipWidget();
$cClipWidget->beginClip("test");
$cClipWidget->widget('application.extensions.tinymce.ETinyMce',
	array('id' => 'buyer_bought_html',
		'name' => 'buyer_bought_html',
		'value' => $css,
		'editorTemplate' => 'full',
		'useSwitch' => false,
		'width' => '100%',
		'height' => '600px',
		'convertUrls' => false,
	)
);
$cClipWidget->endClip();
echo $cClipWidget->getController()->clips['test'];

$cClipWidget = new CClipWidget();
$cClipWidget->beginClip("test");
$cClipWidget->widget('application.extensions.tinymce.ETinyMce',
	array('id' => 'Deal_buyer_bought_html',
		'name' => 'Deal_buyer_bought_html',
		'value' => $css,
		'editorTemplate' => 'full',
		'useSwitch' => false,
		'width' => '100%',
		'height' => '600px',
		'convertUrls' => false,
	)
);
$cClipWidget->endClip();
echo $cClipWidget->getController()->clips['test'];

$cs = Yii::app()->getClientScript();
$assets = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.extensions.tinymce'));
$cs->registerScriptFile($assets . '/assets/tiny_mce/tiny_mce.js');

?>