<?php
session_start();
include('connect.php');
$a = $_POST['name'];
$b = $_POST['address'];
$c = $_POST['mobile'];
$d = $_POST['email'];
$e = $_POST['companyname'];
$f = $_POST['officeaddress'];
$i = $_POST['areaofoperation'];
$g = $_POST['multilocation'];
$h = $_POST['remark'];
$j = $_POST['category'];
$k = $_POST['commitmentno'];
$m =$_POST['ecommitment'];
$l = $_POST['date'];

$sql = "INSERT INTO broker (name,address,mobile,email,companyname,officeaddress,areaofoperation,multilocation,remark,category,commitmentno,ecommitment,date) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$c,$d,$e,$f,$i,$g,$h,$j,$k,$m,$l));

	 echo "<script type='text/javascript'>alert('visiter added successfully')</script>";
header("location: sales.php");


?>