<?php
require_once("mysql_interface.php");
require_once("misc.php");

class AL_REM
{
	public $mInterface;
	public $misc;
	
	public function __construct() {
		$this->mInterface = new MYSQL_INTERFACE();
		$this->misc = new MISC();
	}
	
	public function getAlerts_byModule($module) {
		return $this->mInterface->ar_getAlerts_byModule($module);
	}
	
	public function getReminders_byModule($module) {
		return $this->mInterface->ar_getReminders_byModule($module);
	}
	
	public function get_modules_alerts_reminders() {
		$modules = $this->misc->getModules();
		
		foreach($modules as $key=>&$value) {
			$value['alerts'] = $this->getAlerts_byModule($key);
			$value['reminders'] = $this->getReminders_byModule($key);
		}
		
		return $modules;
	}
}
?>