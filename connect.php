<?php
/* Database config */
$db_host		= 'localhost';
$db_user		= 'pos';
$db_pass		= 'pos';
$db_database	= 'sales'; 

/* End config */

$db = new PDO('mysql:host='.$db_host.';dbname='.$db_database, $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db2 = mysqli_connect($db_host, $db_user, $db_pass, $db_database);
//if(!$db2) {trigger_error(mysql_error(),E_USER_ERROR); }
if(!$db2) {echo "Oops! Can't connect!"; }

//$db2 = $mysql_connect($db_host, $db_user, $db_pass, $db_database);

?>