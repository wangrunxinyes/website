<?php

class processer_ajax_class_name {
	public static function getClass($name) {
		$class = null;
		switch ($name) {
		case md5('weixin_user_analysis'):
			$class = 'wrx_view_user_behavior_list';
			break;
		case md5('weixin_user_group'):
			$class = 'wrx_view_user_group_list';
			break;
		case md5('weixin_user_list'):
			$class = 'wrx_view_user_list';
			break;
		case md5('profile_visitor_list'):
			$class = 'profile_visitor_list';
			break;
		case md5('wrx_product_list'):
			$class = 'wrx_view_product_list';
			break;
		default:
			break;
		}

		return $class;
	}
}

?>