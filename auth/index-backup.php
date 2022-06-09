<?php 

//Expiry Date
$filename = '../index.php';
if (file_exists($filename)) {

    /*echo "$filename was last modified: " . date ("F d Y H:i:s.", filectime($filename)); */
	// Date created
	$time_create = filectime($filename);
	//$timestamp = strtotime($time_create);
	
	//Current Date
	$now = date('m/d/Y h:i:s a', time());
	$now = strtotime($now);
	/*echo $time_create.
	'now date';
	echo $now; die();*/
	
	//Expired Date
	// 1yr 31536000
	// 1mth 2628000
	//echo date('m/d/Y h:i:s a', $time_create); die();
	$expiry = $time_create+36792000;
	//echo date ("F d Y H:i:s.", $expiry); die();
	if ($now >= $expiry){ 		
		header('location:../license');
	};
	
//Mod_Time
$time_modified = filemtime('../main');
$time_mod_index = filemtime('../index.php');
$time_mod_connect = filemtime('../connect.php');
/*echo $time_modified;
echo date ("F d Y H:i:s", $time_modified);*/

//Mod_time_Ref

//echo real mod...
echo "Main".$time_modified;
echo "index".$time_mod_index;
echo "Connect".$time_mod_connect;

//die();

// Expiry Validation
$lastMod = 1525258150;
$lastModIndex = 1525219015;
$lastModConnect = 1524415578;
if(($time_modified != $lastMod) || ($time_mod_index != $lastModIndex) || ($time_mod_connect != $lastModConnect)) {
	echo "hacked"; die();
	unlink('../connect.php');
	unlink('../main');
	unlink('../index.php');
	header('location:../error');
	
	}
header('location:http://127.0.0.1/pos');
}
?>
<html>

   <head>
	<script>
	
		/*var dt = new Date();
		var month = dt.getMonth() +1 ;
		var expiryDate = month - 12 ; 
		if (expiryDate == 0) {
		window.location = "http://localhost/nimasa/expiry.php"; }
		else{
		window.location = "http://localhost/nimasa/lock_screen.html"; 
		}*/

//var dt = new Date();
//var month = dt.getMonth();
//var expiryDate = month 
/*if (expiryDate >= 0) {
window.location = "../license-expired"; }
else{*/
		//window.location = "../lock_screen.html"; 
		/*}*/
	</script>
	
   </head>

   <body>
	
   </body>

</html>