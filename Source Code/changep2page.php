<?php Session_start();?>
<?php include('changep2.php');?>

<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="main.css">
<link href='https://fonts.googleapis.com/css?family=Fredoka One' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Averia Serif Libre' rel='stylesheet'>

<style>
h1{
	text-align:center;
	font-family: 'Fredoka One';
}

b{
	font-family:'Averia Serif Libre';
}

</style>
<title>Change Password</title>
</head>

<body>
<?php include('Navbar.php')?>



<!--Change Password Modal-->
<!--After MyProfile-->
<!--ChangeP2-->
<div id="changep2page" class="modal" style="padding-top:140px">
  <div class="modal-content " style="width:600px">
  	<div class="titlecontainer">
  	  <span onclick="Home()" class="Navbutton exit">&times;</span>
      <h1><img src="../Images/changepassword.png" class="MIcon" alt="Change Password Icon">Change Password</h1>
    </div>
    
    <div>
	    <form method="post" class="FP1" >
	    <br />
	    <b>Old Password:</b><br />
		<input type="password" placeholder=" Old Password" name="oldpassword" required class="FPinput"><br /><br />
	    <b>New Password:</b><br />
		<input type="password" placeholder=" Password" name="password" pattern=".{6,}" title="6 characters minimum" required class="FPinput"><br /><br />
		<b>Reconfirm New Password:</b><br />
		<input type="password" placeholder=" Reconfirm Password" name="re-password" required class="FPinput"><br />
		
		<input type="submit" value="Change Password" name="cp2" class="Nextbutton" style="margin-top:40px;margin-bottom:40px;">
	
	    </form>
    </div>
  </div>
</div>



<?php include('Background.php')?>



<script>
/*Automatic oepn the Forgot Password 2 Modal*/
document.getElementById('changep2page').style.display='block';

function Home() {
    location.href = "Home.php";
}

</script>

</body>

</html>
