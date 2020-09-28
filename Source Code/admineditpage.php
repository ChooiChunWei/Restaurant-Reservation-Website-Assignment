<?php Session_start();?>
<?php include('admineditbooking.php');?>

<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="main.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<link href='https://fonts.googleapis.com/css?family=Fredoka One' rel='stylesheet'>

<style>
h1{
	text-align:center;
	font-family: 'Fredoka One';
}
</style>
<title>Edit Booking</title>
</head>

<body>
<?php include('Navbar.php')?>



<!--Admin Edit Booking Records Form-->
<div id="aeditbooking" class="modal">
  <div class="modal-content">
  	<div class="titlecontainer">
      <span onclick="Home()" class="Navbutton exit">&times;</span>
      <h1><i class="fas fa-edit MIcon"></i>Edit Booking</h1>
    </div>
    
    <div class="REcontainer">
    <form method="post" class="RE"><br />
    	<?php
    		include("conn.php");
			$ID = $_GET['id'];
			$_SESSION['EditID'] = $ID;
			
			$Edit_sql = "SELECT * FROM Bookings WHERE Booking_ID = '$ID';";
			$result = mysqli_query($con,$Edit_sql);
			$rows = mysqli_fetch_array($result); 
			
			$_SESSION['OriNumofG'] = $rows['Num_of_guests'];
			$_SESSION['OriDate'] = $rows['Booking_Date'];
			$_SESSION['OriTime'] = $rows['Booking_Time'];
    	?>
    	
	    <b class="RElabel">Date:</b><br />
		<input type="date" placeholder=" Date" name="Date" required autofocus value="<?php echo $rows['Booking_Date']?>" class="EDinput"><br /><br />

		<b class="RElabel">Time:</b><br />
		<input type="time" min="12:00" max="23:00" placeholder=" Time" name="Time" required value="<?php echo $rows['Booking_Time']?>" class="EDinput"><br /><br />

		<b class="RElabel">Number of Guests:</b><br />
		<input type="number" min="1" max="10" placeholder=" Number of Guests" name="NumofG" required value="<?php echo $rows['Num_of_guests']?>" class="EDinput"><br /><br />
		
		<input type="submit" value="Edit" name="edit" class="Reservebutton">
    </form>
    </div>    
   </div>
</div>



<?php include('Background.php')?>



<script >
/*Automatic oepn the Reserve Modal*/
document.getElementById('aeditbooking').style.display='block';

function Home() {
    location.href = "adminbooking.php";
}

</script>

</body>

</html>
