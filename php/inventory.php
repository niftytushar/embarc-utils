<?php
require_once("mysql_interface.php");

class STOCK_IN
{
	public $mInterface;
	
	public function __construct() {
		$this->mInterface = new MYSQL_INTERFACE();
	}
	
	public function getTrackersList() {
		return $this->mInterface->in_getTrackers();
	}
	
	public function saveItem($data) {
		$str = array();
		foreach($data as $key=>$value) {
			array_push($str, $key."='".$value."'");
		}
		array_push($str, "in_username='".$_SESSION['user']."'");
		
		if($this->mInterface->in_addStockItem(join(",", $str))) return "SUCCESS";
		else return "ERROR";
	}
}
?>