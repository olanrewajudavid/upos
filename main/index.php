<?php error_reporting(0); ?>
<?php include("index_data.php"); ?>
<?php
require("../connect.php");
$query_bind_update = "SELECT * FROM particulars ";
$bind_update = mysqli_query($db2, $query_bind_update) or   die(mysqli_error());
$row_bind_update = mysqli_fetch_assoc($bind_update);
$totalRows_bind_update = mysqli_num_rows($bind_update);
?>
<!DOCTYPE html>
<html>
<script src="js/jquery-1.7.1.min.js"></script>
<script>
	$(window).load( function(){
		$(".dashboard").addClass('active');
	
	});
</script>
<head>
<title>
POS
</title>
 <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
 <!-- Latest version <link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">-->
    <style type="text/css">
    
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link rel="icon" 
      type="../image/png"
      href="main/images/pos.jpg" />
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script>
	/*$(window).load( function(){
		$('.dashboard').addClass('active');
	
	});*/
</script>
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    })
  })
</script>
<?php
	require_once('auth.php');
?>
<?php
function createRandomPassword() {
	$chars = "003232303232023232023456789";
	srand((double)microtime()*1000000);
	$i = 0;
	$pass = '' ;
	while ($i <= 7) {

		$num = rand() % 33;

		$tmp = substr($chars, $num, 1);

		$pass = $pass . $tmp;

		$i++;

	}
	return $pass;
}
$finalcode='RS-'.createRandomPassword();
?>

 <script language="javascript" type="text/javascript">
/* Visit http://www.yaldex.com/ for full source code
and get more free JavaScript, CSS and DHTML scripts! */
<!-- Begin
var timerID = null;
var timerRunning = false;
function stopclock (){
if(timerRunning)
clearTimeout(timerID);
timerRunning = false;
}
function showtime () {
var now = new Date();
var hours = now.getHours();
var minutes = now.getMinutes();
var seconds = now.getSeconds()
var timeValue = "" + ((hours >12) ? hours -12 :hours)
if (timeValue == "0") timeValue = 12;
timeValue += ((minutes < 10) ? ":0" : ":") + minutes
timeValue += ((seconds < 10) ? ":0" : ":") + seconds
timeValue += (hours >= 12) ? " P.M." : " A.M."
document.clock.face.value = timeValue;
timerID = setTimeout("showtime()",1000);
timerRunning = true;
}
function startclock() {
stopclock();
showtime();
}
window.onload=startclock;
// End -->
</SCRIPT>	
</head>
<body>
<?php include('navfixed.php');?>
	<?php
$grant=$_SESSION['SESS_GRANT_ACCESS'];
if($grant !=='1') {
?>

<div class="container-fluid">
      <div class="row-fluid">
	<div class="span2">
    	<?php include('side-bar2.php'); ?>      
    </div><!--/span-->
	
    <div class="span10">
	<div class="contentheader">
			<i class="icon-dashboard"></i> Dashboard
			</div>
			<?php 
				$grant=$_SESSION['SESS_GRANT_ACCESS'];
				 if($grant === '2') {?>
			<ul class="breadcrumb">
			<li class="active"><a rel="facebox" href="particulars.php"><Button type="" class="btn btn-info" style="float:right; width:230px; height:35px;" /><i class="icon-shopping-cart icon-large"></i> Update Shop Credentials</button></a></li>
            <li>
            <div style="color:red">
            	<?php
					if(isset($_GET['update_record'])){
						echo "You have successfully updated your shop record!";
						}	
				?>
            </div>
            </li>
			</ul>
            <?php } ?>
            <div style="color:red">
            	<?php
					if(isset($_GET['access_key'])){
						echo "You are not authorised to view Sales Report page";
						}	
				?>
            </div>
			<font style=" font:bold 44px 'Aleo'; text-shadow:1px 1px 5px #777; color: rgba(0,72,145,1);"><center><?php echo $row_bind_update['shop_name']; ?></center></font>
<div id="mainmain">



<a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-2x"></i><br> Enter Sales</a>               																																										
<a href="products.php"><i class="icon-list-alt icon-2x"></i><br> Products (<?php echo $products;?>)</a>      
<a href="customer.php"><i class="icon-group icon-2x"></i><br> Customers (<?php echo $customers;?>)</a>

<?php 
				$grant=$_SESSION['SESS_GRANT_ACCESS'];
				 if($grant ==='2') {?>     
<a href="supplier.php"><i class="icon-group icon-2x"></i><br> Suppliers</a>     
<a href="sales_inventory2.php"><i class="icon-table icon-2x"></i><br> Sales Inventory</a>
<?php } ?>

</div>
<!--<a href="../index.php">Logout</a>
-->

<?php
}

if($grant ==='1') {
?>
	
	<div class="container-fluid">
      <div class="row-fluid">
	<div class="span2">
    <?php include('side-bar.php'); ?>
    </div><!--/span-->
	
    <div class="span10">
	<div class="contentheader">
			<i class="icon-dashboard"></i> Dashboard
			</div>
			<ul class="breadcrumb">
			<li class="active"><a rel="facebox" href="particulars.php"><Button type="" class="btn btn-info" style="float:right; width:230px; height:35px;" /><i class="icon-shopping-cart icon-large"></i> Update Shop Credentials</button></a></li>
            <li>
            <div style="color:red">
            	<?php
					if(isset($_GET['update_record'])){
						echo "You have successfully updated your shop record!";
						}	
				?>
            </div>
            </li>
			</ul>
			<font style=" font:bold 44px 'Aleo'; text-shadow:1px 1px 5px #777; color: rgba(0,72,145,1);"><center>
			<?php echo $row_bind_update['shop_name']; ?>
			</center></font>
<div id="mainmain">



<a href="sales_inventory.php">
<i class="icon-money icon-1x"></i> Sales Today<br><h3 class="h3">₦ <?php echo $salesd;?></h3>
<h5 style="color: #FFC1C1">Profit:&nbsp;₦ <?php echo $profitd;?>&nbsp;&nbsp;&nbsp;&nbsp; %Profit: <?php 
if( $profitd == 0 && $salesd == 0){ echo "0.00";} else{
echo $profitd_perc;}?></h5>
</a>  
<a href="sales_inventory.php"><i class="icon-money icon-1x"></i> Sales This Month<br><h3>₦ <?php echo $salesm;?></h3>
<h5 style="color: #FFC1C1">Profit:&nbsp;₦ <?php echo $profitm;?>&nbsp;&nbsp;&nbsp;&nbsp; %Profit: <?php if( $profitm == 0 && $salesm == 0){ echo "0.00";} else{
echo $profitm_perc;}?></h5>
</a>
<a href="sales_inventory.php"><i class="icon-shopping-cart icon-1x"></i> Sales This Year<br><h3>₦ <?php echo $sales;?></h3>
<h5 style="color: #FFC1C1">Profit:&nbsp;₦ <?php echo $profit;?>&nbsp;&nbsp;&nbsp;&nbsp; %Profit: <?php if( $sales == 0 && $sales == 0 ){ echo "0.00";} else{
echo $profit_perc;}?></h5>
</a>     
<a href="products.php"><i class="icon-list-alt icon-1x"></i> Products <br><h3><?php echo $products;?></h3></a>      
<a href="customer.php"><i class="icon-group icon-1x"></i> Customers <br><h3><?php echo $customers;?></h3></a>     
<a href="supplier.php"><i class="icon-group icon-1x"></i> Suppliers <br><h3><?php echo $suppliers;?></h3></a>     
<!--<a href="salesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-1x"></i><br> Sales Report</a>
<a href="sales_inventory.php"><i class="icon-table icon-1x"></i><br> Sales Inventory</a>-->

<!--<a href="../index.php"><font color="red"><i class="icon-off icon-2x"></i></font><br> Logout</a> 
-->
</div>
<?php
}
?>
<div class="clearfix"></div>
</div>
<?php include('footer.php'); ?>

</div>
</div>
</div>
</div>
</div>
</body>

<script>

function msgClose(ret){
	console.log("msgClose -> retour %s", ret);
}

$( document ).ready(function() {

	var msg = $("body").messageBox({
		modal:true,
		cbClose : msgClose,
		autoClose: 0,
		locale:{
  NO : 'No',
  YES : 'Yes',
  CANCEL : 'Cancel',
  OK : 'Okey',
  textAutoClose: 'Auto close in %d seconds'
}
	});

	$("#b-warning").click(function(){
		msg.data('messageBox').warning('MessageBox Warning', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. ');
	});

	$("#b-danger").click(function(){
		msg.data('messageBox').danger('MessageBox Danger', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. ', 10, false);
	});

	$("#b-info").click(function(){
		msg.data('messageBox').info('MessageBox Info', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. !');
	});

	$("#b-default").click(function(){
		msg.data('messageBox').default('MessageBox Default', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. ');
	});

	$("#b-perso").click(function(){
		msg.data('messageBox').default('MessageBox Default', 'Contenu image :<br /><img src="http://crackberry.com/sites/crackberry.com/files/styles/large/public/topic_images/2013/ANDROID.png?itok=xhm7jaxS" width="200px" alt="img">');
	});

	$("#b-question").click(function(){
		msg.data('messageBox').question('Disque dur', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', [{text:'Yes',return:128}, {text:'No',return:127},{text:'C\'est a moi que tu me cause ?',return:126}]);
	});

	$("#b-exclamation").click(function(){
		msg.data('messageBox').exclamation('Disque dur', 'Le disque est plein.<br /><em>Pensez à le nettoyer de temps en temps.</em>', [{text:'Merci',return:128}]);
	});

	return 0;
});
</script>

</html>
