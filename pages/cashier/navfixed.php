<?php
require_once('auth.php');
?>
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

<input type="hidden" id="address" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

		<script>
   function _$(id){
return document.getElementById(id);
}
		function showPopup(){
                        $('#reportData').modal('show');
		}

function submitLogout(){
	window.location.href = "https://wsrapp.com/app/pages/cashier/logout.php";
}
		

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


<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
	<div class="navbar-header" style="height: 0px;">
		<!--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>-->
		<a class="navbar-brand" href="#"></a>
	</div>
	<!-- /.navbar-header -->

	<ul class="nav navbar-top-links navbar-right">
	<strong> <?php echo $session_cashier_name; ?></strong> <li><button onclick="submitLogout()"><i class="fa fa-sign-out fa-fw"></i> Logout</button>     </li>
		<!--<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">
				<i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
			</a>
			<ul class="dropdown-menu dropdown-user">
					<li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
					</li>
				</ul>
			</li>-->
			<!-- /.dropdown -->
		</ul>
		<!-- /.navbar-top-links -->



	<!--	<div class="navbar-default sidebar" role="navigation">
			<div class="sidebar-nav navbar-collapse">
				<ul class="nav" id="side-menu">
					<li>
						<a href="#"><i class="fa fa-money fa-fw"></i> Select payment method<span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
							<li>
								<a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>">Cash</a>
							</li>
							<li>
								<a href="sales.php?id=credit&invoice=<?php echo $finalcode ?>">Credit</a>
							</li>
						</ul>
					</li>
				</div>
			</div>-->
			<!-- /.navbar-static-side -->
		</nav>

