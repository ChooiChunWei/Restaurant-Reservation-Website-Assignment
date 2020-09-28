<?php
	include "conn.php"; //connection
		
	if(isset($_POST['cp1']))
	{
		//retrieve data from change password 1 form
		$password = mysqli_real_escape_string($con,$_POST['password']);
		$reconfirmpassword = mysqli_real_escape_string($con,$_POST['re-password']);
		
		/*If password and reconfirmpassword are different*/							
		if($password !== $reconfirmpassword)
		{
			echo"<script>
			alert('Password and Reconfirm Password must be same!');
			window.history.go(-1);
			</script>";	
		}elseif(isset($_SESSION['user']))/*if it is customer*/
		{
			$email = $_SESSION['email'];
			$enc_password = password_hash($password, PASSWORD_DEFAULT);			
			$cp1_sql="UPDATE customers SET Customer_Password = '$enc_password' WHERE Customer_Email = '$email';";
		
			if(!mysqli_query($con, $cp1_sql))
			{
				die('Error:'.mysqli_error($con));
			}
		
				echo"<script>alert('Changed Password Successfully!');</script>";
				echo"<script>window.location.href='Home.php';</script>";
				
		}elseif(isset($_SESSION['adminemail']))/*if it is admin*/
		{
			$email = $_SESSION['email'];
			$enc_password = password_hash($password, PASSWORD_DEFAULT);			
			$cp1_sql="UPDATE admin SET Admin_Password = '$enc_password' WHERE Admin_Email = '$email';";
		
			if(!mysqli_query($con, $cp1_sql))
			{
				die('Error:'.mysqli_error($con));
			}
		
				echo"<script>alert('Changed Password Successfully!');</script>";
				echo"<script>window.location.href='Home.php';</script>";
				
		}

	}
	
	mysqli_close($con);
?>