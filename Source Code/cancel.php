<?php
	session_start(); 
	include("conn.php");
	
	$ID = $_GET['id'];	
	mysqli_query($con,"DELETE FROM bookings WHERE Booking_ID = $ID");

	if(mysqli_affected_rows($con)<=0)
	{
		echo"<script>
		alert('Unable to cancel booking!');
		window.location.href='bookingrecordspage.php';
		</script>";
	}else
	{
	echo "<script>alert('Booking Cancelled!')</script>";
		if(isset($_SESSION['adminemail']))/*if is is admin account*/
		{
			echo "<script>window.location.href='adminbooking.php'</script>";
		}
		elseif(isset($_SESSION['email']))/*if it is customer account*/
		{
			echo "<script>window.location.href='bookingrecordspage.php'</script>";
		}	
	mysqli_close($con);
	}
?>