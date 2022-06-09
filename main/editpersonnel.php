<?php
	include('../connect.php');
	//if(isset($_POST['edit'])){$id=$_GET['id'];}
	$idp=$_GET['idp'];
	$result = $db->prepare("SELECT * FROM user WHERE id= :userid");
	$result->bindParam(':userid', $idp);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveeditpersonnel.php" method="post">
<center><h4><i class="icon-edit icon-large"></i> Edit Personnel</h4></center><hr>
<div id="ac">
<input type="hidden" name="id" value="<?php echo $idp; ?>" />
<span>Username : </span><input type="text" style="width:265px; height:30px;" name="username" value="<?php echo $row['username']; ?>" /><br>
<span>Password : </span><input type="text" style="width:265px; height:30px;" name="password" value="<?php echo $row['password']; ?>" />
<span>Name: </span><input type="text" style="width:265px; height:30px;" name="name" value="<?php echo $row['name']; ?>" /><br>
<span>Position: </span><input type="text" style="width:265px; height:30px;" name="position" value="<?php echo $row['position']; ?>" /><br>
<span>Contact Number: </span><input type="text" style="width:265px; height:30px;" name="contact" value="<?php echo $row['contact']; ?>" /><br>
<span>Date Joined: </span><input style="width:265px; height:30px;" name="date" value="<?php echo $row['date']; ?>"><br>
<div style="float:right; margin-right:10px;">

<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save Changes</button>
</div>
</div>
</form>
<?php
}
?>