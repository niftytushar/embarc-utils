<?php
session_start();

require_once("mysql_interface.php");

switch ($_GET['util']) {
	case "courier":
		courier($_GET['fx']);
		break;
		
	case "attendance":
		attendance($_GET['fx']);
		break;
	
	case "login":
		login($_GET['fx']);
		break;
}

function login($fx)
{
	switch ($fx)
	{
		case "login":
			require_once('login.php');
			$login = new LOGIN();
			$login->verify($_POST['username'], $_POST['password']);
			break;
			
		case "logout":
			require_once('sessions.php');
			unset($_SESSION['user']);
			$session = new SESSIONS();
			$session->check();
			break;
	}
}

function courier($fx)
{
	switch ($fx)
	{
		case "getCountries":
			$mInterface = new MYSQL_INTERFACE();
			echo $mInterface->getCountries();
			break;
			
		case "dhlCalculate":
			require_once('dhl_calculator.php');
			$calculator = new DHL_CALCULATOR();
			
			if(!isset($_POST['country']) || !isset($_POST['type']) || !isset($_POST['weight'])) return "";
			echo json_encode($calculator->getOptimalCost($_POST['country'], $_POST['type'], $_POST['weight']));
			break;
			
		case "setSettings":
			require_once('settings.php');
			$settings = new SETTINGS();
			echo $settings->setCSSettings($_POST['pref']);
			break;
			
		case "getSettings":
			require_once('settings.php');
			$settings = new SETTINGS();
			echo $settings->getCSSettings();
			break;
	}
}

function attendance($fx)
{
	switch ($fx)
	{
		case "attendanceCalculate":
			require_once('attendance_main.php');
			$attend = new ATTENDANCE();
			
			$attend->getSummary(21);
			break;
	}
}
?>