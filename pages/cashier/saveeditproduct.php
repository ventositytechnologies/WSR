<?php
// configuration
include('connect.php');

// new data
$id = $_POST['memi'];
$d = $_POST['remark'];
$e = $_POST['fdate'];
$f = $_POST['status'];
// query
$sql = "UPDATE products 
SET  remark=?, fdate=?, status=? 
WHERE product_id=?";
$q = $db->prepare($sql);
$q->execute(array($d,$e,$f,$id));
header("location: customer.php");

?>