<?php session_start();?>

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

td,th {
    border: 1px solid #dddddd;
    text-align: center;
    padding:20px 45px;
    font-size:20px;
    border:none;
}

th{
	border-bottom:medium silver solid;
	font-family:'Fredoka One';
}

tr:nth-last-child(1)>td:last-child{
	border-bottom-right-radius:18px;
} 

tr:nth-last-child(1)>td:first-child{
	border-bottom-left-radius:18px;
}

tr:nth-child(even) {
    background-color:#E7E7E7;
}

tr:hover{
	border-bottom: thick #666666 ridge;
	border-top: thick #666666 ridge;
	font-family:'Fredoka One';
}

button{
	border-radius: 8px;
	border-color: black;
	background-color: white;
	border: 1.8px #000000 solid;
}

button:hover{
	background-color: #CCCCCC;
}
</style>
<title>Booking Records</title>
</head>

<body>
<?php include('Navbar.php')?>



<!--Booking Records Modal-->
<div id="br" class="modal">
  <div class="modal-content">
  	<div class="titlecontainer">
      <span onclick="Home()" class="Navbutton exit">&times;</span>
      <h1><img src="../Images/bookinginfo.png" class="MIcon" alt="Booking Icon">Booking Records</h1>
    </div>
    
    <div style="border-bottom-left-radius:18px;border-bottom-right-radius:18px;">
	   <table style="border-collapse: collapse;width:100%;margin-bottom:50px;">
		   <tr>
		   	<th>Booking ID</th>
		    <th>Booking Date (Y/M/D)</th>
		    <th>Booking Time</th>
		    <th>Num. of Guests</th>
		    <th>Print/ Cancel</th>
	  	   </tr>
	  	   <?php
				include("conn.php");
				$ID = $_SESSION['id'];/*To store the customer Id*/
				
				$Read_sql="Select * FROM bookings WHERE Customer_ID = '$ID' ORDER BY Booking_Date DESC, Booking_Time ASC;";/*Read Data*/
				$result= mysqli_query($con,$Read_sql);
				
				if(mysqli_num_rows($result)<=0)/*If no records found*/
				{
					echo "<script>
					alert('You didn\'t reserve before, let\'s reserve now!');
					window.location.href ='Reservepage.php';
					</script>";
				}
				
				while($rows = mysqli_fetch_array($result))
				{
					echo "<tr>";
					echo "<td>".$rows['Booking_ID']."</td>";
					echo "<td>".$rows['Booking_Date']."</td>";
					echo "<td>".$rows['Booking_Time']."</td>";
					echo "<td>".$rows['Num_of_guests']."</td>";
					
					/*if the booking date is in the past, then cannot print and cancel*/ 
					$date = "".$rows['Booking_Date']."";
					$nowdate = new DateTime();
					$nowdate->modify('-1 day');
					$inputdate = new DateTime($date);
				
					if ( $nowdate < $inputdate ) {
						echo "<td>";
						echo "<button style=\"height:35px;width:35px;\")\"><a href=\"bookinginfo.php?id=" . $rows['Booking_ID'] ."\" style=\"color:black\"><i class=\"fas fa-print\" style=\"font-size:20px\"></i></a></button>";
						echo "<button onclick=\"reconfirm(" . $rows['Booking_ID'] .")\" style=\"height:35px;width:35px;\"><i class=\"fas fa-trash-alt\" style=\"font-size:20px\"></i></button>";
						echo "</td>";
					}else
					{
						echo "<td></td>";  
					}
					echo"</tr>";
				}
			?>
	   </table>	   
	   
    </div>
  </div>
</div>



<?php include('Background.php')?>



<script>
/*Automatic open the Booking Records Modal*/
document.getElementById('br').style.display='block';

function Home() {
    location.href = "Home.php";
}

function reconfirm( id ){
    if (confirm("Are you sure to cancel this booking?")) {
        window.location.href='cancel.php?id=' + id ;
    } else {
        location.reload();
    }
}

</script>

</body>

</html>
