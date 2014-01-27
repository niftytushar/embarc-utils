<?php
require_once "mysql_interface.php";
require_once "servers.php";
require_once "smtp.php";

$schedules = new SCHEDULES();
$schedules->checkAllServers();

class SCHEDULES
{
	public $mInterface;
	public $servers;
	public $smtp_obj;

	public function __construct() {
		$this->mInterface = new MYSQL_INTERFACE();
		$this->servers = new SERVER();
		$this->smtp_obj = new SMTPs();
	}
	
	public function checkAllServers() {
		$list_of_servers = $this->servers->getServersList();
		$mailBody = '<html>
					<head></head>
					<body>';
		
		for($i = 0; $i < count($list_of_servers); $i++) {
			$server_status = $this->servers->getStatus($list_of_servers[$i]["ip_address"]);
			$server_status = json_decode($server_status);
			
			if(gettype($server_status) != "object") { // unable to connect to server
				$status = array("updating"=>-1, "info"=>$list_of_servers[$i]);
				$mailBody .= $this->getBody_UC($status);
			} else {
				if($server_status->updating->status == -1) { // AVL data not received
					$status = array("updating"=>$server_status->updating, "info"=>$list_of_servers[$i]);
					$mailBody .= $this->getBody_AVL($status);
				}
			}
		}
		
		$mailBody .= '</body>
					</html>';
		
		// finally send a mail
		$result = $this->smtp_obj->sendMail(null, [array("name"=>"Pradeep Jain", "email"=>"pradeep.brisk@gmail.com")], "Server Down", $mailBody, 0);
		
		if($result == "SUCCESS") echo "Mail sent\n";
	}
	
	public function getBody_UC($status) {
		return '<p>
		Unable to connect to server <b>' . $status["info"]["company"] . '</b> </p>
		<table>
		<tr><td>Contact Name</td><td>'.$status["info"]["contact"].'</td></tr>
		<tr><td>Email ID</td><td>'.$status["info"]["email"].'</td></tr>
		<tr><td>IP</td><td>'.$status["info"]["ip_address"].'</td></tr>
		<tr><td>URL</td><td><a href="http://' . $status["info"]["url"] . '">'.$status["info"]["url"].'</a></td></tr>
		<tr><td>Software Version</td><td>'.$status["info"]["sw_version"].'</td></tr>
		</table><br /><br />';
	}
	
	// get mail body for servers with errors
	public function getBody_AVL($status) {
		return '<p>
		AVL data was <b>NOT</b> received on the server <b>' . $status["info"]["company"] . '</b> in last ' . intval($status["updating"]->interval) / 60 . ' minutes. </p>
		<table>
		<tr><td>Contact Name</td><td>'.$status["info"]["contact"].'</td></tr>
		<tr><td>Email ID</td><td>'.$status["info"]["email"].'</td></tr>
		<tr><td>IP</td><td>'.$status["info"]["ip_address"].'</td></tr>
		<tr><td>URL</td><td><a href="http://' . $status["info"]["url"] . '">'.$status["info"]["url"].'</a></td></tr>
		<tr><td>Software Version</td><td>'.$status["info"]["sw_version"].'</td></tr>
		</table><br /><br />';
	}
}
?>