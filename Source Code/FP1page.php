<?php include('FP1.php')?>

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
	font-family: 'Averia Serif Libre';
}
</style>
<title>Forgot Password</title>
</head>

<body>
<?php include('Navbar.php')?>


<!--Forgot Password Modal-->
<!--FP1-->
<div id="fp1" class="modal" style="padding-top:200px">
  <div class="modal-content " style="width:600px;height:290px">
  	<div class="titlecontainer">
      <span onclick="Home()" class="Navbutton exit">&times;</span>
      <h1><img src="../Images/forgotpassword.png" class="MIcon" alt="Forgot Password Icon">Forgot Password?</h1>
    </div>
    
    <div>
	    <form method="post" class="FP1" >
	    <br />
	    <b>Email:</b><br />
		<input type="email" placeholder="Email" name="email" required class="FPinput" ><br />
		<input type="submit" value="Next" name="fp1" class="Nextbutton" >
	
	    </form>
    </div>
  </div>
</div>



<?php include('Background.php')?>



<script>
/*Automatic oepn the Forgot Password 1 Modal*/
document.getElementById('fp1').style.display='block';

function Home() {
    location.href = "Home.php";
}

</script>

</body>

</html>
