<?php 
	include ('../connect.php');
	session_start();
	
	date_default_timezone_set("Asia/Kolkata"); 
	$a = $_POST['username'];
	$b = $_POST['password'];
	$c = $_POST ['address'];
    $date = date('Y/m/d', time());
    $currentTime = date('H:i:s', time());
	$sql = "SELECT * FROM cashier WHERE username = ? AND password = ?";
	$query = $db->prepare($sql);
	$query->execute(array($a,$b));
	$row = $query->fetch();
	
	if ($query->rowCount() > 0){		
		$_SESSION['SESS_MEMBER_ID'] = $a;
		echo 1;
	}else{
		echo $sql;
		echo 0;
	}
	

?>
