<?php
/* Database config */
$db_host		= 'localhost';
$db_user		= 'wrsroot';
$db_pass		= 'wrs@123';
$db_database	= 'wrsdatabase'; 

/* End config */

$db = new PDO('mysql:host='.$db_host.';dbname='.$db_database, $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>