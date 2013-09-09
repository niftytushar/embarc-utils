<?php
require_once("mysql_db.php");

class MYSQL_INTERFACE
{
	public $db_object = false;
	public $db_connection = false;
	
	public function __construct() {
		$this->db_object = new MYSQL_DB();
		$this->db_connection = $this->db_object->connect();
	}
	
	public function getCountries() {
		$query = "SELECT * from cs_dhlZones";
		$result = $this->db_object->query_db($query);
		$countries = array();
		while($row = $result->fetch_assoc()) {
			array_push($countries, $row);
		}
		$result->free();
		
		return json_encode($countries);
	}
	
	public function getZone($countryCode) {
		$query = "SELECT zone from cs_dhlZones where code='".$countryCode."'";
		$this->db_object->query_db($query);
		return $this->db_object->getResultRow();
	}
	
	public function getUser($username) {
		$query = "SELECT * from users where username='".$this->db_object->escapeString($username)."'";
		$result = $this->db_object->query_db($query);
		if($result == false) return false;
		
		$row = $result->fetch_assoc();
		$result->free();
		
		return $row;
	}
	
	public function getDHLPrice($account, $zone, $type, $weight) {
		$query = "SELECT $zone from cs_dhl$account where type='".$type."' and weight >= $weight";
		$this->db_object->query_db($query);
		$result = $this->db_object->getResultRow();
		
		return $result;
	}
	
	public function getAllAccounts() {
		$query = "SELECT * from cs_accounts";
		$this->db_object->query_db($query);
		$accounts = $this->db_object->getResultSet();
		
		return $accounts;
	}
	
	public function saveCSSettings($serviceName, $settingsJSON) {
		$serviceName = $this->db_object->escapeString($serviceName);
		$settingsJSON = $this->db_object->escapeString($settingsJSON);
		if($this->getCSSettings() == false) {
			$query = "INSERT INTO cs_settings set serviceName='".$serviceName."', preferences='".$settingsJSON."'";
		} else {
			$query = "UPDATE cs_settings set preferences='".$settingsJSON."' where serviceName='".$serviceName."'";
		}
		return $this->db_object->query_db($query);
	}
	
	public function getCSSettings() {
		$query = "SELECT * from cs_settings";
		$this->db_object->query_db($query);
		return $this->db_object->getResultRow();
	}
	
	public function in_getTrackers() {
		$query = "SELECT * from in_trackers";
		$this->db_object->query_db($query);
		
		return $this->db_object->getResultSet();
	}
}
?>
