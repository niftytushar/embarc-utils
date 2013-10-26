<?php
require_once("mysql_interface.php");

class SERVER
{
	public $mInterface;
	
	public function __construct() {
		$this->mInterface = new MYSQL_INTERFACE();
	}
	
	public function getServersList() {
		return $this->mInterface->sm_getServers();
	}
	
	public function getServer($id) {
		return $this->mInterface->sm_getServerDetails($id);
	}
	
	public function addServer($data, $id = false) {
		$str = array();
		
		foreach($data as $key=>$value) {
			array_push($str, $key."='".$this->mInterface->escapeString($value)."'");
		}
		
		$queryPart = join(",", $str);
		
		if($id) {
			$result = $this->mInterface->sm_updateServer($queryPart, $id);
		} else {
			$result = $this->mInterface->sm_addServer($queryPart);
		}
		
		if($result) return "SUCCESS";
		else return "ERROR";
	}
	
	public function removeServer($id) {
		if($this->mInterface->sm_removeServer($id)) {
			return "SUCCESS";
		} else {
			return "ERROR";
		}
	}
	
	public function getStatus($ip) {
		
		//The cURL method
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://$ip/status/status.php");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
		$data = curl_exec($ch);
		curl_close($ch);
		
		/*
		* Alternate method
		* file_get_contents() method
		*/
		//$data = file_get_contents("http://$ip/status/status.php");
		
		return $data;
	}
}
?>