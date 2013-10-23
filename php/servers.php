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
	
	public function addServer($data) {
		$str = array();
		foreach($data as $key=>$value) {
			array_push($str, $key."='".$this->mInterface->escapeString($value)."'");
		}
		
		if($this->mInterface->sm_addServer(join(",", $str))) return "SUCCESS";
		else return "ERROR";
	}
	
	public function getStatus($ip) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://$ip/status/status.php");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
		$data = curl_exec($ch);
		curl_close($ch);
		
		return $data;
	}
}
?>