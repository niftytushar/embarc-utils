<?php
session_start();

require_once("mysql_interface.php");
require_once('login.php');

switch ($_GET['util']) {
	case "courier":
		courier($_GET['fx']);
		break;
		
	case "inventory":
		inventory($_GET['fx']);
		break;
		
	case "attendance":
		attendance($_GET['fx']);
		break;
	
	case "login":
		login($_GET['fx']);
		break;
		
	case "misc":
		misc($_GET['fx']);
		break;
}

function login($fx)
{
	$login = new LOGIN();
	
	switch ($fx)
	{
		case "login":
			echo $login->authenticate($_POST['username'], $_POST['hash'], $_POST['remember']);
			break;
			
		case "logout":
			$login->logout();
			header("Location: /embarc-utils/login.html");
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

function inventory($fx)
{
	require_once("inventory.php");
	$inventory = new STOCK();
	switch($fx)
	{
		case "getTrackers":
			echo json_encode($inventory->getTrackersList());
			break;
			
		case "saveStockItem":
			echo $inventory->saveItem($_POST);
			break;
			
		case "updateStockItem":
			echo $inventory->updateItem($_POST);
			break;
			
		case "getItemsInStock":
			echo json_encode($inventory->getItemsInStock($_GET["prop"]));
			break;
			
		case "getItemInStock":
			$item = $inventory->getItemInStock($_GET["prop"], $_GET["val"]);
			if(gettype($item) == "string") echo $item;
			else echo json_encode($item);
			break;
			
		case "getClients":
			echo json_encode($inventory->getClients());
			break;
			
		case "search":
			echo json_encode($inventory->findItems($_POST));
			break;
	}
}

function misc($fx)
{
	require_once("misc.php");
	$misc = new MISC();
	
	switch($fx)
	{
		case "getModules":
			$modules = $misc->getModules();
			if(gettype($modules) == "string") echo $modules;
			else echo json_encode($modules);
			break;
			
		case "getPreferences":
			echo json_encode($misc->getPreferences($_GET["module"]));
			break;
			
		case "savePreferences":
			echo $misc->savePreferences($_GET["module"], $_POST);
			break;
	}
}
?>