<?php
	/*pwrtval=====> echo hex2bin("hexfigure"); die();*/
	require("../connect.php");
	$sel="SELECT * FROM config WHERE config_id = '1'";
	$query=mysqli_query($db2, $sel);
	$result = mysqli_fetch_assoc($query);
	$exp_count = $result['exp_count']; 
	$last_mod = $result['last_mod'];
	
if(isset($_POST['sess_but'])){
	session_start();
	$user = mysqli_real_escape_string($db2, $_POST['user']);
	$pass = mysqli_real_escape_string($db2, $_POST['pass']);
	$pass = bin2hex($pass);
//Create query
	$qry="SELECT * FROM config WHERE username='$user' AND password='$pass'";
	$result=mysqli_query($db2, $qry);
	
	//Check whether the query was successful or not
	if($result) {
		if(mysqli_num_rows($result) > 0) {
			//Login Successful
			session_regenerate_id();
			$admin = mysqli_fetch_assoc($result);
			$_SESSION['SESSION_CONFIG_ID'] = $admin['config_id'];
			session_write_close();
			header("location: config.php");
			exit();
		}else {
			echo "failed attempt....."; die();
			exit();
		}
	}else {
		echo mysqli_error($db2); die();
		die("failed....###QUERY###");
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Config :: INDEX</title>
</head>

<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<input placeholder="auth" type="text" name="user" autocomplete="off"/><br />
	<input placeholder="pass" type="password" name="pass" autocomplete="off" /><br />
<br />

    <input type="submit" name="sess_but" value="-->" />
</form>
</body>
</html>