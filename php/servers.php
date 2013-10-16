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
			array_push($str, $key."='".$value."'");
		}
		
		if($this->mInterface->sm_addServer(join(",", $str))) return "SUCCESS";
		else return "ERROR";
	}
}
?>