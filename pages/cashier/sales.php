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
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- MetisMenu CSS -->
  <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,900" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <link rel="stylesheet" type="text/css" href="css/global.style.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">

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
		
		
		

 <!-- <a class="go-back-link" href="javascript:history.back();"><i class="fa fa-arrow-left"></i></a>-->
      </head>

      <body>

        <?php include('navfixed.php');?>
<!--<style>
.container {
    border-radius: 5px;
    background-color: #ffcf00;
    padding: 20px;
}
</style> -->   


<div class="container"><br>
  <div class="row">
   <p> <div class="col-md-12 col-sm-12 col-xs-12"><a href="visit.php"><img class="img-responsive" src="img/visit.png" /></a></div></p>

    </div>
    <div class="row">
	
       <p><div class="col-md-4 col-sm-4 col-xs-4"><a href="customer.php"><img class="img-responsive" src="img/follow.png" /></a></div>
       <div class="col-md-4 col-sm-4 col-xs-4"><a href="checkavilablity.php"><img class="img-responsive" src="img/available.png" /></a></div>
       <div class="col-md-4 col-sm-4 col-xs-4"><a href="checkcollection.php"><img class="img-responsive" src="img/collection.png" /></a></div></p>
       
      </div>
      <div class="row">
     <p><div class="col-md-4 col-sm-4 col-xs-4"><a href="developer.php"><img class="img-responsive" src="img/builder.png" /></a></div>
      <div class="col-md-4 col-sm-4 col-xs-4"><a href="broker.php"><img class="img-responsive" src="img/broker.png" /></a></div>
      
      <div class="col-md-4 col-sm-4 col-xs-4"><a href="attendance.php"><img class="img-responsive" src="img/attendance.png" /></a></div></p>
      
      </div>

     
</div>





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
