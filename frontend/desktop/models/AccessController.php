<?php

/**
 *
 */
class AccessController {

	function __construct() {
		# code...
	}

	public static function check() {
		$curClassId = Yii::app()->request->getUrl();

		$pos = strpos($curClassId, "backend/") + strlen("backend/");

		$curClassId = substr($curClassId, $pos);

		if (strpos($curClassId, "/") !== false) {
			$pos = strpos($curClassId, "/");
			$curClassId = substr($curClassId, 0, $pos);
		}

		$require_level = -1;

		switch ($curClassId) {
		case 'export':
		case 'editaccount':
		case 'accountsetup':
			$require_level = 1;
			break;
		case 'log':
			$require_level = 0;
			break;
		default:
			# code...
			break;
		}

		if ($require_level < 0) {
			return true;
		}

		//check login account
		if (Yii::app()->user->getModel('wrx_level') <= $require_level) {
			return true;
		} else {
			return false;
		}
	}
}

?>