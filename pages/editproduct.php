<?php
	include('connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM products WHERE product_id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>

	<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- MetisMenu CSS -->
	<link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="../dist/css/sb-admin-2.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


<form action="saveeditproduct.php" method="post" class = "form-group">
<div id="ac">
<input type="hidden" name="memi" value="<?php echo $id; ?>" />
<span>Product Code : </span><input type="text" name="code" class = "form-control" value="<?php echo $row['product_code']; ?>" />
<span>Product Name : </span><input type="text" name="bname" class = "form-control" value="<?php echo $row['product_name']; ?>" />
<span>Batch : </span><input type="text" name="dname" class = "form-control" value="<?php echo $row['description_name']; ?>" />
<span>MRP : </span><input type="text" name="cost" class = "form-control" value="<?php echo $row['cost']; ?>"
<span>Price : </span><input type="text" name="price" class = "form-control" value="<?php echo $row['price']; ?>" />
<span>Exp. : </span><input type="date" name="ex_date" class = "form-control" value="<?php echo $row['ex_date']; ?>" />
<span>Supplier : </span>
<select name="supplier" class = "form-control" >
	<option><?php echo $row['supplier']; ?></option>
	<?php
	$results = $db->prepare("SELECT * FROM supliers");
		$results->bindParam(':userid', $res);
		$results->execute();
		for($i=0; $rows = $results->fetch(); $i++){
	?>
		<option><?php echo $rows['suplier_name']; ?></option>
	<?php
	}
	?>
</select>
	<span>Quantity : </span>
<input type="text" name="Quantity" class = "form-control" value="<?php echo $row['qty_left']; ?>" />
<span>HSN Code: </span>
<select name="categ" class = "form-control" >
                            <option>Select Code</option>
                            <option>4014</option>
                            <option>3004</option>
                            <option>9021</option>
                            <option>9018</option>
                            <option>2106</option>
                            <option>3401</option>
                            <option>9025</option>
                            </select>
<span>&nbsp;</span><input class="btn btn-primary btn-block" type="submit" class = "form-control" value="Update" />
</div>
</form>
<?php
}
?>