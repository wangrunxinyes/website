<?php

class wrx_system_export_helper {
	private $identify;
	private $title;
	private $des;
	private $data;

	function __construct() {
		# code...
	}

	public function execute() {

	}

	public function set_attribute($identify, $title, $des, $data) {
		$this->identify = $identify;
		$this->title = $title;
		$this->des = $des;
		$this->data = $data;
	}

	public function get_identify() {
		return $this->identify;
	}

	public function get_title() {
		return $this->title;
	}

	public function get_des() {
		return $this->des;
	}

	public function get_data() {
		return $this->data;
	}

	public function create($type, $period) {
		$period = self::period_check($period);
		$unset_arr = array('id');
		switch ($type) {
		case 'weixin_msg':
			$this->title = "用户信息";
			$sql = 'select msg.keyword, msg.time, msg.reply, user.weixin_name from weixin_message_db msg left join '
			. 'weixin_user_db user on msg.fromusername = user.user_id '
			. 'where msg.time > "' . $period['s'] . '" '
			. 'AND msg.time < "' . $period['e'] . '" ';
			//$unset_arr = array('id', 'post_by', 'details', 'main_msg_id');
			break;
		case 'weixin_new_user':
			# code...
			break;
		case 'weixin_member_user':
			# code...
			break;
		case 'weixin_user_activity':
			# code...
			break;
		case 'post_msg_history':
			$this->title = "微信推送记录";
			$sql = 'select re.*, msg.title from weixin_post_msg_record_db re left join '
			. 'weixin_post_msg_db msg on re.main_msg_id = msg.id '
			. 'where post_time > "' . $period['s'] . '" '
			. 'AND post_time < "' . $period['e'] . '" ';
			$unset_arr = array('id', 'post_by', 'details', 'main_msg_id');
			break;
		case 'post_msg_click':
			# code...
			break;
		case 'product_activity':
			# code...
			break;
		case 'weixin_user_activity':
			# code...
			break;
		default:
			# code...
			break;
		}

		$data = R::getAll($sql);
		$sql = 'SELECT FOUND_ROWS() num;';
		$num = R::getAll($sql);
		foreach ($data as $key => $value) {
			if (is_array($value)) {
				unset($data[$key]);
				foreach ($unset_arr as $k) {
					unset($value[$k]);
				}
				$data[$key] = $value;
			}
		}
		$data['num'] = $num[0]['num'];
		$this->des = "记录开始时间：" . $period['read-s']
		. ", 结束时间：" . $period['read-e'] . ", 数据共" . $data['num'] . "条。";
		$this->identify = md5($type . $period['i']);
		$this->data = $data;
	}

	public function period_check($period) {
		$year = $period['Y'];
		$month = $period['M'];
		$n_month = $month + 1;
		$n_year = $year;

		$start = mktime(0, 0, 0, $month, 1, $year);
		$end = mktime(0, 0, 0, $n_month, 1, $n_year) - 1;
		return array(
			"s" => $start,
			"e" => $end,
			"read-s" => date("Y-m-d H:i:s", $start),
			"read-e" => date("Y-m-d H:i:s", $end),
			"i" => $start . $end,
		);
	}
}

?>
