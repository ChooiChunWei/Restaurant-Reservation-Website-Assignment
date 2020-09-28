<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<link rel="stylesheet" href="main.css">
<link href='https://fonts.googleapis.com/css?family=Anton' rel='stylesheet'>
</head>

<body>

<!--Navigation Bar-->
<div class="Navbar">
	<a href="Menu.php" class="Navbutton">MENU</a>
    <a href="About.php" class="Navbutton">ABOUT</a>
    <a href="Contactpage.php" class="Navbutton">CONTACT</a>

	<?php 
	 if(isset($_SESSION['adminemail']))
	 {
     	echo "<button onclick=\"reconfirmlogout()\" class=\"LObutton\">LOG OUT</button><div class=\"Pbutton\"><img src=\"../Images/profile.png\" onclick=\"AdminPage()\" class=\"Pimg\"></div>";
     }elseif(isset($_SESSION['user']))
     {
     	echo "<button onclick=\"reconfirmlogout()\" class=\"LObutton\">LOG OUT</button><div class=\"Pbutton\"><img src=\"../Images/profile.png\" onclick=\"Profile()\" class=\"Pimg\"></div>";
     }else
     {
    	echo "<button onclick=\"Login()\" class=\"Lbutton\" >LOGIN</button>";
    }
   ?>  	
</div>



<script>
function Login(){
	location.href ="loginpage.php";
}

function reconfirmlogout(){
    if (confirm("Are you sure want to log out?")) {
        window.location.href='logout.php';
    } else {
        location.reload();
    }
}


function Profile(){
	location.href ="profilepage.php";
}

function AdminPage(){
	location.href ="adminpage.php";
}


</script>

</body>

</html>
