	<?php
	//Start session
	//session_start();
	require_once('auth.php');
	$grant = $_SESSION['SESS_GRANT_ACCESS'];
	if ($grant !== "1") {
		
		header ('location:index.php?access_key=admin');
		exit();
		
		}
	
	
	/*unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);
*/

// Add Personnel

$a = $_POST['username'];
$b = $_POST['password'];
$c = $_POST['name'];
$d = $_POST['position'];
$e = $_POST['access'];
$f = $_POST['contact'];
$g = $_POST['date'];

include('../connect.php');

//Seacr duplicate name
$db2 = mysqli_connect('localhost','pos','pos','sales');
$check_user = mysqli_query($db2, "SELECT username FROM user where username = '$a' ");
if(mysqli_num_rows($check_user) > 0){
    echo('Username Already exists');
	header("location: personnel_list.php?user_exist=a_TRUE");
	die();
}
else{
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
$sql = "INSERT INTO user (username,password,name,position,access,contact,date) VALUES (:a,:b,:c,:d,:e,:f,:g)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d, ':e'=>$e, ':f'=>$f,':g'=>$g));
//header("location: personnel.php?success=a_TRUE");
header("location: personnel_list.php?success=a_TRUE");
	}

}
?>
