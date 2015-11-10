<?php


set_time_limit(0);

$helper = new map_helper();

$id = '13800012';

while ($id < 13900001) {
$skip = false;
$data = curl_helper::curl("http://www.dianping.com/shop/".$id);

$start = strpos($data, '<a class="city J-city">') + strlen('<a class="city J-city">');
if($start === false)
{
	$skip = true;
}
$data = substr($data, $start);
$end = strpos($data, '<');
$city = substr($data, 0 , $end);
// print_r($city);


$start = strpos($data, '<a class="current-category J-current-category">') + strlen('<a class="current-category J-current-category">');
if($start === false)
{
	$skip = true;
}
$data = substr($data, $start);
$end = strpos($data, '<');
$type = substr($data, 0 , $end);
// print_r($type);

$start = strpos($data, '<h1 class="shop-name">') + strlen('<h1 class="shop-name">');
if($start === false)
{
	$skip = true;
}
$data = substr($data, $start);
$end = strpos($data, '<');
$name = substr($data, 0 , $end);
// print_r($name);




if($type == "酒店"){
$start = strpos($data, '<p class="shop-address">') + strlen('<p class="shop-address">');
if($start === false)
{
	$skip = true;
}
$data = substr($data, $start);
$end = strpos($data, '<');
$address = substr($data, 0 , $end);
// print_r($address);


	$start = strpos($data, '<div class="hotel-facilities">') + strlen('<div class="hotel-facilities">');
if($start === false)
{
	$skip = true;
}
$data = substr($data, $start);

$start = strpos($data, '电话:') + strlen('电话:');
if($start === false)
{
	$skip = true;
}

$data = substr($data, $start);
$end = strpos($data, '</span>');
$phone = substr($data, 0 , $end);
}else{
$start = strpos($data, 'itemprop="street-address" title="') + strlen('itemprop="street-address" title="');
if($start === false)
{
	$skip = true;
}
$data = substr($data, $start);
$end = strpos($data, '"');
$address = substr($data, 0 , $end);
// print_r($address);


	$start = strpos($data, '<span class="item" itemprop="tel">') + strlen('<span class="item" itemprop="tel">');
if($start === false)
{
	$skip = true;
}
$data = substr($data, $start);
$end = strpos($data, '</span>');
$phone = substr($data, 0 , $end);
}

// print_r($phone);

if(!$skip)
{
	$helper->store_data($city, $name, $address, $phone, $type, $id);
}

$id++;

}


exit;




/**
* 
*/
class point
{
	public $a;
	public $b;
	public $x;
	public $y;

	function __construct($a, $b, $x, $y)
	{
		$this->a = $a;
		$this->b = $b;
		$this->x = $x;
		$this->y = $y;
	}

	function add_x(){
		$point = new self($this->a, $this->b, $this->x, $this->y);
		if($point->x + 1 > 9999){
			$point->a += 1;
			$point->x = $point->x + 1 - 9999;
		}else{
			$point->x += 1;
		}
		return $point;
	}

	function add_y(){
		$point = new self($this->a, $this->b, $this->x, $this->y);
		if($point->y + 1 > 9999){
			$point->b += 1;
			$point->y = $point->y + 1 - 9999;
		}else{
			$point->y += 1;
		}
		return $point;
	}
}

// $category = $_GET['category'];
// $bounds = $_GET['bounds'];

// 22°26 ′～ 23°56
// 112°57 ′～ 114°03

// 113°46'～114°37
// 22°27'～22°52'

//114.1244
//22.5475


$location = R::load("location", 1);
$point_a = new point($location->a, 
	$location->b, 
	$location->x, 
	$location->y);

$point_b = $point_a->add_x();
$point_b = $point_b->add_y();

$category = urlencode("百货");
$store_category = "购物广场";
$i = 0;
$j = 0;
$type = array(
	'百货' => '购物, 广场',
	'超市' => '购物, 广场',
	'便利店' => '购物, 广场',
	'百货' => '购物, 广场',
	'娱乐' => '娱乐',
	'KTV' => '娱乐',
	'网吧' => '娱乐',
	'游戏厅' => '娱乐',
	'桑拿' => '娱乐',
	'体育馆' => '娱乐',
	'运动场' => '娱乐',
	'旅游' => '娱乐',
	'文化' => '娱乐',
	'洗浴' => '娱乐',
	'餐馆' => '餐饮',
	'小吃' => '餐饮',
	'美食' => '餐饮',
	'火锅' => '餐饮',
	'粤菜' => '餐饮',
	'面包' => '餐饮',
	'奶茶' => '餐饮',
	'甜品' => '餐饮',
	'麦当劳' => '餐饮',
	'快餐' => '餐饮',
	'医疗门诊' => '医疗',
	'医院' => '医疗',
	'药店' => '医疗',
	'诊所' => '医疗',
	'汽修' => '汽车行业',
	'汽修' => '汽车行业',
	'酒店' => '住宿',
	'快捷酒店' => '住宿',
);

foreach ($type as $key => $value) {
	$category = urlencode($key);
	$store_category = urlencode($value);
	//Logger::log("category: " . urldecode($category));
	$i = 0;

	while ($i < 4) {
		$j = 0;
		while ($j < 4) {

			$bounds = $point_a->a ."."
			. $point_a->x . "," . $point_a->b .".". $point_a->y;
			// . ","
			// 	. $point_b->a .".". $point_b->x . "," 
			// 	. $point_b->b .".". $point_b->y;
			

// $url = 'http://api.map.baidu.com/place/v2/search?query=' . $category
			// 	. '&location=22.546,113.941&radius=2000&output=json&ak=X4QYNSSzEH46X7xp10GkCIxF';

			$request = "http://".$_SERVER['HTTP_HOST']
			.Yii::app()->assets->getUrlPath("/wang/poi/bounds/"
				.$bounds."/category/".$category."/store/".$store_category);	
			echo curl_helper::curl($request);
			$point_a = $point_a->add_x();
			$point_b = $point_b->add_x();
			$j++;
		}
		$point_a = $point_a->add_y();
		$point_b = $point_b->add_y();
		$i++;
	}

}
$location = R::dispense("location");
$location->a = $point_b->a;
$location->b = $point_b->b;
$location->x = $point_b->x;
$location->y = $point_b->y;
R::store($location);
?>