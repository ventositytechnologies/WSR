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

    <title>WSR</title>
    
    <link rel="shortcut icon" href="logoc.jpg">
    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" type="text/css" media="print" href="print.css" />
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
select[type=option] {
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
    background-color: #f2f2f2;
    padding: 20px;
}
</style>

    <?php
    function productcode() {
        $chars = "003232303232023232023456789";
        srand((double)microtime()*1000000);
        $i = 0;
        $pass = '' ;
        while ($i <= 7) {

            $num = rand() % 33;

            $tmp = substr($chars, $num, 1);

            $pass = $pass . $tmp;

            $i++;

        }
        return $pass;
    }
    $pcode='P-'.productcode();
    ?>

</head>

<body>
   <div style="background-color:#00ff03;padding:15px;">
  <a class="go-back-link" href="sales.php"><i class="fa fa-arrow-left"></i></a><a style="padding:80px; font-size:20px;"> Check Availability </a>
</div>


    <div id="page-wrapper">
        <div class="row"><br>
            <div id="maintable"><div style="margin-top: -19px; margin-bottom: 21px;">

            <!--  <a  href = "#add" data-toggle = "modal" class="btn btn-primary">Add Collection</a>
                    <?php include 'addcollection.php'; ?> -->
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">

                        <thead>
                            <tr>
                                <th> Sr. No. </th>
                                <th> Name Of Customer </th>
								<th> Name of Co - Applicant </th>
                                <th> Mobile </th>
                                <th> Flat No. </th>
                                <th> Flat Area </th>
                                <th> Rate </th>
                                <th> Date Of Booking </th>
                                <th> Last Follow Up Date </th>
								<th> Total Flat Cost </th>
								<th> Amount Paid </th>
								<th> 20% Amt </th>
								<th> Amt pending from 20% / Processing Fees </th>
								<th> O/S of total Flat Cost </th>
								<th> Total O/S (Flat + Processing fees) </th>
								
                              
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            function formatMoney($number, $fractional=false) {
                                if ($fractional) {
                                    $number = sprintf('%.2f', $number);
                                }
                                while (true) {
                                    $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
                                    if ($replaced != $number) {
                                        $number = $replaced;
                                    } else {
                                        break;
                                    }
                                }
                                return $number;
                            }
                            include('connect.php');
                            $result = $db->prepare("SELECT * FROM collection ORDER BY name");
                            $result->execute();
                            for($i=0; $row = $result->fetch(); $i++){
                                ?>
                                <tr class="record">
                                    <td><?php echo $row['collection_id']; ?></td>
									<td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['coapplicant']; ?></td>
                                    <td><?php echo $row['mobile']; ?></td>
                                    <td><?php echo $row['flatno']; ?></td>
                                    <td><?php echo $row['flatarea']; ?></td>
                                    <td><?php echo $row['rate']; ?></td>
                                    <td><?php echo $row['bdate']; ?></td>
                                    <td><?php echo $row['nextdate']; ?></td>
                                    <td><?php echo $row['tflatcost']; ?></td>
                                    <td><?php echo $row['pamount']; ?></td>
                                    <td><?php echo $row['amount20']; ?></td>
                                    <td><?php echo $row['amtpending']; ?></td>
                                    <td><?php echo $row['osoftotal']; ?></td>
                                    <td><?php echo $row['totalofos']; ?></td>
                                   
                                    </tr>
                                    <?php
                                }
                                ?>

                            </tbody>
                        </table>
<!-- 
                    <a href="" onclick="window.print()" class="btn btn-primary"><i class="icon-print icon-large"></i> Print</a> -->
                 <!--   <a href= "product_exp.php" class = "btn btn-primary">View Product Expiration</a>-->
                        <div class="clearfix"></div>
                    </div>
                  

                    <script src="js/jquery.js"></script>
                    <script type="text/javascript">
                        $(function() {
                            $(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
if(confirm("Sure you want to delete this update? There is NO undo!"))
{

   $.ajax({
     type: "GET",
     url: "deleteproduct.php",
     data: info,
     success: function(){

     }
 });
   $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
   .animate({ opacity: "hide" }, "slow");

}

return false;

});

                        });
                    </script>

                </div>
                <!-- /.row -->
            </div>

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="vendor/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="vendor/metisMenu/metisMenu.min.js"></script>

        <!-- DataTables JavaScript -->
        <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
        <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="dist/js/sb-admin-2.js"></script>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                    responsive: true
                });
            });
        </script>

      
   </body>

   </html>
