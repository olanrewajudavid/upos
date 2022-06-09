<?php
	//Start session
	session_start();
	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);
	unset($_SESSION['SESS_GRANT_ACCESS']);
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>uPOS</title>
  
   <link rel="icon" 
      type="image/png"
      href="main/images/pos.jpg" />
      <link rel="stylesheet" href="style/style2.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="main/css/style2.css">

<script src="js/jquery.min.js"></script>
<script>
function login() {
    var user = document.getElementById("user").value;
 	var  pass = document.getElementById("pass").value;
 
  if(user.length == 0 && pass.length == 0) 
 {  $( '.alert' ).html("Enter all required fields!");
 	$('.user').focus()
  return false;
 }
 
 if(user.length == 0) 
 {  $( '.alert' ).html("Enter Username!");
 $('.user').focus()
  return false;
 }

 if(pass.length == 0) 
 {  $( '.alert' ).html("Enter Password!");
	$('.pass').focus()
  	return false;
 }
 
 if(user.length > 0 && pass.length > 0) 
 { 
  $.ajax({
  type: 'post',
  url: 'logger/login.php',
  data: 
  $('#login').serialize(),
  success:
  /*function (response) {
   $( '.alert' ).html(response);
   return false;
 }*/
 function(response){    
			if(response=='true')    {
			 //$("#add_err").html("right username or password");
			 //window.location="assets/email-interface.php";
			 
			 /*$(".load").html('<img src="images/gifs/giphy.gif" /> &nbsp; Signing In ...');*/
			 $(".alert").html('Signing In ...');
      setTimeout(' window.location= "assets/email-interface.php"; ',3000);
			}
			else {
				
   $( '.alert' ).html("Invalid Username or Password!");
    $('.user').focus();
   return false;
 					
			}
 },
 
	
  });
 
}
 else
 {
  $( 'alert' ).html("Enter All necessary fields!");
  return false;
 }

var form = document.getElementById('login').reset();
return false;

}
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

<div>
	<div class="header">
      	<p> <img src="main/images/UPOS LOGO.jpg" width="130px" height="60px"><br>
        Automated Point of Sales System
 		</p>
	</div>
    <?php
if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
	foreach($_SESSION['ERRMSG_ARR'] as $msg) {
		echo '<div style="color: red; text-align: center;">',$msg,'</div>'; 
	}
	unset($_SESSION['ERRMSG_ARR']);
}
?>
      <form name="form" id="login" action="login.php" method="post">
       
      <fieldset>
          <legend><img src="main/images/icons/login3.png" width="50" height="50" /></legend>
        <div style="" id="alert" class="alert">
         
        </div>


         <!-- <label for="name">Username</label>-->
          <div class="form-group">
          <input type="text" id="user" name="username" placeholder="Username" class="user" required autocomplete="off" onmouseover="this.focus();">
          <i class="fa fa-user"></i>
          </div>
          
          <!--<label for="mail">Password</label>-->
          <div class="form-group">
          <input type="password" id="pass" name="password" placeholder="Password" class="pass" onmouseover="this.focus();" required>
          <i class="fa fa-lock"></i>
          </div>
          <input type="hidden" name="submit" value="check">       
		<center>
          <button type="submit">Login</button>
        </center>
        </fieldset>
      </form>  
      <div class="footer">
      Product of <!--<span id="date"></span>--><a href="http://laureltechnology.com" target="_blank"> Laurel Technology &nbsp;</a>&nbsp;&copy;2018<br>
Tel: +2348032081158</div>
 </div> 




</body>
</html>
<script>
document.getElementById('date').innerHTML = ( new Date().getFullYear())
</script>
<?php
//session_destroy();
//session_unset();
?>