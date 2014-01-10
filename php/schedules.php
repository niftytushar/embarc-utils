<?php
require_once "mysql_interface.php";
require_once "servers.php";
require "PHPMailer/PHPMailerAutoload.php";

$schedules = new SCHEDULES();
$schedules->checkAllServers();

class SCHEDULES
{
	public $mInterface;
	public $servers;

	public function __construct() {
		$this->mInterface = new MYSQL_INTERFACE();
		$this->servers = new SERVER();
	}
	
	public function checkAllServers() {
		$list_of_servers = $this->servers->getServersList();
		$mailBody = "";
		$mailAltBody = "";
		
		for($i = 0; $i < count($list_of_servers); $i++) {
			$server_status = $this->servers->getStatus($list_of_servers[$i]["ip_address"]);
			$server_status = json_decode($server_status);
			if($server_status->updating->status == -1) {
				$status = array("updating"=>$server_status->updating, "info"=>$list_of_servers[$i]);
				$mailBody .= $this->getMailBody($status);
				$mailAltBody .= $this->getMailAltBody($status);
			}
		}
		
		// finally send a mail
		$this->mail_serverDown($mailBody, $mailAltBody);
	}
	
	public function getMailBody($status) {
		return '<html>
		<head></head>
		<body>
		AVL data was <b>NOT</b> received on the server <b>' . $status["info"]["company"] . '</b> in last ' . intval($status["updating"]->interval) / 60 . ' minutes. <br />
		<table>
		<tr><td>Contact Name</td><td>'.$status["info"]["contact"].'</td></tr>
		<tr><td>Email ID</td><td>'.$status["info"]["email"].'</td></tr>
		<tr><td>IP</td><td>'.$status["info"]["ip_address"].'</td></tr>
		<tr><td>URL</td><td><a href="http://' . $status["info"]["url"] . '">'.$status["info"]["url"].'</a></td></tr>
		<tr><td>Software Version</td><td>'.$status["info"]["sw_version"].'</td></tr>
		</table>
		</body>
		</html><br />';
	}
	
	public function getMailAltBody($status) {
		return 'AVL data was <b>NOT</b> received on the server ' . $status["info"]["company"] . ' in last ' . intval($status["updating"]->interval) / 60 . ' minutes';
	}
	
	public function mail_serverDown($mailBody, $mailAltBody) {
		$mail = new PHPMailer;

		$mail->isSMTP();										// Set mailer to use SMTP
		$mail->SMTPDebug = 0;									// Production mode
		$mail->Host = 'smtp.mandrillapp.com';							// Specify main and backup server
		$mail->Port = 587;										// SMTP port for Gmail
		$mail->SMTPAuth = true;									// Enable SMTP authentication
		$mail->SMTPKeepAlive = true;							// SMTP connection will not close after each email sent, reduces SMTP overhead
		$mail->SMTPSecure = 'tls';
		$mail->Username = 'pradeep.brisk@gmail.com';		// SMTP username
		$mail->Password = '6JKHeUjlpPsrCjxaNbfUsA';							// SMTP password
		
		$mail->From = 'support@findnsecure.com';				// Sender Email ID
		$mail->FromName = 'Server Status';						// Sender Name
		$mail->addAddress('anshul.agarwal@findnsecure.com', 'Anshul Agarwal');	// Recipient name - 1
		//$mail->addAddress('tushar.agarwal@softcruise.com', 'Tushar Agarwal');  // Recipient name - 2
		$mail->addReplyTo('support@findnsecure.com', 'Servers');
		
		$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = "Server Down";
		$mail->Body    = $mailBody;
		$mail->AltBody = $mailAltBody;

		if(!$mail->send()) {
		   echo 'Message could not be sent.';
		   echo 'Mailer Error: ' . $mail->ErrorInfo;
		   exit;
		}

		echo "Mail sent\n";
	}
	/*
	public function mail_serverDown($status) {
		$from = "Server Status <support@findnsecure.com>";

		$to=" <pradeep.jain@findnsecure.com>, Tushar Agarwal <tushar.agarwal@softcruise.com>";

		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		// Additional headers
		$headers .= "From: $from\r\n";

		//mail subject
		$subject = $status["info"]["company"] . ": Server Down";

		//mail body
		$message = '<html>
		<head></head>
		<body>
		AVL data was not received on the server ' . $status["info"]["company"] . ' in last ' . intval($status["updating"]->interval) / 60 . ' minutes. <br />
		<table>
		<tr><td>Contact Name</td><td>'.$status["info"]["contact"].'</td></tr>
		<tr><td>Email ID</td><td>'.$status["info"]["email"].'</td></tr>
		<tr><td>IP</td><td>'.$status["info"]["ip_address"].'</td></tr>
		<tr><td>URL</td><td><a href="http://' . $status["info"]["url"] . '">'.$status["info"]["url"].'</a></td></tr>
		<tr><td>Software Version</td><td>'.$status["info"]["sw_version"].'</td></tr>
		</table>
		</body>
		</html>';

		//send email
		mail($to,$subject,$message,$headers);
		
		// log mail sent
		echo "Mail sent to $to for server " . $status["info"]["company"];
	}
	*/
}
?>