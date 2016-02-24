<?php

class visitors_helper {
	public static function getNewMsgNum() {

	}

	public static function getNewVisitors() {
		$attrName = "web_visitor";
		$search = ' create_time > :ip';
		$searchValue = array(
			':ip' => strtotime(date('Y-m-d', strtotime('+0 day'))),
		);

		$items = R::find($attrName, $search, $searchValue);
		$items = R::exportAll($items);
		return count($items);
	}

	public static function getAllVisitorsNumber() {

	}
}

?>