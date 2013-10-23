<?php
/*
* used by server status utility v2.0.1
*/
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

//create associative array of disks and RAM
$data = array("disk"=>$disks, "mem"=>$mem, "process"=>$proc);

echo json_encode($data);
?>
