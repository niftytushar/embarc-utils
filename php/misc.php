<?php
require_once("mysql_interface.php");

class MISC
{
	public $mInterface;
	
	public function __construct() {
		$this->mInterface = new MYSQL_INTERFACE();
	}
	
	public function getModules() {
		$modules = $this->mInterface->misc_getAllModules();
		$allModules = array();
		foreach($modules as $k=>$v) {
			$allModules[$v["id"]] = $v;
		}
		
		$allowedModules;
		$userModules = $this->mInterface->misc_getUserModules($_SESSION["user"]);
		if($userModules == null) {
			$allowedModules = "ERROR";
		} else {
			//get first user only
			$userModules = $userModules[0];
			
			$allowedModules = array();
			$userModules = explode(",", $userModules);
			for($i=0; $i<count($userModules); $i++) {
				if(isset($allModules[$userModules[$i]])) {
					$allowedModules[$userModules[$i]] = $allModules[$userModules[$i]];
				}
			}
		}
		
		return $allowedModules;
	}
	
	public function getPreferences($module) {
		$result = $this->mInterface->misc_getPreferences($_SESSION["user"], $module);
		return json_decode($result[0]);
	}
	
	public function savePreferences($module, $postData) {
		if($this->mInterface->misc_savePreferences($_SESSION["user"], $module, json_encode($postData))) {
			return "success";
		} else {
			return "error";
		}
	}
}
?>