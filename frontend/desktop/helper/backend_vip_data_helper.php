<?php

/**
 *
 */
class backend_vip_data_helper {

	function __construct() {
		# code...
	}

	public static function get_data_by_page_number($page) {
		$start_id = 10 * (-1 + $page);
		$sql = 'select * from profile_visitor'
		//. ' where create_time > "' . strtotime(date('Y-m-d', strtotime('+0 day')))
		 . ' limit ' . $start_id . ', 10;';
		$data = R::getAll($sql);
		$sql = 'select count(*) as num from profile_visitor'
		//. ' where create_time > "' . strtotime(date('Y-m-d', strtotime('+0 day')))
		 . '';
		$num = R::getAll($sql);
		$data['num'] = $num[0]['num'];

		return $data;
	}

	public static function get_data_by_search($json) {

		$str = ' where ';
		$page = 1;
		$sql = 'select user.*, card.member_card_id as cid, card.create_time as ctime ';
		$source = 'from weixin_user_db user left join weixin_membercard_db card '
			. 'on user.user_id = card.user_id ';
		foreach ($json as $key => $value) {
			if ($key != "page") {
				$str .= $key . ' LIKE "%' . $value . '%" AND ';
			} else {
				$page = $value;
			}
		}

		$str = substr($str, 0, strlen($str) - 4);

		$start_id = 10 * (-1 + $page);
		$query = $sql . $source . $str . ' limit ' . $start_id . ', 10;';
		$data = R::getAll($query);
		$query = 'select COUNT(*) as num ' . $source . $str;
		$num = R::getAll($query);
		if (!is_null($num)) {
			if (isset($num[0])) {
				$data['num'] = $num[0]['num'];
			}
		}
		if (!isset($data['num'])) {
			$data['num'] = 0;
		}

		return $data;

		// return array('sql' => $query);
	}
}

?>