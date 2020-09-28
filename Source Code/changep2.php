<?php
	include "conn.php"; //connection
		
	if(isset($_POST['cp2']))
	{
		//retrieve data from change password 2 form
		$oldpassword= mysqli_real_escape_string($con,$_POST['oldpassword']);
		$password = mysqli_real_escape_string($con,$_POST['password']);
		$reconfirmpassword = mysqli_real_escape_string($con,$_POST['re-password']);
		
		if(isset($_SESSION['email']))/*If it is customer's account*/
		{	
			/*Select data from customer's account*/
			$customer_oldpass_sql = "SELECT * FROM customers WHERE Customer_Email = '".$_SESSION['email']."';";
			$customer_oldpass= mysqli_query($con,$customer_oldpass_sql);

			if(!mysqli_query($con, $customer_oldpass_sql))
			{
				die('Error:'.mysqli_error($con));
			}
		
			$customer = mysqli_fetch_array($customer_oldpass);
			if(!password_verify($oldpassword, $customer['Customer_Password']))/*if oldpassword is wrong*/
			{
				echo "<script>
				alert('Wrong old password, please try again!');
				window.history.go(-1);
				</script>";
			}elseif($password !== $reconfirmpassword)/*if the password and reconfirmpassword are different*/
			{
				echo"<script>
				alert('Password and Reconfirm Password must be same!');
				window.history.go(-1);
				</script>";	
			}else
			{	
				/*everythings is correct*/
				$email = $_SESSION['email'];
				$enc_password = password_hash($password, PASSWORD_DEFAULT);			
				$cp2_sql="UPDATE customers SET Customer_Password = '$enc_password' WHERE Customer_Email = '$email';";
			
				if(!mysqli_query($con, $cp2_sql))
				{
					die('Error:'.mysqli_error($con));
				}
					echo"<script>alert('Changed Password Successfully!');</script>";
					echo"<script>window.location.href='Home.php';</script>";	
				}
		
		}elseif(isset($_SESSION['adminemail']))/*If it is admin's account*/
		{	
			/*Select data from admin's account*/
			$admin_oldpass_sql = "SELECT * FROM admin WHERE Admin_Email = '".$_SESSION['adminemail']."';";
			$admin_oldpass= mysqli_query($con,$admin_oldpass_sql);
	
			if(!mysqli_query($con, $admin_oldpass_sql))
			{
				die('Error:'.mysqli_error($con));
			}
			
			$admin = mysqli_fetch_array($admin_oldpass);
			if(!password_verify($oldpassword, $admin['Admin_Password']))/*if oldpassword is wrong*/
			{
				echo "<script>
				alert('Wrong old password, please try again!');
				window.history.go(-1);
				</script>";
			}elseif($password !== $reconfirmpassword)
			{
				echo"<script>
				alert('Password and Reconfirm Password must be same!');/*if the password and reconfirmpassword are different*/
				window.history.go(-1);
				</script>";	
			}else
			{	
				/*everythings is correct*/
				$email = $_SESSION['adminemail'];
				$enc_password = password_hash($password, PASSWORD_DEFAULT);			
				$cp2_sql="UPDATE admin SET Admin_Password = '$enc_password' WHERE Admin_Email = '$email';";
			
				if(!mysqli_query($con, $cp2_sql))
				{
					die('Error:'.mysqli_error($con));
				}
			
					echo"<script>alert('Changed Password Successfully!');</script>";
					echo"<script>window.location.href='Home.php';</script>";
					
				}
		}
		
		
	}
	
	mysqli_close($con);
?>