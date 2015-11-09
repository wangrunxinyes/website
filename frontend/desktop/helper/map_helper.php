<?php

class map_helper {

	private $attributes;

	function __construct() {
		$this->attributes = array(
			"name",
			"address",
			"telephone",
		);
	}

	public function handle_data($stirng, $category) {
		$json = json_decode($stirng);
		if (isset($json->{'status'})) {
			if ($json->{'status'} == 0 || $json->{'status'} == "0") {
				$array = $json->{'results'};
				foreach ($array as $key => $item) {
					$unit = R::dispense("poi");
					foreach ($this->attributes as $value) {
						$unit->$value = $item->{$value};
					}
					$unit->category = $category;
					$id = R::store($unit);
				}
			}
		}
	}
}

?>