<?php
/*require_once('auth.php');
require_once('../connect.php');
$result = "SELECT * FROM user WHERE";
$query = $mysqli_query($result, $db2);
$num = $mysqli_row_num($query);
echo $num;*/
if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
	foreach($_SESSION['ERRMSG_ARR'] as $msg) {
		echo '<div style="color: red; text-align: center;">',$msg,'</div><br>'; 
	}
	unset($_SESSION['ERRMSG_ARR']);
}
?>
<br />

<form action="savepersonnel.php" method="post">

			<font style=" font:bold 28px 'Aleo'; color:rgba(51,51,51,0.7); text-shadow:1px 1px 15px #000;"><center></center></font>
		<br>

		
<div class="input-prepend">
		<span style="height:30px; width:45px;" class="add-on"><i class="icon-user icon-2x"></i></span><input style="height:40px; width:300px;" type="text" name="username" Placeholder=" Enter username" required/><br>
</div>
<div class="input-prepend">
	<span style="height:30px; width:45px;" class="add-on"><i class="icon-lock icon-2x"></i></span><input type="password" style="height:40px; width:300px;" name="password" Placeholder="password" required/><br>
		</div>
<div class="input-prepend">
		<span style="height:30px; width:45px;" class="add-on"><i class="icon-user icon-2x"></i></span><input style="height:40px; width:300px;" type="text" name="name" Placeholder="Enter Name" required/><br>
</div>
<div class="input-prepend">
		<span style="height:30px; width:45px;" class="add-on"><i class="icon-user icon-2x"></i></span><input style="height:40px; width:300px;" type="text" name="position" Placeholder="Enter Position " required/><br>
</div>
<div class="input-prepend">
		<span style="height:30px; width:45px;" class="add-on"><i class="icon-user icon-2x"></i></span><select style="height:40px; width:300px;" type="text" name="access" required>
        	<option value="0">Grant Permission</option>
            <option value="1">Super Admin</option>
            <option value="2">Admin</option>
            <option value="3">Cashier</option>
        </select>
        
        <br>
</div>
<div class="input-prepend">
		<span style="height:30px; width:45px;" class="add-on"><i class="icon-user icon-2x"></i></span><input style="height:40px; width:300px;" type="text" name="contact" Placeholder="Enter Contact Number " required/><br>
</div>
<div class="input-prepend">
		<span style="height:30px; width:45px;" class="add-on"><i class="icon-time icon-2x"></i></span><input style="height:40px; width:300px;" type="text" name="date" Placeholder="Enter date joined " required/><br>
</div><br>

		<div class="qwe">
		 <button class="btn btn-large btn-primary btn-block pull-right" href="dashboard.html" type="submit"><i class="icon-signin icon-large"></i> Enter</button>
</div>
		 </form><br>
<br><br>
<br>
<br>
<br>
