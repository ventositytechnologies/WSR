<?php
	include 'connect.php';

	//Start session
	session_start();
	date_default_timezone_set("Asia/Kolkata"); 
	$c = $_GET ['address'];
	$report = $_GET['report'];
    $date = date('Y/m/d', time());
    $currentTime = date('H:i:s', time());
	$message="";
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '')) {
		header("location: index.php");
		exit();
	}

	$session_id  = $_SESSION['SESS_MEMBER_ID'];

	$query = $db->prepare("SELECT * FROM cashier WHERE cashier_id = ?");
	$query->execute(array($session_id));
	$row = $query->fetch();
	
	$retValue=null;
	
	$sql2 = "SELECT * FROM attenout WHERE cashier_id = '".$session_id."' AND  date = '".$date."' ORDER BY ID DESC  LIMIT 1";
	$query2 = $db->prepare($sql2);
	$query2->execute();
	$row2 = $query2->fetch();
	
	if($query2->rowCount() > 0)
		$retValue=2;
	else
		$retValue=1;
			
	//check for first time login
	if($retValue==2){
		$sql2 = "SELECT * FROM attenout WHERE cashier_id = '".$session_id."'  LIMIT 1";
		//echo $sql2;
		$query2 = $db->prepare($sql2);
		$query2->execute();
		$row2 = $query2->fetch();
		if($query2->rowCount() == 0){
			$retValue=1;
		}
	}
	$message="You are already checked Out";
	
	if($retValue==1){
		$sql_2 = "INSERT INTO attenout (cashier_id, date,time,location,report) VALUES ('". $session_id."','". date("Y/m/d")."','".$currentTime."','".$c."','".$report."')";
		$message="Successfully Checked Out";
		$query2 = $db->prepare($sql_2);
		$query2->execute();
	}

	echo $message;
	header("Refresh:3; url=sales.php", true, 303);
	
?>








