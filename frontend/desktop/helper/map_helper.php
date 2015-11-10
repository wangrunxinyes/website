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

	public function handle_data($stirng, $category, $store, $page) {
		$json = json_decode($stirng);
		$continue = false;
		if (isset($json->{'status'})) {
			if ($json->{'status'} == 0 || $json->{'status'} == "0") {
				$array = $json->{'results'};
				$total = $json->{'total'};
				if($total > 20 * ($page + 1)){
					$continue = true;
				}
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
					if(isset($item->{'detail_info'}))
					{
					$details = $item->{'detail_info'};

					if(isset($details->{'tag'}))
					{
						$unit->tag = $details->{'tag'};
					}

					if(isset($details->{'overall_rating'}))
					{
						$unit->rating = $details->{'overall_rating'};
					}
				}
					
					if (!$result) {
						continue;
					}
					$unit->category = $category;
					$unit->type = $store;
					$id = R::store($unit);
				}
			}
		}
		return $continue;
	}


	public function store_data($city, $name, $address, $phone, $type, $ref) {
		$unit = R::dispense("poi");
		$unit->city = $city;
		$unit->name = $name;
		$unit->address = $address;
		$unit->telephone = $phone;
		$unit->category = $type;
		$unit->type = $type;
		$unit->ref = $ref;
		try{
			$id = R::store($unit);
		}catch(Exception $ex){

		}
		
	}
}

?>