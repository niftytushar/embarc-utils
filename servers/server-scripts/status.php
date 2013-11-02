<?php
/*
* 02 November, 2013
* server status v2.0.3 Tushar Agarwal niftytushar@gmail.com
*
* server script for server status utility
* To modify processes change process names in $processes array()
* Default disk type is ext4, change disk type in $disks (backticks) array()
*/

// include required files
require_once "trackersCheck.php";

function createArray($data) {
	//create array for each line
	$data = explode("\n", trim($data, "\n"));
	//skip headers and create array from each remaining row
	for($i=1; $i<count($data); $i++) {
		$result[] = preg_split("/[\s]+/", $data[$i]);
	}
	return $result;
}
/*
* get RAM details
*/
$mem = createArray(`free -m`);

/*
* get HDD details, of partition type ext4
*/
$disks = createArray(`df -text4 -BM`);

/*
* get status of required processes
*/
function getProcessStatus($pname) {
	$result = `ps -eo "%p %c" | grep $pname`;
	if($result) {
		return 1;
	} else {
		return -1;
	}
}
$processes = array("udp", "frontend", "mailer", "geofence", "rfidman");
$proc = array();
for($i=0; $i<count($processes); $i++) {
	$proc[$processes[$i]] = getProcessStatus($processes[$i]);
}

/*
* read log files
*/
function getLog($path) {
	//get tail 2 lines using runscript, which runs as root - yay!
	return `./runscript 2 $path`;
}
$log_files_path = "/root/findnsecure/";
$log_files = array("frontend.log", "mailer.log", "geofence.log", "udp_server.log", "rfid.log");
$logs = array();
for($i=0; $i<count($log_files); $i++) {
	$logs[$log_files[$i]] = getLog($log_files_path . $log_files[$i]);
}

/*
* check if trackers are working/updating
*/
$updates = new TR_UPDATES();
$areUpdating = $updates->checkTrackers();

//create associative array of disks and RAM
$data = array("disk"=>$disks, "mem"=>$mem, "process"=>$proc, "logs"=>$logs, "updating"=>$areUpdating);

echo json_encode($data);
?>
