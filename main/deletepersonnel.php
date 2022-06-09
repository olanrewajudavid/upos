<?php
	include('../connect.php');
	$idp=$_GET['idp'];
	$result = $db->prepare("DELETE FROM user WHERE id= :memid");
	$result->bindParam(':memid', $idp);
	$result->execute();
	header("location: personnel_list.php");
?>