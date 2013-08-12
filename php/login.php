<?php
require_once("mysql_interface.php");

class LOGIN
{
	public $mInterface;
	
	public function __construct() {
		$this->mInterface = new MYSQL_INTERFACE();
	}
	
	public function verify($username, $password) {
		$user = $this->mInterface->getUser($username);
		if($password == $user["password"]) {
			$_SESSION['user'] = $username;
			header("Location: /courier/dashboard.php");
		} else {
			/*
				If login verification fails, send a authorization code[au] to notify:
				in: Invalid Credentials
			*/
			header("Location: /courier/login.html?au=in");
		}
	}
}
?>