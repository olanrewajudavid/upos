<?php 
//Expiry Date
/*if(isset($_GET['tm'])){
	$tm = $_GET['tm'];
	echo $tm; die();
	};*/
error_reporting(0);

	require("../connect.php");
	$sel="SELECT * FROM config WHERE config_id = '1'";
	$query=mysqli_query($db2, $sel);
	$result = mysqli_fetch_assoc($query);
	$exp_count = $result['exp_count']; 
	$last_mod = $result['last_mod'];
	
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
	
	//Reference Time
	//1 day = 86400
	// 1yr = 31536000
	
	//Echo Reference date
	//echo date ("F d Y H:i:s.", $time_create); die();
	$expiry = $time_create+(86400*$exp_count);
	/*echo date ("F d Y H:i:s.", $expiry); 
	echo "Date now".date ("F d Y H:i:s.", $now);
	die();*/
	if ($now >= $expiry){ 
		//unlink("test.php");
		//echo "expired"."expiry date".$expiry; 
		//echo "now:".$now;
		//die();
		
		header('location:../license');
		die();
	};
	
	//Check for Hack
	$time_modified = filemtime('../index.php');
	// To check last modified of above file
	
	//echo $time_modified."<br>"; die();
	
	/*echo date ("F d Y H:i:s.", $time_modified); die()*/;
	$lastMod = $last_mod;
	if($time_modified != $lastMod) {
		// file was modified
		
	/*

	unlink("../main");
	unlink("../auth");
	unlink("../config");
	*/
	unlink('../test.php');
	echo "Oops! Something went wrong!";
	header('location:../error102');
	die();
	}
	
}
else {
header('location:../error101');
die();
}
?>