<?php
// configuration
include('../connect.php');

// new data
$id = $_POST['id'];
$a = $_POST['username'];
$b = $_POST['password'];
$c = $_POST['name'];
$d = $_POST['position'];
$e = $_POST['contact'];
$f = $_POST['date'];
// query
$sql = "UPDATE user 
        SET username=?, password=?, name=?, position=?, contact=?, date=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$c,$d,$e,$f,$id));
header("location: personnel_list.php");

?>