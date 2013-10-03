<?php

require_once("mysql_interface.php");

class LOGIN
{
	public $mInterface;
	
	public function __construct() {
		$this->mInterface = new MYSQL_INTERFACE();
	}
	
	public function authenticate($username, $hash, $remember=0) {
		$user = $this->mInterface->getUser($username);
		if($hash == hash("sha256", $user["password"])) {
			if($remember == 1) {
				setcookie("username", $username, time()+60*60*24*30, "/embarc-utils/");
			} else {
				setcookie("username", "", time()+60*60*24*30, "/embarc-utils/");
			}
			$_SESSION['user'] = $username;
			return "success";
		} else {
			/*
				If login verification fails, send a authorization code[au] to notify:
				in: Invalid Credentials
			*/
			return "in";
		}
	}
	
	public function logout() {
		//session_destroy();
		if(isset($_SESSION['username'])) {
			session_unset($_SESSION['username']);
		}
	}
}
?>