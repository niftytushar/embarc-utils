<?php
session_start();

class SESSIONS
{
	public $REDIRECT_URL = "/embarc-utils/login.html";
	
	public function check() {
		if(isset($_SESSION['user'])) {
			$user = $_SESSION['user'];
			return true;
		} else {
			$this->destroy();
			header("Location: ".$this->REDIRECT_URL);
			return false;
		}
	}
	
	public function destroy() {
		session_destroy();
	}
}
?>