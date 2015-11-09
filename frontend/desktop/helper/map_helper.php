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
					$result = true;
					foreach ($this->attributes as $value) {
						if (isset($item->{$value})) {
							$unit->$value = $item->{$value};
						} else {
							$result = false;
							break;
						}

					}
					if (!$result) {
						continue;
					}
					$unit->category = $category;
					$id = R::store($unit);
				}
			}
		}
	}
}

?>