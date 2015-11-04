<?php

/**
 * image unit
 */
class ImageUnit extends BasicUnit {

	function __construct($array = null) {

		$this->basic_attributes = array(
			'identify',
			'date',
			'type',
			'title',
			'des',
			'link',
			'value',
			'class',
		);

		$this->basic_indentify = "main_web_image_db";

		//handle data;
		if ($array != null) {
			$array['date'] = time();
			$array['identify'] = date('Y', time());
			if (!isset($array['class'])) {
				$array['class'] = 'other';
			}
		}

		$this->setValue($array);
	}
}

?>