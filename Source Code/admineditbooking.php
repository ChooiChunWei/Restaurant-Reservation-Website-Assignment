<?php
	include "conn.php"; //connection
	
	if(isset($_POST['edit'])){	
	//retrieve data from edit booking form
	$date = mysqli_real_escape_string($con,$_POST['Date']);
	$time = mysqli_real_escape_string($con,$_POST['Time']);
	$NumofG = mysqli_real_escape_string($con,$_POST['NumofG']);
	$EditID = $_SESSION['EditID'];

	$OriNum = $_SESSION['OriNumofG'];
	$OriDate = $_SESSION['OriDate'];
	$OriTime = $_SESSION['OriTime'];
	$OriTime_hour = date('H',strtotime($OriTime));	
		
	$nowdate = new DateTime();
	$nowdate->modify('-1 day');
	$inputdate = new DateTime($date);
		
	$time_hour = date('H',strtotime($time));
	$check_sql = "SELECT SUM(Num_of_guests) AS TotalNumofg FROM bookings WHERE Booking_Date = '$date' AND Booking_Time LIKE '$time_hour%' AND Customer_ID <> 'NULL';";
	$result = mysqli_query($con,$check_sql);
	
	while($rows = mysqli_fetch_array($result))
	{
		if(($date == $OriDate)&&($time_hour == $OriTime_hour))
		{
			$Total = $rows['TotalNumofg'];
			$Cal = 20- $Total + $OriNum;
		}else
		{
			$Total = $rows['TotalNumofg'];
			$Cal = 20- $Total;
		}
			
		if($NumofG >$Cal)
		{
			echo "<script>
			alert('Sorry, the booking is full for this hour.');
			window.history.go(-1)
			</script>";
		}elseif ( $nowdate > $inputdate ) 
		{
	  		echo "<script>alert('You cannot enter the date in the past!')</script>";
	  		echo "<script>window.history.go(-1)</script>";
		}
		else{
				
			$sql="UPDATE bookings SET Booking_Date='$date', Booking_Time='$time', Num_of_guests='$NumofG' WHERE Booking_ID = '$EditID';";
		
			if(!mysqli_query($con, $sql))
			{
				die('Error:'.mysqli_error($con));
			}

			echo"<script>alert('Edit Successfully!');</script>";
			echo"<script>window.location.href='adminbooking.php';</script>";
			}				
		
				
		mysqli_close($con);
	}
	}
	   
?>