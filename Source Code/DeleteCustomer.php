<?php
	session_start(); 
	include("conn.php");
	
	$ID = $_GET['id'];/*get the id that selected to delete*/
	
	/*Check whether the customer's booking records*/
	$Check_sql = "SELECT * FROM bookings WHERE Customer_ID = '$ID';";
	$Check = mysqli_query($con,$Check_sql);
	
	if(mysqli_num_rows($Check)>0)/*if got records*/
	{
		$Delete_Customer_sql = "DELETE FROM customers WHERE Customer_ID = '$ID';";
		$Delete_Customer = mysqli_query($con,$Delete_Customer_sql);
		
		$Update_Booking_sql = "UPDATE bookings SET Customer_ID=NULL WHERE Customer_ID = '$ID';";
		$Update_Booking = mysqli_query($con,$Update_Booking_sql); 
	}elseif(mysqli_num_rows($Check)<=0)/*if no records*/
	{
		$Delete_Customer_sql = "DELETE FROM customers WHERE Customer_ID = '$ID';";
		$Delete_Customer = mysqli_query($con,$Delete_Customer_sql);
	}
	
	if(mysqli_affected_rows($con)<=0)
	{
		echo"<script>
		alert('Unable to delete customer!');
		window.location.href='admincustomerinfo.php';
		</script>";
	}else
	{
	echo "<script>alert('Customer Deleted!')</script>";
	echo "<script>window.location.href='admincustomerinfo.php'</script>";
		
	mysqli_close($con);
	}
?>