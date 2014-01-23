<?php
require_once("mysql_interface.php");

class AL_REM
{
	public $mInterface;
	
	public function __construct() {
		$this->mInterface = new MYSQL_INTERFACE();
	}
	
	public function getAlerts() {
		return $this->mInterface->ar_getAlerts();
	}
	
	public function getReminders() {
		return $this->mInterface->ar_getReminders();
	}
	
	public function getAlertsAndReminders() {
		return array("alerts"=>$this->getAlerts(), "reminders"=>$this->getReminders());
	}
}
?>