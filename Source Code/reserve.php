<?php
	session_start();
	include "conn.php"; //connection

	/*if the user haven't login*/
	if (!isset($_SESSION['user'])) {
	  	echo "<script>
	  	alert('Please login first.');
	  	window.location.href='Loginpage.php';
	  	</script>";
	  	
	  }else
	  {		
		if(isset($_POST['reserve'])){	
		//retrieve data from reservation form
		$date = mysqli_real_escape_string($con,$_POST['Date']);
		$time = mysqli_real_escape_string($con,$_POST['Time']);
		$NumofG = mysqli_real_escape_string($con,$_POST['NumofG']);
		
		$nowdate = new DateTime();
		$inputdate = new DateTime($date);
		
		$time_hour = date('H',strtotime($time));
		$check_sql = "SELECT SUM(Num_of_guests) AS TotalNumofg FROM bookings WHERE Booking_Date = '$date' AND Booking_Time LIKE '$time_hour%' AND Customer_ID <> 'NULL';";
		$result = mysqli_query($con,$check_sql);
		
		while($rows = mysqli_fetch_array($result))
		{
			$Total = $rows['TotalNumofg'];/*calculation for the maximum capacity per hour*/
			$Cal = 20- $Total;
			
			if($NumofG >$Cal)
			{
				echo "<script>
				alert('Sorry, the booking is full for this hour.');
				window.history.go(-1)
				</script>";
			}elseif ( $nowdate > $inputdate )/*Check the booking date in the past*/ 
			{
		  		echo "<script>alert('You cannot enter the date in the past!\\nYou need to do the reservation at least one day before.')</script>";
		  		echo "<script>window.history.go(-1)</script>";
			}
			else{
				
				$sql="INSERT INTO bookings(Booking_Date,Booking_Time,Num_of_guests,Customer_ID)VALUES('$date','$time','$NumofG','".$_SESSION ['id']."');";
			
				if(!mysqli_query($con, $sql))
				{
					die('Error:'.mysqli_error($con));
				}
		
				$_SESSION['date'] = $date ;
				$_SESSION['time'] = $time ;
				$_SESSION['numofg'] = $NumofG ;
			
				echo"<script>alert('Reserve Successfully!');</script>";
				echo "<script>window.location.href= 'bookinginfo.php' </script>";	
				}				
		
				
		mysqli_close($con);
		}
	   }
	   }
?>