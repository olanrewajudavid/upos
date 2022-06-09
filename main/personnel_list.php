<html>
<script src="js/jquery-1.7.1.min.js"></script>
<script>
	$(window).load( function(){
		$(".personnelbn").addClass('active');
	
	});
</script>
<?php
	require_once('auth.php');
	$grant = $_SESSION['SESS_GRANT_ACCESS'];
	if ($grant !== "1") {
		
		header ('location:unauthourised.php?access_key=admin');
		exit();
		
		}
?>
<head>
<title>
POS
</title>
<?php
	require_once('auth.php');
?>
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
<!--sa poip up-->
<script src="jeffartagame.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
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
</head>
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
<body>
<?php include('navfixed.php');?>
<div class="container-fluid">
      <div class="row-fluid">
	<div class="span2">
              	<?php $grant=$_SESSION['SESS_GRANT_ACCESS'];
				 if($grant ==='1') {
					include('side-bar.php');
					}
					else { include('side-bar2.php');}
				?>      
    </div><!--/span-->
	<div class="span10">
	<div class="contentheader">
			<i class="icon-group"></i> Personnels
			</div>
			<ul class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li> /
			<li class="active">Personnel Details</li>
			</ul>



<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
<?php 
			include('../connect.php');
				$result = $db->prepare("SELECT * FROM user ORDER BY id ASC");
				$result->execute();
				$rowcount = $result->rowcount();
			?>
			<div style="text-align:center;">
			Total Number of Personnels: <font color="green" style="font:bold 22px 'Aleo';"><?php echo $rowcount;?></font>
			</div>
</div>
<input type="text" name="filter" style="height:35px; margin-top: -1px;" value="" id="filter" placeholder="Search Personel..." autocomplete="off" />
<a rel="facebox" href="add_personnel.php"><Button type="submit" class="btn btn-info" style="float:right; width:230px; height:35px;" /><i class="icon-plus-sign icon-large"></i> Add Personnel</button></a><br><br>
<div class="clearfix"></div>
<div style="color:red">
<?php
	if( isset($_GET['success'])) {
		
		echo('Personnel successfully added');
	//echo '<br>'. '<a href="../index.php">';
	//'Log In >>>'. '</a>';
	}
	
?>
<?php
	if( isset($_GET['user_exist'])) {
		
	echo('Username already exist. Choose a different username');
	}
	
?>

</div>
<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th>User Name</th>
			<th>Name</th>
			<th>Position</th>
			<th>Contact No.</th>
            <th>Date Joined</th>
			<th width="120"> Action </th>
		</tr>
	</thead>
	<tbody>
		
			<?php
				include('../connect.php');
				$result = $db->prepare("SELECT * FROM user ORDER BY id ASC");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
			<td><?php echo $row['username']; ?></td>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['position']; ?></td>
			<td><?php echo $row['contact']; ?></td>
            <td><?php echo $row['date']; ?></td>
			<td><a rel="facebox" href="editpersonnel.php?idp=<?php echo $row['id']; ?>"><button class="btn btn-warning btn-mini" name="edit"><i class="icon-edit"></i> Edit </button></a>
            <?php if($row['id'] >=2){ ?>
			<a href="deletepersonnel.php?idp=<?php echo $row['id']; ?>" id="<?php echo $row['id']; ?>" class="delbutto" title="Click To Delete">
            
            <button class="btn btn-danger btn-mini" onClick="return confirm('Are you sure you want to delete? NO UNDO!!!')"><i class="icon-trash"></i> Delete</button>
            
            </a>
            <?php } ?>
            </td>
			</tr>
			<?php
				}
			?>
		
	</tbody>
</table>
<div class="clearfix"></div>
</div>
</div>
</div>

<script src="js/jquery.js"></script>
  <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
 if(confirm("Are you sure want to delete? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "deletesupplier.php",
   data: info,
   success: function(){
   
   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>
</body>
<?php include('footer.php');?>

</html>