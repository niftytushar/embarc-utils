<?php
require_once("mysql_interface.php");

class STOCK
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
		
		if($this->doesIMEIExists($data["imei"]) === 1) {
			return "IMEI_EXISTS";
		}
		
		if($this->mInterface->in_addStockItem(join(",", $str))) return "SUCCESS";
		else return "ERROR";
	}
	
	public function doesIMEIExists($imei) {
		if($this->mInterface->in_getStockByIMEI($imei) == null) return 0;
		else return 1;
	}
	
	public function getItemsInStock($fields) {
		//$fields = "id,imei,serial,model";
		return $this->mInterface->in_getDetailsOfItemsInStock($fields);
	}
}
?>