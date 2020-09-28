<?php include('FP2.php')?>


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
<title>Forgot Password</title>
</head>

<body>
<?php include('Navbar.php')?>



<!--Forgot Password Modal-->
<!--FP2-->
<div id="fp2" class="modal" style="padding-top:140px">
  <div class="modal-content " style="width:600px;height:440px">
  	<div class="titlecontainer">
      <h1><img src="../Images/forgotpassword.png" class="MIcon" alt="Forgot Password Icon">Forgot Password?</h1>
    </div>
    
    <div>
	    <form method="post" class="FP1" >
	    <br />
	    <b>Email:</b><br />
		<input type="email" placeholder="Email" name="email" required disabled class="FPinput" value="<?php echo "".$_SESSION['email']."";?>"><br /><br />
		<b>Verify Code:</b><br />
		<input type="number" placeholder="Veriy Code" name="verifycode" required class="FPinput"><br />
		<input type="submit" value="Next" name="fp2" class="Nextbutton" style="margin-top:40px;">
	
	    </form>
    </div>
  </div>
</div>



<?php include('Background.php')?>



<script>
/*Automatic oepn the Forgot Password 2 Modal*/
document.getElementById('fp2').style.display='block';

function Home() {
    location.href = "Home.php";
}

</script>

</body>

</html>
