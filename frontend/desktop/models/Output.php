<?php

class Output extends CFormModel

{

	private $api_key;
	private $ps;
	private $result;

	public function init($array = "")

	{
		if($array != null && $array != "")
		{
			if(isset($array['api_key']))
			{
				$this->api_key = $array['api_key'];
			}

			if(isset($array['ps']))
			{
				$this->ps = $array['ps'];
			}
		}

		$this->result = array();

	}

	public function push($value)
	{
		if(empty($this->result))
		{
			$this->init();
		}
		array_push($this->result, $value);
	}

	public function add($key, $value)
	{
		if(empty($this->result))
		{
			$this->init();
		}

		if($key == null || $key == "")
		{
			//error;
		}else{
			$this->result[$key] = $value;
		}
	}

	public function error($msg){
		$this->add("api_key", $this->api_key);
		if($msg == null || $msg == ""){
			$this->add("error", "Unknown");
		}else{
			$this->add("error", $msg);
		}
		$this->add("data", "none");
		$this->add("response_type", "fail");
		$this->add("ps", $this->ps);
		$this->add("time", time());
		$this->add("format.time", date("Y-m-d H:i:s", time()));
		$json = json_encode($this->result);
		print_r($json);
	}

	public function setResultType($data){
		$this->add("result_type", $data);
	}

	public function setResultData($data){
		$this->add("data", $data);
	}

	public function output(){
		if(empty($this->result))
		{
			echo "";
		}else{
			$this->add("api_key", $this->api_key);
			$this->add("error", "none");
			$this->add("response_type", "success");
			$this->add("ps", $this->ps);
			$this->add("time", time());
			$this->add("format.time", date("Y-m-d H:i:s", time()));
			$json = json_encode($this->result);
			print_r($json);
		}
	}

}

?>