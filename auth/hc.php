<?php 

$files = array ('1.php','2.php','3.php','d','e','f');
$count = count($files);
for ($x = 0; $x <= $count; $x++) {
   $time_create = filectime($files[$x]);
	//$timestamp = strtotime($time_create);
	
	//Current Date
	$now = date('m/d/Y h:i:s a', time());
	$now = strtotime($now);
	echo "cuttent time".$now;
	//Expired Date
	$expiry = $time_create+31556952;
	if ($now >= $expiry){ 
		//unlink("test.php");
		//header('location:error.php');
	};
	
//Check for Hack
$time_modified = filemtime($files[$x]);
echo $time_modified;
echo date ("F d Y H:i:s.", $time_modified);
$lastMod = 1524096481;
if($time_modified != $lastMod) {
    // file was modified
	unlink($files[$x]);
	echo "hacked";
	} 

}
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
	
	//Expired Date
	$expiry = $time_create+30;
	if ($now >= $expiry){ 
		//unlink("test.php");
		echo "expired";
	};
	
//Check for Hack
$time_modified = filemtime('test.php');
echo $time_modified;
echo date ("F d Y H:i:s.", $time_modified);
$lastMod = 1524096481;
if($time_modified != $lastMod) {
    // file was modified
	unlink("test.php");
	echo "hacked";
}
// Date created
	$time_modified = filemtime($filename);
	//$timestamp = strtotime($time_create);
	
	//Current Date
	$now = date('m/d/Y h:i:s a', time());
	$now = strtotime($now);
	
	//Expired Date
	$expiry = $time_create+30;
	if ($now >= $expiry){ 
		//vunlink("test.php");
	};

	die(); 
	//$now = new DateTime();
	/*$date_created = new DateTime($date_created);
            $expiry = $date_created->modify('+ 30 days');
            if ($now >= $expiry) {
                unlink($logfile);
            }
	die();*/
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

var dt = new Date();
var month = dt.getMonth();
var expiryDate = month 
/*if (expiryDate >= 0) {
window.location = "../license-expired"; }
else{*/
		window.location = "../lock_screen.html"; 
		/*}*/
	</script>
	
   </head>

   <body>
	
   </body>

</html>