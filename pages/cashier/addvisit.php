<?php
session_start();
include('connect.php');

$a = $_POST['name'];
$b = $_POST['address'];
$c = $_POST['mobile'];
$d = $_POST['email'];
$e = $_POST['budget'];
$f = $_POST['dpayment'];
$g = $_POST['emi'];
$h = $_POST['profession'];
$i = $_POST['company'];
$j = $_POST['selectflat'];
$k = $_POST['flatcost'];
$l = $_POST['remark'];
$m = $_POST['category'];
$n = $_POST['status'];
$o = $_POST['fdate'];
$p = $_POST['user_id'];
$sql = "INSERT INTO products (name,address,mobile,email,budget,dpayment,emi,profession,company,selectflat,flatcost,remark,category,status,fdate,user_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p));

	
header('location: sales.php');


?>
