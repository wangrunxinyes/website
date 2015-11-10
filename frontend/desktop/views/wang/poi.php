<?php

$bounds = $_GET['bounds'];
$category = $_GET['category'];
$store = $_GET['store'];
$page = 0;

// $url = 'http://api.map.baidu.com/place/v2/search?scope=2&page_size=20&query=' . urlencode($category)
// 				. '&bounds=' . $bounds
// 				. '&output=json&ak=X4QYNSSzEH46X7xp10GkCIxF';
$result = true;

while ($result) {
	$url = 'http://api.map.baidu.com/place/v2/search?scope=2&page_size=20'
.'&page_num='.$page.'&query=' . urlencode($category)
				. '&location='.$bounds.'&radius=100&output=json&ak=X4QYNSSzEH46X7xp10GkCIxF';


$data = curl_helper::curl($url);
$helper = new map_helper();

	$result = $helper->handle_data($data, $category, $store, $page);
	$page++;
}

?>