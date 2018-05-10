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
	  
	  
	<input type="hidden" id="address" />
	  
<div style="background-color:#00ff03;padding:15px;">
  <a class="go-back-link" href="javascript:history.back();"><i class="fa fa-arrow-left"></i></a><a style="padding:80px; font-size:20px;"> Attendance</a>
</div>


<div class="container">
  <div class="row" style="padding-top:150px;"><h3 style="padding-left:50px;">Attendance Manage</h3>
    <div class="col-md-6 col-sm-6 col-xs-6"><div onclick="submitOn()" ><img class="img-responsive" src="img/on.png" /></div></div>
        <div class="col-md-6 col-sm-6 col-xs-6"><div onclick="showPopup()" ><img class="img-responsive" src="img/off.png" /></div></div>

    </div>

     
</div>



<div id="reportData" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Enter Reporting</h4>
      </div>
      <div class="modal-body">
           <textarea class="form-control" id="reporting" ></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" onClick="submitOff()">Submit Report</button>
      </div>
    </div>

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
	  
	  
	  
	  
	  

		<script>

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
       alert('Browser not supported');
    }
}

function showPosition(position) {
	var latVar=0.0;
	var lngVar=0.0;
	var c = $("#address").val();

    latVar = position.coords.latitude ; 
    lngVar =  position.coords.longitude;
	geocodeLatLng(latVar,lngVar);
}


function _$(id){
	return document.getElementById(id);
}
		
function submitOn(){
	var address = _$('address').value;
	window.location.href = "https://wsrapp.com/app/pages/cashier/on.php?address="+encodeURIComponent(address);

}
	


function showPopup(){
    $('#reportData').modal('show');
}

function submitOff(){
	var report = _$('reporting').value;

	if(report.length==0){
	alert('Please enter reporting first');
	}
	else{
	   var address = _$('address').value;
		window.location.href = "https://wsrapp.com/app/pages/cashier/off.php?address="+encodeURIComponent(address)+"&report="+encodeURIComponent(report);
	}

}

</script>

<script>
  
  function geocodeLatLng(latGet, lngGet) {

  	var geocoder = new google.maps.Geocoder;

  	var addressDiv = document.getElementById('address');
    
    var latlng = {lat: parseFloat(latGet), lng: parseFloat(lngGet)};

    geocoder.geocode({'location': latlng}, function(results, status) {
      if (status === 'OK') {
        if (results[0]) {
        	addressDiv.value = results[0].formatted_address;
          
        } else {
          window.alert('No results found');
        }
      } else {
        window.alert('Geocoder failed due to: ' + status);
      }
    });
  }
</script>
<script async defer
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_SZxcGLYuHd5cNnYdsKaR_kU04qU4UvY&callback=getLocation">
</script>


	  

    </body>

    </html>
