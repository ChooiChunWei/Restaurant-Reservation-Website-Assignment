<?php include('reserve.php');?>

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
</style>
<title>Reservation</title>
</head>

<body>
<?php include('Navbar.php')?>



<!--Reservation Form-->
<div id="reserve" class="modal">
  <div class="Rmodal-content">
  	<div class="titlecontainer" style="background-color:rgb(255, 0, 0,0.9)">
      <span onclick="Home()" class="Navbutton exit">&times;</span>
      <h1><img src="../Images/reserve.png" class="MIcon" alt="Reserve Icon">Reservation</h1>
    </div>
    
    <div class="REcontainer">
    <form method="post" class="RE"><br />
	    <b class="RElabel">Date:</b><br />
		<input type="date" placeholder=" Date" name="Date" required autofocus class="REinput"><br /><br />

		<b class="RElabel">Time:</b><br />
		<input type="time" min="12:00" max="23:00" placeholder=" Time" name="Time" required class="REinput"><br /><br />

		<b class="RElabel">Number of Guests:</b><br />
		<input type="number" min="1" max="10" placeholder=" Number of Guests" name="NumofG" required class="REinput"><br /><br />
		
		<input type="submit" value="Make Reservation" name="reserve" class="Reservebutton">
    </form>
    </div>    
   </div>
</div>



<?php include('Background.php')?>



<script >
/*Automatic oepn the Reserve Modal*/
document.getElementById('reserve').style.display='block';

function Home() {
    location.href = "Home.php";
}

</script>

</body>

</html>
