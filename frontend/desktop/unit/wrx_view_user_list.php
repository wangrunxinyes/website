<?php

class wrx_view_user_list extends wrx_page_unit_models {

	function __construct() {
		$this->type = 'backend_member_data_helper';
	}

	function execute_view() {
		if ($this->total == 0) {
			$this->result .= "无搜索结果";
		} else {
			$this->result = "";
			$index = $this->start_id;
			foreach ($this->list as $key => $user) {

				$visitor_ip = $user['ip'];
				$visitor_count = $user['count'];
				$visitor_lasttype = $user['type'];
				$visitor_last = date("Y-m-d H:i:s", $user['last_visit_time']);
				$visitor_create = date("Y-m-d H:i:s", $user['create_time']);

				if ($visitor_lasttype == "D") {
					$visitor_lasttype = "桌面设备";
				} else {
					$visitor_lasttype = "移动设备";
				}

				if ($user['create_time'] > strtotime(date('Y-m-d', strtotime('+0 day')))) {
					$visitor_create = "<label style='color:red;'>" . $visitor_create . "</label>";
				}

				$this->result .= '
<tr class="odd" role="row">
	<td class="sorting_1">' . $index . '</td>
	<td>' . $visitor_ip . '</td>
	<td>' . $visitor_count . '</td>
	<td>' . $visitor_lasttype . '</td>
	<td>' . $visitor_last . '</td>
	<td>' . $visitor_create . '</td>
	<td>
		<a href="' . Yii::app()->assets->getUrlPath('backend/userdetails/id/' . $user['ip']) . '" target="_blank" class="btn btn-xs default btn-editable"> <i class="fa fa-pencil"></i>
			查看详情
		</a>
	</td>
</tr>
';
				$index++;
			}
		}
	}
}
?>