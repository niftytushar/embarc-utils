<?php
require_once("mysql_interface.php");
require_once("users.php");
require "PHPMailer/PHPMailerAutoload.php";

class SMTPs
{
	public $mInterface;
	public $users;
	
	public function __construct() {
		$this->mInterface = new MYSQL_INTERFACE();
		$this->users = new USERS();
	}
	
	// test a specified SMTP server
	public function testSMTPDetails($postData) {
		$username = $_SESSION['user'];
		
		// details of user, to send email to
		$userDetails = $this->users->getUser($username);
		
		// data received from client
		$settings = array("host"=>$postData['host'], "port"=>$postData['port'], "username"=>$postData['username'], "password"=>$postData['password'], "enAuth"=>($postData['enAuth'] == 1?true:false), "enSSL"=>($postData['enSSL'] == 1?true:false));
		
		$result = $this->doMail($settings, $userDetails, "Congrats! SMTP server works", "This is a test mail from ".$settings['host'].". If you've received this mail, the SMTP server settings are correct.", 2);
		
		if($result == "SUCCESS") return "Mail sent successfully.";
	}
	
	public function sendMail($settings, $recipients, $subject="embarc-utils", $body, $debugMode=0) {
		if(!$settings) $settings = $this->_defaultSMTPSettings();
		
		// start PHP mailer setup
		$mail = new PHPMailer;
		$mail->isSMTP();															// Set mailer to use SMTP
		$mail->SMTPDebug = $debugMode;												// Debug mode - Commands + Data
		$mail->Debugoutput = "html";												// HTML style debug output
		$mail->Host = $settings['host'];											// SMTP server
		$mail->Port = $settings['port'];											// SMTP port [Gmail - (ssl: 465/25, tls: 587)]
		$mail->SMTPAuth = $settings['enAuth'];										// Enable SMTP authentication
		if($settings['enSSL']) $mail->SMTPSecure = 'ssl';							// Enable encryption
		$mail->SMTPKeepAlive = false;												// SMTP connection will close after sending the email
		$mail->Username = $settings['username'];									// SMTP username
		$mail->Password = $settings['password'];									// SMTP password
		$mail->From = 'check@embarc.com';											// Email ID of sender
		$mail->FromName = 'embarc-utils';											// Name of sender
		
		// Adding recipients		
		for($i=0; $i<count($recipients); $i++) {
			$mail->addAddress($recipients[$i]['email'], $recipients[$i]['name']);	// Details of receipent
		}
		
		$mail->addReplyTo('noreply@embarc.com', 'No-reply');						// Add reply-to address
		$mail->WordWrap = 50;														// Set word wrap to 50 characters
		$mail->isHTML(true);														// Set email format to HTML
		
		// the mail
		$mail->Subject = $subject;
		$mail->Body = $body;
		
		// sending email
		if(!$mail->send()) {
		   return $mail->ErrorInfo;
		}
		
		return "SUCCESS";
	}
	
	public function _defaultSMTPSettings() {
		return array("host"=>"smtp.mandrillapp.com", "port"=>"587", "username"=>"pradeep.brisk@gmail.com", "password"=>"6JKHeUjlpPsrCjxaNbfUsA", "enAuth"=>true, "enSSL"=>false);
	}
}
?>