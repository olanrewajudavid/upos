<?php
require("../connect.php");
$query_bind_update = "SELECT * FROM particulars ";
$bind_update = mysqli_query($db2, $query_bind_update) or   die(mysqli_error());
$row_bind_update = mysqli_fetch_assoc($bind_update);
$totalRows_bind_update = mysqli_num_rows($bind_update);

if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
	foreach($_SESSION['ERRMSG_ARR'] as $msg) {
		echo '<div style="color: red; text-align: center;">',$msg,'</div><br>'; 
	}
	unset($_SESSION['ERRMSG_ARR']);
}
?>
<br />

<style>
	input	{ background-color:#CCC;}
</style>
<script>
function myFunction() {
	//alert('works');
    var str = document.getElementById("name").innerHTML; 
    var res = str.replace(/red/g, "blue");
    document.getElementById("name").innerHTML = res;
}
</script>
<form action="update_particulars.php" method="post" style="padding:0 20px 0 10px; font-family:Tahoma, Geneva, sans-serif">

			<font style=" font:bold 28px 'Aleo'; color:rgba(51,51,51,0.7); text-shadow:1px 1px 15px #000;"><center></center></font>
		<br>

		
<div class="input-prepen">
		<span style="height:30px;">Shop Name</span><br />
<input id="name" style="height:30px; width:100%; background-color:#eee" type="text" name="shop_name" value="<?php echo $row_bind_update['shop_name']; ?>" required onkeyup="myFunction()"/><br>
</div>
<div class="input-prepen">
	<span style="height:30px;">Address</span><br />
    <input type="text" style="height:30px; width:100%; background-color:#eee" name="address" value="<?php echo $row_bind_update['address']; ?>" required/><br>
		</div>
<div class="input-prepen">
		<span style="height:30px;">Telephone Number</span><br />		
        <input style="height:30px; width:100%; background-color:#eee" type="text" name="telephone" value="<?php echo $row_bind_update['telephone']; ?>" required/><br>
</div>
<div class="input-prepen">
		<span style="height:30px;">Email</span><br />
        <input style="height:30px; width:300px; background-color:#eee" type="email" name="email" value="<?php echo $row_bind_update['email']; ?>" /><br>
</div>

<div class="input-prepen">
		<span style="height:30px;">Authorised</span><br />
        <input style="height:30px; width:300px; background-color:#eee" type="text" name="authorised_name" value="<?php echo $row_bind_update['authorised_name']; ?>" required/><br>
</div>
<br />
<br />


		<div class="qwe">
		 <button class="btn btn-large btn-primary btn-block pull-right" type="submit"><i class="icon-signin icon-large"></i> Update Record</button>
</div>
		 </form><br>
<br><br>
