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
	
	// save a new user
	public function sendMail($postData) {
		$username = $_SESSION['user'];
		
		// details of user, to send email to
		$userDetails = $this->users->getUser($username)[0];
		
		// data received from client
		$host = $postData['host'];
		$port = $postData['port'];
		$username = $postData['username'];
		$password = $postData['password'];
		$enAuth = $postData['enAuth'] == 1?true:false;
		$enSSL = $postData['enSSL'] == 1?true:false;
		
		// start PHP mailer setup
		$mail = new PHPMailer;
		$mail->isSMTP();															// Set mailer to use SMTP
		$mail->SMTPDebug = 2;														// Production mode
		$mail->Host = $host;														// SMTP server
		$mail->Port = $port;														// SMTP port [Gmail - (ssl: 465/25, tls: 587)]
		$mail->SMTPAuth = $enAuth;													// Enable SMTP authentication
		if($enSSL) $mail->SMTPSecure = 'ssl';										// Enable encryption
		$mail->SMTPKeepAlive = false;												// SMTP connection will close after sending the email
		$mail->Username = $username;												// SMTP username
		$mail->Password = $password;												// SMTP password
		$mail->From = 'check@embarc.com';											// Email ID of sender
		$mail->FromName = 'Check';													// Name of sender
		$mail->addAddress($userDetails['email'], $userDetails['name']);				// Details of receipent
		$mail->addReplyTo('noreply@embarc.com', 'No-reply');						// Add reply-to address
		$mail->WordWrap = 50;														// Set word wrap to 50 characters
		$mail->isHTML(true);														// Set email format to HTML
		
		// the mail
		$mail->Subject = "Congrats! SMTP server works";
		$mail->Body    = "This is a test mail from $host. If you've received this mail, the SMTP server settings are correct.";
		$mail->AltBody = "This is a test mail from $host. If you receive this mail, the SMTP server settings are correct.";
		
		// sending email
		if(!$mail->send()) {
		   return $mail->ErrorInfo;
		}
		
		return "SUCCESS";
	}
}
?>