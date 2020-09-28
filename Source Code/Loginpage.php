<?php include('login.php')?>

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
<title>Login</title>
</head>

<body>
<?php include('Navbar.php')?>



<!--Login Modal-->
<div id="login" class="modal">
  <div class="modal-content" style="height:450px">
  	<div class="titlecontainer">
      <span onclick="Home()" class="Navbutton exit">&times;</span>
      <h1><img src="../Images/login.png" class="MIcon" alt="Login Icon">Login</h1>
    </div>
    
    <div>	
		<form method="post" class="LF">
			<b style="margin-left:62px">Email: </b>
			<input type="text" name="email" placeholder="Email" required autofocus class="LFinput"><br /><hr />
			
			<b>Password: </b>
			<input type="password" name="password" placeholder=" Password" required class="LFinput"><br /><hr />
			
			<input type="submit" value="Login" class="Lbutton" name="login" style="width:390px;height:50px;font-size:x-large;float:none;margin-bottom:15px"><br />
			
		</form>
		<br />
		
		<div class="LFcontainer"><button onclick="ForgotPassword()" class="LFbutton" style="border-bottom-left-radius:18px;">Forgot Password?</button></div>
		<div class="LFcontainer"><button onclick="SignUp()" class="LFbutton" style="border-bottom-right-radius:18px;">Sign Up Now!</button></div>		 
	</div>	 
  </div>
</div>



<?php include('background.php')?>



<script>
/*Automatic oepn the Login Modal*/
document.getElementById('login').style.display='block';

function Home() {
    location.href = "Home.php";
}


function SignUp() {
    location.href = "Signuppage.php";
}

function ForgotPassword() {
    location.href = "fp1page.php";
}


</script>

</body>

</html>
