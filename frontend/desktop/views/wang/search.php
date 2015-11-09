<?php

// $category = $_GET['category'];
// $bounds = $_GET['bounds'];

// 22°26 ′～ 23°56
// 112°57 ′～ 114°03

// 113°46'～114°37
// 22°27'～22°52'
set_time_limit(0);
$location_a_x = 547;
$location_a_y = 942;
$location_b_x = 548;
$location_b_y = 943;
$category = urlencode("百货");
$store_category = "购物广场";
$i = 0;
$j = 0;
$type = array(
	'百货' => '购物, 广场',
	'超市' => '购物, 广场',
	'便利店' => '购物, 广场',
	'娱乐' => '娱乐',
	'KTV' => '娱乐',
	'洗浴' => '娱乐',
	'餐馆' => '餐饮',
	'小吃' => '餐饮',
	'美食' => '餐饮',
);

foreach ($type as $key => $value) {
	$category = urlencode($key);
	$store_category = $value;

	Logger::log("category: " . urldecode($category));
	$i = 0;
	while ($i < 40) {
		$j = 0;
		while ($j < 40) {

			$bounds = "22." . $location_a_x . "," . "113." . $location_a_y . ","
				. "22." . $location_b_x . "," . "113." . $location_b_y;
			$url = 'http://api.map.baidu.com/place/v2/search?query=' . $category
				. '&bounds=' . $bounds
				. '&output=json&ak=X4QYNSSzEH46X7xp10GkCIxF';

// $url = 'http://api.map.baidu.com/place/v2/search?query=' . $category
			// 	. '&location=22.546,113.941&radius=2000&output=json&ak=X4QYNSSzEH46X7xp10GkCIxF';

			$data = curl_helper::curl($url);
			$helper = new map_helper();
			$helper->handle_data($data, $store_category);
			$location_a_x++;
			$location_b_x++;
			$j++;
		}
		$location_a_y++;
		$location_b_y++;
		$i++;
	}
}
?>