<?php

class processer_product_analysis {

	private $frequency;
	private $report;

	function __construct() {
		# code...
	}

	function count_behavior() {
		$time = time() - 3600 * 24 * 30;
		$sql = 'select ref_key from wrx_model_behavior where behavior_type = "product" AND target_id = "'
		. Yii::app()->weixin->getWeixin('weixin_app_key') . '" AND time > "' . $time . '"';
		$behaviors = R::getAll($sql);
		$data = array();
		foreach ($behaviors as $key => $value) {
			array_push($data, $value['ref_key']);
		}
		$count = array_count_values($data);
		$data = array();
		$report = array();
		$t = 0;
		$d = 0;
		foreach ($count as $key => $value) {
			$product = new wrx_model_product();
			$product->load_unit_by_id($key);
			if ($product->getValue('id') == $key) {
				$data['product'][$product->getValue('p_name')] = $value;
				if ($product->getValue('p_type') == 1) {
					$type = "德风生活馆";
					$d += $value;
				} else if ($product->getValue('p_type') == 2) {
					$type = "台湾生活馆";
					$t += $value;
				}
				$details = array(
					'id' => base64_encode($product->getValue('id')),
					'price' => $product->getValue('p_price'),
					'click' => $value,
					'type' => $type,
					'time' => $product->getValue('p_time'),
				);
				$report[$product->getValue('p_name')] = $details;
			}
		}
		$data['type'] = array('德风生活馆' => $d, '台湾生活馆' => $t);
		$this->frequency = $data;
		$this->report = array_merge(array("德风生活馆" => $d, "台湾生活馆" => $t), $report);
	}

	function getFrequency() {
		return $this->frequency;
	}

	function getDetails() {
		return $this->report;
	}
}

?>