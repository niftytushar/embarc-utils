<?php
class LOGS
{
	$encrypted_password = false;
	$key = "12345678901234561234567890123456"; //32 bytes key
	$iv = "1234567890123456"; //16 bytes IV
	
	$log_files_path = "\$HOME/findnsecure/";
	$log_files = array("frontend.log", "mailer.log", "geofence.log", "udp_server.log", "rfid.log");
	
	public function __construct($root_password) {
		$this->encrypted_password = $root_password;
	}
	
	public function decrypt() {
		$td = mcrypt_module_open(MCRYPT_RIJNDAEL_128,'',MCRYPT_MODE_CBC,'');
	
		mcrypt_generic_init($td, $this->key, $this->iv);
		$decrypted = mdecrypt_generic($td, base64_decode($encrypted_password));
		mcrypt_generic_deinit($td);
		
		return $decrypted;
	}
	
	public function get() {
		$logs = array();
		
		for($i=0; $i<count($this->log_files); $i++) {
			$logs[$this->log_files[$i]] = $this->readFile($this->log_files_path . $this->log_files[$i]);
		}
	}
	
	public function readFile($path) {
		return `tail -n2 $path`;	
	}
}
?>