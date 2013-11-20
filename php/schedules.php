<?php
require_once "mysql_interface.php";
require_once "servers.php";

$schedules = new SCHEDULES();
$schedules->checkAllServers();

class SCHEDULES
{
	public $mInterface;
	public $servers;

	public function __construct() {
		$this->mInterface = new MYSQL_INTERFACE();
		$this->servers = new SERVER();
	}
	
	public function checkAllServers() {
		$list_of_servers = $this->servers->getServersList();
		
		for($i = 0; $i < count($list_of_servers); $i++) {
			$server_status = $this->servers->getStatus($list_of_servers[$i]["ip_address"]);
			echo json_decode($server_status)["updating"]["count"];
		}
	}
}
?>