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
}
?>