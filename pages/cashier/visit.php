<?php
require_once('auth.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>WRS</title> 
  
  <link rel="shortcut icon" href="logo.jpg">
  <!-- Bootstrap Core CSS -->

  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,900" rel="stylesheet">
  <!-- MetisMenu CSS -->
  <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="dist/css/sb-admin-2.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="css/global.style.css">

        <link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
        <script src="lib/jquery.js" type="text/javascript"></script>
        <script src="src/facebox.js" type="text/javascript"></script>
        <script type="text/javascript">
          jQuery(document).ready(function($) {
            $('a[rel*=facebox]').facebox({
              loadingImage : 'src/loading.gif',
              closeImage   : 'src/closelabel.png'
            })
          })
        </script>
		
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


      </head>

      <body>

    

     

<section class="container">
<div style="background-color:#00ff03;padding:15px;">
  <a class="go-back-link" href="sales.php"><i class="fa fa-arrow-left"></i></a><a style="padding:80px; font-size:20px;"> Add Visitor</a>
</div>
          
<div class="container">
<form action="addvisit.php" method="post">



                        <span>Project Name : </span>
                           <select name="category" class = "form-control">
                                <?php
                                include('connect.php');
                                $result = $db->prepare("SELECT * FROM supliers");
                                $result->bindParam(':userid', $res);
                                $result->execute();
                                for($i=0; $row = $result->fetch(); $i++){
                                    ?>
                                    <option><?php echo $row['suplier_name']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            
                            <span>User Id : </span>
                           <select name="user_id" class = "form-control">
                                <?php
                                include('connect.php');
								
                                $result = $db->prepare("SELECT * FROM cashier");
                                $result->bindParam(':userid', $res);
                                $result->execute();
                                for($i=0; $row = $result->fetch(); $i++){
                                    ?>
                                    <option><?php echo $row['username']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        <label for="fname"> Name</label>
                        <input type="text" id="name" name="name" placeholder="Your name.."required>
						<label for="address">Address</label>
                        <input type="text" id="address" name="address" placeholder="Enter Address.."required>
						<label for="number">Mobile</label>
                        <input type="number" id="mobile" name="mobile" placeholder="Enter Mobile.."required>
                                            <!--    <label for="category">Project Name</label>
                        <input type="text" id="category" name="category" placeholder="Enter Project Name.." >-->
						<label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter Email..">
						<label for="budget">Budget</label>
                        <input type="number" id="number" name="budget" placeholder="Enter Budget..">
						<label for="dpayment">Down Payment</label>
                        <input type="number" id="dpayment" name="dpayment" placeholder="Enter Down Payment.." >
						<label for="emi">EMI</label>
                        <input type="number" id="emi" name="emi" placeholder="Enter EMI.." >
						<label for="profession">Profession</label>
                        <input type="text" id="profession" name="profession" placeholder="Enter Profession.." >
						<label for="company">Company Name</label>
                        <input type="text" id="company" name="company" placeholder="Enter Company.." >
						<label for="selectflat">Flat No</label>
                        <input type="text" id="selectflat" name="selectflat" placeholder="Enter Flat No.." >
						<label for="flatcost">Flat Cost</label>
                        <input type="number" id="flatcost" name="flatcost" placeholder="Enter Flat Cost.." >
						<label for="remark">Remark</label>
                        <textarea type="text" id="remark" name="remark" placeholder="Enter Remark.." style="height:100px"required></textarea>
						
						<label for="status">Status</label>
						<select id="status" name="status">
                          <option id="status" >Select Status</option>
                          <option id="status" >Not Interested</option>
                          <option id="status" >Interested</option>
                          <option id="status" >Closed</option>
                        </select>
					<!--	<label for="status">Status</label>
                        <input type="text" id="status" name="status" placeholder="Enter Status.." >-->
						<label for="fdate">Follow Up Date</label>
                        <input type="date" id="fdate" name="fdate" placeholder="Enter Follow Up Date.." required>
							

          <div class="form-divider"></div>

          <div class="form-row">
         
            <button class="button circle block green" type="Submit">Submit</button>
          </div>

</form>
        </section>




      <!-- jQuery -->
      <script src="vendor/jquery/jquery.min.js"></script>

      <!-- Bootstrap Core JavaScript -->
      <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

      <!-- Metis Menu Plugin JavaScript -->
      <script src="vendor/metisMenu/metisMenu.min.js"></script>

      <!-- Custom Theme JavaScript -->
      <script src="dist/js/sb-admin-2.js"></script>

      <link href="vendor/chosen.min.css" rel="stylesheet" media="screen">
      <script src="vendor/chosen.jquery.min.js"></script>
      <script>
        $(function() {
          $(".chzn-select").chosen();

        });
      </script>

    </body>

    </html>
