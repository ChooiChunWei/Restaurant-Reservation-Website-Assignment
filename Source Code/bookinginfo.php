<?php session_start();?>

<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="main.css">
<link href='https://fonts.googleapis.com/css?family=Fredoka One' rel='stylesheet'>

<style>
h1{
	text-align:center;
	font-family: 'Fredoka One';
}

td {
    border: 1px solid #dddddd;
    text-align: left;
    padding:20px 55px;
    font-size:20px;
    border:none;
    font-family:'Fredoka One';
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
<title>Booking Info</title>
</head>

<body>
<?php include('Navbar.php')?>



<!--Booking Information Modal-->
<div id="bi" class="modal" style="padding-top:180px">
  <div class="modal-content" style="width:600px;margin-bottom:250px;">
  	<div class="titlecontainer">
      <span onclick="Home()" class="Navbutton exit">&times;</span>
      <h1><img src="../Images/bookinginfo.png" class="MIcon" alt="Booking Icon">Booking Info</h1>
    </div>
    
    <div>
	   <table style="border-collapse: collapse;width:100%;">
	   	<?php
	   		include "conn.php";
	   		
	   		if(isset($_GET['id']))/*if navigated from booking records page*/
	   		{
				$ID=$_GET['id'];
				$Read_sql="SELECT B.Booking_ID, B.Booking_Date, B.Booking_Time, B.Num_of_guests, C.Customer_Email FROM Bookings AS B JOIN Customers AS C ON B.Customer_ID=C.Customer_ID WHERE B.Booking_ID ='$ID' ";
				$result= mysqli_query($con,$Read_sql);
	   		}else
	   		{/*if navigated from reserve page*/
	   		$CustomerEmail = $_SESSION['email'];
	   		$BookingDate= $_SESSION['date'];
	   		$BookingTime= $_SESSION['time'];
	   		$NumofG = $_SESSION['numofg'];
	   		
	   		$Read_sql="SELECT B.Booking_ID, B.Booking_Date, B.Booking_Time, B.Num_of_guests, C.Customer_Email FROM Bookings AS B JOIN Customers AS C ON B.Customer_ID=C.Customer_ID WHERE C.Customer_Email = '$CustomerEmail' AND B.Booking_Date = '$BookingDate' AND B.Booking_Time = '$BookingTime' AND B.Num_of_guests = '$NumofG';";
			$result= mysqli_query($con,$Read_sql);
			}
				
				if(mysqli_num_rows($result)<=0)/*if no records found*/
				{
					echo "<script>
					alert('You didn\'t reserve before, let\'s reserve now!');
					window.location.href ='Reservepage.php';
					</script>";
				}
				
				while($rows = mysqli_fetch_array($result))
				{
					echo "<tr>";
					echo "<td>Email:</td>";
					echo "<td>".$rows['Customer_Email']."</td>";
					echo "</tr>";
					
					echo "<tr>";
					echo "<td>Booking ID:</td>";
					echo "<td>".$rows['Booking_ID']."</td>";
					echo "</tr>";
					
					echo "<tr>";
					echo "<td>Date:</td>";
					echo "<td>".$rows['Booking_Date']."</td>";
					echo "</tr>";
					
					echo "<tr>";
					echo "<td>Time:</td>";
					echo "<td>".$rows['Booking_Time']."</td>";
					echo "</tr>";
					
					echo "<tr style=\"border-bottom-color: #000000; border-bottom-style: solid; border-bottom-width: 1px;\">";
					echo "<td>Number of Guests:</td>";
					echo "<td>".$rows['Num_of_guests']."</td>";
					echo "</tr>";
	 
				}  	
	   	?>
	   </table>	   
	   
	   <div style="background-color:#F1F3F4;text-align:center;padding: 10px 55px;border-bottom-left-radius:18px;border-bottom-right-radius:18px;font-family:'Fredoka One';">
	   	<p>Please show this booking info to prove your booking.</p>
	   	<button onclick="printContent('bi')" class="Printbutton">Print</button>
	   </div>
    </div>
  </div>
</div>



<?php include('Background.php')?>



<script>
/*Automatic open the Booking Info Modal*/
document.getElementById('bi').style.display='block';

function Home() {
    location.href = "Home.php";
}

function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}
</script>

</body>

</html>
