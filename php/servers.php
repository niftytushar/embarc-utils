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
}
?>