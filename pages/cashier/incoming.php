<?php
session_start();
include('connect.php');
$a = $_POST['invoice'];
$b = $_POST['product'];
$c = $_POST['qty'];
$w = $_POST['pt'];
$r = $_POST['vat'];
// $exp = $_POST['ex_date'];
// $exp = date("y-m-d", strtotime($_POST['ex_date']));

//$ex = $_POST['exp_date'];

//$fre = $_POST['free'];
$date = date('d/m/Y');

$month = date('F');
$year = date('Y');

$discount = $_POST['discount'];
$result = $db->prepare("SELECT * FROM products WHERE product_code= :userid");
$result->bindParam(':userid', $b);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
$asasa=$row['price'];
$cst=$row['cost'];
$name=$row['product_name'];
$dname=$row['description_name'];
$categ=$row['category'];
$qtyleft=$row['qty_left'];

$exp_date=$row['expiration_date'];	
}

//edit qty
$sql = "UPDATE products 
        SET qty_left=qty_left-?
		WHERE product_code=?";
$q = $db->prepare($sql);
$q->execute(array($c,$b));
$fffffff=$asasa-$discount;
$d=$fffffff*$c;
$z=$qtyleft-$c;
$vat=$d*$r;
$total=$vat+$d;
// query
$sql = "INSERT INTO sales_order (invoice,product,qty,amount,name,price,cost,discount,category,date,omonth,oyear,qtyleft,dname,vat,total_amount,expiration) VALUES (:a,:b,:c,:d,:e,:f,$cst,:g,:h,:i,:j,:k,:l,:m,:n,:o,:p)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$name,':f'=>$asasa,':g'=>$discount,':h'=>$categ,':i'=>$date,':j'=>$month,':k'=>$year,':l'=>$z,':m'=>$dname,':n'=>$vat,':o'=>$total,':p'=>$exp_date));
header("location: sales.php?id=$w&invoice=$a");



?>