<?php
	session_start();
	if(!isset($_SESSION['SESSION_CONFIG_ID']) || (trim($_SESSION['SESSION_CONFIG_ID']) == '')) {
		header("location: index.php");
		exit();
	}
	require("../connect.php");
	$sel="SELECT * FROM config WHERE config_id = '1'";
	$query=mysqli_query($db2, $sel);
	$result = mysqli_fetch_assoc($query);
	$exp_count = $result['exp_count']; 
	$last_mod = $result['last_mod'];
	
		if(isset($_POST['config_but'])){
		require("../connect.php");
		$exp_count = mysqli_real_escape_string($db2, $_POST["exp_count"]);
		$last_mod = mysqli_real_escape_string($db2, $_POST["last_mod"]);

		$updateSQL = "UPDATE config 
		SET 
		exp_count = '$exp_count',
		last_mod = '$last_mod'
		WHERE config_id = '1' ";
		$Result1 = mysqli_query($db2, $updateSQL) or die(
		mysqli_error($db2));
		}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Config</title>
</head>

<body>
<?php 
//Expiry Date
$filename = '../index.php';
if (file_exists($filename)) {
	$time_modified = filemtime($filename);
	$time_create = filectime($filename);
	$time_create2 = date ("F d Y H:i:s.", $time_create);;
	
	echo "Mod:".$time_modified."<br>";
	echo "T_Create:".$time_create2."<br>";


}

?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<input placeholder="exp_count" type="text" value="<?php echo $exp_count ?>" name="exp_count" autocomplete="off"/><br />
	<input placeholder="last_mod" type="text" value="<?php echo $last_mod ?>" name="last_mod" autocomplete="off" /><br />
<br />

    <input type="submit" name="config_but" value="-->" />
</form>

<a href="logout.php"><--</a>
</body>
</html>