<?php
session_start();
include "conn.php";

if(isset($_POST['login']))
{

$email= mysqli_real_escape_string($con,$_POST['email']);
$password= mysqli_real_escape_string($con,$_POST['password']);

$admin_check_sql = "SELECT * FROM admin WHERE Admin_Email = '$email'";
$admin_result = mysqli_query($con,$admin_check_sql);
$admin = mysqli_fetch_array($admin_result);

if(!mysqli_query($con, $admin_check_sql))
{
	die('Error:'.mysqli_error($con));
}


$customer_check_sql = "SELECT * FROM customers WHERE Customer_Email = '$email'";
$customer_result = mysqli_query($con,$customer_check_sql);
$customer = mysqli_fetch_array($customer_result);

if(!mysqli_query($con, $customer_check_sql))
{
	die('Error:'.mysqli_error($con));
}

if(password_verify($password, $customer['Customer_Password']) && !(password_verify($password, $admin['Admin_Password'])))
{
	$_SESSION['email'] = $customer['Customer_Email'];//use session
	$_SESSION['user'] = $customer['Customer_Name'];//as a marking that the user logged in
	$_SESSION['id'] = $customer['Customer_ID'];
	$username = $_SESSION['user'];
	
	echo "<script>alert('Login Successful, $username!');</script>";
	echo"<script>
	window.location.href='Home.php';
	</script>";
	
}elseif(password_verify($password, $admin['Admin_Password']) && !(password_verify($password, $customer['Customer_Password'])))
{
	echo"<script>
	alert('Login Successful, Admin!');
	</script>";
	$_SESSION['adminemail'] = $admin['Admin_Email'];//use session
	
	echo"<script>
	window.location.href='Home.php';
	</script>";
}else
{
	echo "<script>
	alert('Wrong email / password! Please try again!');
	window.history.go(-1);
	</script>";
}
}
mysqli_close($con);
?>