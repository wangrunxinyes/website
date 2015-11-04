<?php

class BasicApi{

	public $data;
	public $json; 
	public $type;
	public $msg;
	public $result;
	public static $NO_ERROR = 0;

	public static function create(){
		$obj = new self();
		$obj->init();
		return $obj;
	}

    public function init(){
    	
    	$this->json = new Output();
    	$this->json->init($this->data);
    	$this->result = array();
    	$this->type = 0;
    	$this->msg = "";

    }

    public function print_error($type, $msg){
    	
    	$this->json->setResultType($type);

    	$this->json->error($msg);

    	exit;
    }

    public function print_result($type, $result){

    	$this->json->setResultType($type);

    	$this->json->setResultData($result);

    	$this->json->output();

    	exit;

    }
}

?>