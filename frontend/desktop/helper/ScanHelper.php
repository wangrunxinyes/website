<?php

/**
 *
 */
class ScanHelper {

	function __construct() {
		# code...
	}

	public static function scan($dir) {
		$file = scandir($dir);
		return $file;
	}
}
?>