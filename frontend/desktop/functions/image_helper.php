<?php

/**
 * image helper
 */
class image_helper {

	function __construct() {
		# code...
	}

	public function load_image_by_attribute($key) {

	}

	public function load_image_by_id() {

	}

	public function store_image($img) {

		$post = R::dispense('main_web_image_db');

		foreach ($img->getAttribute() as $value) {
			$post->$value = $img->getValue($value);
		}

		$id = R::store($post);

	}
}

?>