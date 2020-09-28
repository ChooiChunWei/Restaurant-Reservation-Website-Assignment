<?php Session_start();?>
<?php include('changep1.php')?>

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

span{
	color:red;
	font-size:15px;
}
</style>
<title>Change Password</title>
</head>

<body> 
<?php include('Navbar.php')?>



<!--Change Password Modal-->
<!--After FP2-->
<!--ChangeP1-->
<div id="changep1page" class="modal" style="padding-top:140px">
  <div class="modal-content " style="width:600px;height:500px">
  	<div class="titlecontainer">
      <h1><img src="../Images/changepassword.png" class="MIcon" alt="Change Password Icon">Change Password</h1>
    </div>
    
    <div>
	    <form method="post" class="FP1" >
	    <br />
	    <b>New Password:</b><br />
		<input type="password" placeholder=" Password" name="password" pattern=".{6,}" title="6 characters minimum" required class="FPinput"><br /><br />
		<b>Reconfirm New Password:</b><br />
		<input type="password" placeholder=" Reconfirm Password" name="re-password" required class="FPinput"><br />
		<span>**Please change the password!<br />**You could not login with the old password anymore.</span>
		<br />
		
		<input type="submit" value="Next" name="cp1" class="Nextbutton" style="margin-top:40px;"><br /><br />
	
	    </form>
    </div>
  </div>
</div>



<?php include('Background.php')?>



<script>
/*Automatic oepn the Forgot Password 2 Modal*/
document.getElementById('changep1page').style.display='block';

function Home() {
    location.href = "Home.php";
}

</script>

</body>

</html>
