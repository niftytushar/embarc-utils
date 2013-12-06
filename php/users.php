<?php
require_once("mysql_interface.php");

class USERS
{
	public $mInterface;
	
	public function __construct() {
		$this->mInterface = new MYSQL_INTERFACE();
	}
	
	// save a new user
	public function saveUser($postData) {
		$str = array();
		
		foreach($data as $key=>$value) {
			array_push($str, $key."='".$this->mInterface->escapeString($value)."'");
		}
		
		$queryPart = join(",", $str);
		
		if($this->mInterface->us_addUser($queryPart)) return "SUCCESS";
		else return "ERROR";
	}
}
?>