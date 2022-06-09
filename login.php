<?php
	//Start session
	session_start();
	
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	//Connect to mysql server
		require("connect.php");

	
	//Select database
	/*$db = mysql_select_db('sales', $link);
	if(!$db) {
		die("Something went wrong!!! Please try again later");
	}*/
	
	//Function to sanitize values received from the form. Prevents SQL injection
	/*function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysqli_real_escape_string($str);
	}*/
	
	//Sanitize the POST values
	/*$login = clean($_POST['username']);
	$password = clean($_POST['password']);*/
	$login = mysqli_real_escape_string($db2, $_POST['username']);
	$password = mysqli_real_escape_string($db2, $_POST['password']);
	
	//Input Validations
	if($login == '' || $password == '')  {
		$errmsg_arr[] = 'Unauthorised Attempt!!!';
		$errflag = true;
	}
	/*if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}*/
	
	//If there are input validations, redirect back to the login form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: index.php");
		exit();
	}
	
	//Create query
	$qry="SELECT * FROM user WHERE username='$login' AND password='$password'";
	$result=mysqli_query($db2, $qry);
	
	//Check whether the query was successful or not
	if($result) {
		if(mysqli_num_rows($result) > 0) {
			//Login Successful
			session_regenerate_id();
			$member = mysqli_fetch_assoc($result);
			$_SESSION['SESS_MEMBER_ID'] = $member['id'];
			$_SESSION['SESS_FIRST_NAME'] = $member['name'];
			$_SESSION['SESS_LAST_NAME'] = $member['position'];
			$_SESSION['SESS_GRANT_ACCESS'] = $member['access'];
			//$_SESSION['SESS_PRO_PIC'] = $member['profImage'];
			session_write_close();
			header("location: main/index");
			exit();
		}else {
			//Login failed
			header("location: index.php");
			exit();
		}
	}else {
		die("Query failed");
	}
?>