<?php
	include "conn.php"; //connection
		
	if(isset($_POST['signup']))
	{
			
		//retrieve data from sign up form
		$name = mysqli_real_escape_string($con,$_POST['name']);
		$gender = mysqli_real_escape_string($con,$_POST['gender']);
		$email = mysqli_real_escape_string($con,$_POST['email']);
		$password = mysqli_real_escape_string($con,$_POST['password']);
		$reconfirmpassword = mysqli_real_escape_string($con,$_POST['re-password']);
		$dob = mysqli_real_escape_string($con,$_POST['dob']);
		$phonenumber = mysqli_real_escape_string($con,$_POST['pnumber']);
	
		//checking whether a customer registered using same email address
		$admin_email_check_query= "SELECT * FROM admin WHERE Admin_Email='$email' LIMIT 1";
		$admin_result=mysqli_query($con,$admin_email_check_query);
		$admin=mysqli_fetch_assoc($admin_result);
		
		$customer_email_check_query= "SELECT * FROM customers WHERE Customer_Email='$email' LIMIT 1";
		$result=mysqli_query($con,$customer_email_check_query);
		$customer=mysqli_fetch_assoc($result);
		
		if($password !== $reconfirmpassword && ($customer['Customer_Email'] === $email || $admin['Admin_Email'] === $email))
		{
			echo"<script>
			alert('Password and Reconfirm Password must be same!\\nA customer already signed up using this email address!');
			window.history.go(-1);
			</script>";	
						
		}elseif(($password !== $reconfirmpassword) && (!($customer['Customer_Email'] === $email) || !($admin['Admin_Email'] === $email)))
		{
			echo"<script>
			alert('Password and Reconfirm Password must be same!');
			window.history.go(-1);
			</script>";	
		
		}elseif(($password == $reconfirmpassword) && (($customer['Customer_Email'] === $email) || ($admin['Admin_Email'] === $email)))
		{		
			echo"<script>
			alert('A customer already signed up using this email address!');
			window.history.go(-1);
			</script>";
				
		}else
		{
			$nowdate = new DateTime();
			$nowdate->modify('-13 year');
			$inputdate = new DateTime($dob);
					
			if ( $nowdate < $inputdate ) {
			  echo "<script>alert('You must be at least 13 years old to use this website.')</script>";
			  echo "<script>window.history.go(-1)</script>";
			}else
			{
			$enc_password = password_hash($password, PASSWORD_DEFAULT);					
			$sql="INSERT INTO customers(Customer_Name,Customer_Phone_Number,Customer_Dob,Customer_Email,Customer_Gender,Customer_Password)VALUES('$name','$phonenumber','$dob','$email','$gender','$enc_password')";
		
			if(!mysqli_query($con, $sql))
			{
				die('Error:'.mysqli_error($con));
			}
		
				echo"<script>alert('Register Successfully!Please login now!');</script>";
				echo"<script>window.location.href='Loginpage.php';</script>";	
			}
		}
	}
	
	mysqli_close($con);
?>