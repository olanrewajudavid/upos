<?php
error_reporting(0);
require("../connect.php");
$shop_name = mysqli_real_escape_string($db2, $_POST["shop_name"]);
$address = mysqli_real_escape_string($db2, $_POST["address"]);
$telephone = mysqli_real_escape_string($db2, $_POST["telephone"]);
$email = mysqli_real_escape_string($db2, $_POST["email"]);
$authorised_name = mysqli_real_escape_string($db2, $_POST["authorised_name"]);

$updateSQL = "UPDATE particulars 
SET 
shop_name = '$shop_name',
address = '$address',
telephone= '$telephone',
email = '$email',
authorised_name = '$authorised_name'
WHERE part_id='1' ";
$Result1 = mysqli_query($db2, $updateSQL) or die(mysqli_error($db2));
if($Result1) {
	header("location:index.php?update_record=a_TRUE");
	die();
	} 
else {echo "error updating";}
	die()

?>