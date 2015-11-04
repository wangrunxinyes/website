<?php

class BasicData{
	
	public $need_var_array;
	public $ex_var_array;
	public $db_array;
	public $value_array;

	public function init(){
		$this->need_var_array = array();
		$this->ex_var_array = array();
		$this->db_array = array();
		$this->value_array = array();
	}

	public function set($name, $value){
		$this->value_array[$name] = $value;
	}

	public function getAttributes(){
		return array("0"=>$this->need_var_array, "1"=>$this->ex_var_array, "2"=>$this->db_array, "3"=>$this->value_array);
	}
	
}

?>