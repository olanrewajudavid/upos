<html>
<script src="js/jquery-1.7.1.min.js"></script>
<script>
	$(window).load( function(){
		$(".personnel").addClass('active');
	
	});
</script>
<?php
	require_once('auth.php');
	$grant=$_SESSION['SESS_GRANT_ACCESS'];
	if ($grant !== "1") {
		
		header ('location:unauthourised.php');
		exit();
		
		}
?>


<head>
<title>
POS
</title>
    <link rel="shortcut icon" href="images/pos.jpg">

  <link href="css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
</head>
<body>
<?php include('navfixed.php');?>

    <div class="container-fluid">
      <div class="row-fluid">
      
		<div class="span2">
              	<?php include('side-bar.php'); ?>      
    	</div><!--/span-->
        <div class="span10">
        	<div class="contentheader">

      			<i class="icon-bar-chart"></i> Add a new Personnel
			</div>
			<ul class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li> /
			<li class="active">Add Personnels</li>
			</ul>
        </div>
        <div id="login" style="margin-top:100px;">
<?php
if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
	foreach($_SESSION['ERRMSG_ARR'] as $msg) {
		echo '<div style="color: red; text-align: center;">',$msg,'</div><br>'; 
	}
	unset($_SESSION['ERRMSG_ARR']);
}
?>

<div style="color:red">
<?php
	if( isset($_GET['success'])) {
		
		echo('Personnel successfully added');
	echo '<br>'. '<a href="../index.php">'.
	'Log In >>>'. '</a>';
	}
	
?>
</div><br>

<form action="savepersonnel.php" method="post">

			<font style=" font:bold 28px 'Aleo'; color:rgba(51,51,51,0.7); text-shadow:1px 1px 15px #000;"><center></center></font>
		<br>

		
<div class="input-prepend">
		<span style="height:30px; width:45px;" class="add-on"><i class="icon-user icon-2x"></i></span><input style="height:40px; width:300px" type="text" name="username" Placeholder=" Enter username" required/><br>
</div>
<div class="input-prepend">
	<span style="height:30px; width:45px;" class="add-on"><i class="icon-lock icon-2x"></i></span><input type="password" style="height:40px; width:300px;" name="password" Placeholder="password" required/><br>
		</div>
<div class="input-prepend">
		<span style="height:30px; width:45px;" class="add-on"><i class="icon-user icon-2x"></i></span><input style="height:40px; width:300px" type="text" name="name" Placeholder="Enter Name" required/><br>
</div>
<div class="input-prepend">
		<span style="height:30px; width:45px;" class="add-on"><i class="icon-user icon-2x"></i></span><input style="height:40px; width:300px" type="text" name="position" Placeholder="Enter Position " required/><br>
</div>
<div class="input-prepend">
		<span style="height:30px; width:45px;" class="add-on"><i class="icon-phone icon-2x"></i></span><input style="height:40px; width:300px" type="text" name="contact" Placeholder="Enter Contact Number " required/><br>
</div>
<div class="input-prepend">
		<span style="height:30px; width:45px;" class="add-on"><i class="icon-time icon-2x"></i></span><input style="height:40px; width:300px" type="text" name="date" Placeholder="Enter date joined " required/><br>
</div><br>

		<div class="qwe">
		 <button class="btn btn-large btn-primary btn-block pull-right" href="dashboard.html" type="submit"><i class="icon-signin icon-large"></i> Enter</button>
</div>
		 </form><br>
<br>

         
</div>
        
	</div>

</div>
</div>
</div>
</body>
</html>