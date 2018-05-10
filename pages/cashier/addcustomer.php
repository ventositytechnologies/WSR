<?php
	include('connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM products WHERE product_id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>

	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- MetisMenu CSS -->
	<link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="dist/css/sb-admin-2.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
							<style>
body {font-family: Arial, Helvetica, sans-serif;}

input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 20px;
    box-sizing: border-box;
    margin-top: 2px;
    margin-bottom: 2px;
    resize: vertical;
}
input[type=number] {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 20px;
    box-sizing: border-box;
    margin-top: 2px;
    margin-bottom: 2px;
    resize: vertical;
}
input[type=email] {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 20px;
    box-sizing: border-box;
    margin-top: 2px;
    margin-bottom: 2px;
    resize: vertical;
}input[type=date] {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 20px;
    box-sizing: border-box;
    margin-top: 2px;
    margin-bottom: 2px;
    resize: vertical;
}

input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

.container {
    border-radius: 5px;
    background-color: #ffffff;
    padding: 20px;
}
</style>

<div style="background-color:#00ff03;padding:15px;">
  <a class="go-back-link" href="javascript:history.back();"><i class="fa fa-arrow-left"></i></a><a style="padding:60px; font-size:20px;"> Update Follow Up</a>
</div>

<div class="container">
<form action="saveeditproduct.php" method="post" class = "form-group">
<div id="ac">
<input type="hidden" name="memi" value="<?php echo $id; ?>" />

                        <label for="remark">Remark</label>
                       <textarea type="text" id="remark" name="remark" placeholder="Enter Remark.." style="height:100px"required "><?php echo $row['remark']; ?></textarea>
                        <label for="status">Status</label>
						<select id="status" name="status" value="<?php echo $row['status']; ?>>
                          <option id="status" >Select Status</option>
                          <option id="status" >Not Interested</option>
                          <option id="status" >Interested</option>
                          <option id="status" >Closed</option>
                        </select>
					<!--	<label for="status">Status</label>
                        <input type="text" id="status" name="status" placeholder="Enter Status.." "/ >-->
						<label for="fdate">Follow Up Date</label>
                        <input type="date" id="fdate" name="fdate" placeholder="Enter Follow Up Date.." required value="<?php echo $row['fdate']; ?>">

<span>&nbsp;</span><input class="btn btn-primary btn-block" type="submit" class = "form-control" value="Update" />

<!--
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
</select>-->

</div>
</form>
</div>
<?php
}
?>