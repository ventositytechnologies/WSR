<?php
session_start();
include('connect.php');
$a = $_POST['name'];
$b = $_POST['officeaddress'];
$c = $_POST['mobile'];
$d = $_POST['email'];
$e = $_POST['projectname'];
$f = $_POST['projectaddress'];
$g = $_POST['noofunit'];
$h = $_POST['rateunit'];
$i = $_POST['developmentcharge'];
$j = $_POST['othercharge'];
$k = $_POST['remark'];
$l = $_POST['category'];
$m = $_POST['status'];
$n = $_POST['otherproject'];
$sql = "INSERT INTO developer (name,officeaddress,mobile,email,projectname,projectaddress,noofunit,rateunit,developmentcharge,othercharge,remark,category,status,otherproject) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n));

	 echo "<script type='text/javascript'>alert('visiter added successfully')</script>";
header('location: sales.php');


?>