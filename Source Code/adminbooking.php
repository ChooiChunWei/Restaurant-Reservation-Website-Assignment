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
    padding:20px 40px;
    font-size:20px;
    border:none;
}

th{
	border-bottom:medium silver solid;
	border-top:medium silver solid;
	font-family:'Fredoka One';
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
<div id="abr" class="modal">
  <div class="modal-content" style="width:1500px">
  	<div class="titlecontainer">
      <span onclick="Home()" class="Navbutton exit">&times;</span>
      <h1><img src="../Images/bookinginfo.png" class="MIcon" alt="Booking Icon">Booking Records</h1>
    </div>
    
    <div style="background-color:#E7E7E7;">
    <form method="post" style="padding:30px">
    		<input type="number" name="BookingID" placeholder=" Booking ID" style="margin-left:208px" class="Searchinput">
    		<input type="email" name="Email" placeholder=" Email" class="Searchinput">
    		<input type="date" name="Date" placeholder=" Booking Date" class="Searchinput">
    		<input type="submit" name="Searchbtn" value="Search" class="Searchinput Searchbutton">
    		<input type="submit" value="Reset" onclick="Reset()" class="Searchinput Searchbutton">
    		<input type="submit" value="Print" onclick="printContent('abr')" class="Searchinput Searchbutton">

    </form>
    </div>
    
    <div>
	   <table style="border-collapse: collapse;width:100%;margin-bottom:50px;">
		   <tr>
		   	<th>Booking ID</th>
		   	<th>Email</th>
		   	<th>Phone Number</th>
		    <th>Booking Date (Y/M/D)</th>
		    <th>Booking Time</th>
		    <th>Num. of Guests</th>
		    <th>Edit/ Cancel</th>
	  	   </tr>
	  	   <?php
				include("conn.php");
				
				if(isset($_POST['Searchbtn']))
				{
					if(empty($_POST['BookingID'])&& empty($_POST['Email'])&& empty($_POST['Date']))
					{
						echo "<script>
						alert('Please key in your search first!');
						window.location.href='adminbooking.php';
						</script>";
					}elseif(isset($_POST['Email']) && empty($_POST['Date'])&& empty($_POST['BookingID']))
					{
							$Email= mysqli_real_escape_string($con,$_POST['Email']);
							$Email_sql = "SELECT B.Booking_ID, B.Booking_Date, B.Booking_Time, B.Num_of_guests, C.Customer_Email, C.Customer_Phone_Number FROM Bookings AS B JOIN Customers AS C ON B.Customer_ID=C.Customer_ID WHERE C.Customer_Email = '$Email' ORDER BY B.Booking_Date DESC, B.Booking_Time ASC;";
							$result = mysqli_query($con,$Email_sql);
					}elseif(isset($_POST['Date']) && empty($_POST['Email'])&& empty($_POST['BookingID']))
					{
							$Date= mysqli_real_escape_string($con,$_POST['Date']);
							$Date_sql = "SELECT B.Booking_ID, B.Booking_Date, B.Booking_Time, B.Num_of_guests, C.Customer_Email, C.Customer_Phone_Number FROM Bookings AS B JOIN Customers AS C ON B.Customer_ID=C.Customer_ID WHERE B.Booking_Date = '$Date' ORDER BY B.Booking_Time ASC;";
							$result = mysqli_query($con,$Date_sql);
					}elseif(isset($_POST['Email']) && isset($_POST['Date'])&& empty($_POST['BookingID']))
					{
							$Email= mysqli_real_escape_string($con,$_POST['Email']);
							$Date= mysqli_real_escape_string($con,$_POST['Date']);
							$Email_Date_sql = "SELECT B.Booking_ID, B.Booking_Date, B.Booking_Time, B.Num_of_guests, C.Customer_Email, C.Customer_Phone_Number FROM Bookings AS B JOIN Customers AS C ON B.Customer_ID=C.Customer_ID WHERE C.Customer_Email = '$Email' AND B.Booking_Date = '$Date' ORDER BY B.Booking_Time ASC;";
							$result = mysqli_query($con,$Email_Date_sql);
					}elseif(isset($_POST['Email']) && isset($_POST['Date']) && isset($_POST['BookingID']))
					{	
						$BookingID= mysqli_real_escape_string($con,$_POST['BookingID']);
						$BookingID_sql = "SELECT B.Booking_ID, B.Booking_Date, B.Booking_Time, B.Num_of_guests, C.Customer_Email, C.Customer_Phone_Number FROM Bookings AS B JOIN Customers AS C ON B.Customer_ID=C.Customer_ID WHERE B.Booking_ID = '$BookingID';";
						$result = mysqli_query($con,$BookingID_sql);
					}						
					
				}else
				{	/*Normal search*/
					$Read_sql="SELECT B.Booking_ID, B.Booking_Date, B.Booking_Time, B.Num_of_guests, C.Customer_Email, C.Customer_Phone_Number FROM Bookings AS B JOIN Customers AS C ON B.Customer_ID=C.Customer_ID ORDER BY B.Booking_Date DESC, B.Booking_Time ASC;";
					$result= mysqli_query($con,$Read_sql);
				}

				
				if(mysqli_num_rows($result)<=0)
				{
					echo "<script>
					alert('No booking records found.');
					window.location.href='adminbooking.php';
					</script>";
				}
				
				while($rows = mysqli_fetch_array($result))
				{
					echo "<tr>";
					echo "<td>".$rows['Booking_ID']."</td>";
					echo "<td>".$rows['Customer_Email']."</td>";
					echo "<td>".$rows['Customer_Phone_Number']."</td>";
					echo "<td>".$rows['Booking_Date']."</td>";
					echo "<td>".$rows['Booking_Time']."</td>";
					echo "<td>".$rows['Num_of_guests']."</td>";
					
					echo "<td>";
					echo "<button onclick=\"reconfirmedit(" . $rows['Booking_ID'] .")\" style=\"height:35px;width:35px;cursor: pointer;\"><i class=\"fas fa-edit\" style=\"font-size:20px\"></i></button>";
					echo "<button onclick=\"reconfirm(" . $rows['Booking_ID'] .")\" style=\"height:35px;width:35px;cursor: pointer;\"><i class=\"fas fa-trash-alt\" style=\"font-size:20px\"></i></button>";
					echo "</td>";
					
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
document.getElementById('abr').style.display='block';

function Home() {
    location.href = "Home.php";
}

function Reset() {
    location.reload(true);
}

function reconfirmedit( id ){
    if (confirm("Are you sure to edit this booking?")) {
        window.location.href='admineditpage.php?id=' + id ;
    } else {
        location.reload();
    }
}

function reconfirm( id ){
    if (confirm("Are you sure to cancel this booking?")) {
        window.location.href='cancel.php?id=' + id ;
    } else {
        location.reload();
    }
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
