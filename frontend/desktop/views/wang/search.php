<?php

// $category = $_GET['category'];
// $bounds = $_GET['bounds'];

$category = urlencode("银行");
$bounds = "39.915,116.404,39.975,116.414";

$url = 'http://api.map.baidu.com/place/v2/search?query=' . $category
	. '&bounds=' . $bounds
	. '&output=json&ak=X4QYNSSzEH46X7xp10GkCIxF';

$data = curl_helper::curl($url);
$helper = new map_helper();
$helper->handle_data($data, urldecode($category));
?>