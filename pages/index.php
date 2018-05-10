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
	<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- MetisMenu CSS -->
	<link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="../dist/css/sb-admin-2.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


	<body>
    </head>

    <body>
	<input type="hidden" id="address" />
    	<?php
    	function createRandomPassword() {
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
    	$finalcode='RS-'.createRandomPassword();
    	?>

    	<div class="container">
    		<div class="row">
    			<div class="col-md-4 col-md-offset-4">
    				<div class="login-panel panel panel-default">
    					<div class="panel-heading">
    						<h3 class="panel-title" style="text-align:center"><b>WSR</b></h3>
    					</div>
    					<div class="tab-content">
    					
    						<div id="menu2" class="tab-pane fade in active">
    							<br />
    							<form method="post" name="cashier_form">
    								<div class="form-group">
    									<input type="text" class="form-control" name="cashier_username" placeholder="Username">
    								</div>
    								<div class="form-group">
    									<input type="password" class="form-control" name="cashier_pass" placeholder="Password">
    								</div>
    								<div class="form-group">
    									<button class="btn btn-block btn-success" id = "btn" name = "btn">Log in</button>
    								</div>
    								<div class="form-group" id="alert-msg1">
    								</div>
    							</form>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>

    	<!-- jQuery -->
    	<script src="../vendor/jquery/jquery.min.js"></script>

    	<!-- Bootstrap Core JavaScript -->
    	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    	<!-- Metis Menu Plugin JavaScript -->
    	<script src="../vendor/metisMenu/metisMenu.min.js"></script>

    	<!-- Custom Theme JavaScript -->
    	<script src="../dist/js/sb-admin-2.js"></script>

    	<script type="text/javascript">
    		jQuery(function(){
    			$('form[name="admin_form"]').on('submit', function(donard){
    				donard.preventDefault();

    				var a = $(this).find('input[name="username"]').val();
    				var b = $(this).find('input[name="pass"]').val();

    				if (a === '' && b ===''){
    					$('#alert-msg').html('<div class="alert alert-danger">All fields are required!</div>');
    				}else{
    					$.ajax({
    						type: 'POST',
    						url: 'new_login.php',
    						data: {
    							username: a,
    							password: b
    						},
    						beforeSend:  function(){
    							$('#alert-msg').html('');
    						}
    					})
    					.done(function(donard){
    						if (donard == 0){
    							$('#alert-msg').html('<div class="alert alert-danger">Incorrect username or password!</div>');
    						}else{
    							$("#btn-login").html('<img src="loading.gif" /> &nbsp; Signing In ...');
    							setTimeout(' window.location.href = "home.php"; ',2000);
    						}
    					});
    				}
    			});

    			$('form[name="cashier_form"]').on('submit', function(donard){
    				donard.preventDefault();

    				var a = $(this).find('input[name="cashier_username"]').val();
    				var b = $(this).find('input[name="cashier_pass"]').val();
					var c = $("#address").val();
					
    				if (a === '' && b ===''){
    					$('#alert-msg1').html('<div class="alert alert-danger">All fields are required!</div>');
    				}else{
    					$.ajax({
    						type: 'POST',
    						url: 'cashier/new_login.php',
    						data: {
    							username: a,
    							password: b,
								address: c
    						},
    						beforeSend:  function(){
    							$('#alert-msg1').html('');
    						}
    					})
    					.done(function(donard){
							console.log(donard);
    						if (donard == 0){
    							$('#alert-msg1').html('<div class="alert alert-danger">Incorrect username or password!</div>');
    						}else if(donard==1){
    							$("#btn").html('<img src="loading.gif" /> &nbsp; Signing In ...');
    							setTimeout(' window.location.href = "cashier/sales.php?id=cash&invoice=<?php echo $finalcode ?>"; ',2000);
    						}
							else{
								$('#alert-msg1').html('<div class="alert alert-danger">You are Today already Login !</div>');
							}
    					});
    				}
    			});
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

    latVar = position.coords.latitude ; 
    lngVar =  position.coords.longitude;
	geocodeLatLng(latVar,lngVar);
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
