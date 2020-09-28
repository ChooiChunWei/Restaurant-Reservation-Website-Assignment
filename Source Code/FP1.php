<?php
	session_start();
	include "conn.php"; //connection
		
	if(isset($_POST['fp1']))
	{
	$email = mysqli_real_escape_string($con,$_POST['email']);
	
	//checking whether the email was signed up 
		$email_check_query= "SELECT * FROM customers WHERE Customer_Email='$email' LIMIT 1";
		$result=mysqli_query($con,$email_check_query);
		$customer=mysqli_fetch_assoc($result);
		
		$email_check_query1= "SELECT * FROM admin WHERE Admin_Email='$email' LIMIT 1";
		$result1=mysqli_query($con,$email_check_query1);
		$admin=mysqli_fetch_assoc($result1);
	
	if(($customer['Customer_Email'] !== $email)&&($admin['Admin_Email'] !== $email))/*If haven't signed up*/
	{
		echo"<script>
		alert('This email address did not signed up yet!');
		window.history.go(-1);
		</script>";
	}elseif(($customer['Customer_Email'] == $email)&&($admin['Admin_Email'] !== $email))/*if the email is customer's email*/	
	{
	$verifycode = (mt_rand(99999,999999));/*Generate verify code*/
	
	/*Update the verify code as the password of the account*/
	$sql="UPDATE customers SET Customer_Password = '$verifycode' WHERE Customer_Email = '$email';";
		
		if(!mysqli_query($con, $sql))
		{
			die('Error:'.mysqli_error($con));
		}

	$to = $email;
	$subject = "Forgot Password";
	
	/*Send the code to the email*/
	$email_body = "This is the code that used to verify your account. \n".
					"Verify Code: $verifycode \n\n".
					"After you logged in, please change your password instantly. \n".
					"Please email chillchillsteakhouse@gmail.com for further assistance.";
						
	mail($to,$subject,$email_body);
	
	$_SESSION['email'] = $email ;//set to autofill the email column in the next form
	
	echo "<script>alert('A verify code was sent to your mailbox, please paste it in the next form.');</script>";
	echo"<script>window.location.href='FP2page.php';</script>";
	}elseif(($customer['Customer_Email'] !== $email)&&($admin['Admin_Email'] == $email))/*if the email is admin's email*/	
	{
	$verifycode = (mt_rand(99999,999999));/*Generate verify code*/
	
	/*Update the verify code as the password of the account*/
	$sql="UPDATE admin SET Admin_Password = '$verifycode' WHERE Admin_Email = '$email';";
		
		if(!mysqli_query($con, $sql))
		{
			die('Error:'.mysqli_error($con));
		}

	$to = $email;
	$subject = "Forgot Password";
	
	/*Send the code to the email*/
	$email_body = "This is the code that used to verify your account. \n".
					"Verify Code: $verifycode \n\n".
					"After you logged in, please change your password instantly. \n".
					"Please email chillchillsteakhouse@gmail.com for further assistance.";
						
	mail($to,$subject,$email_body);
	
	$_SESSION['email'] = $email ;//set to autofill the email column in the next form
	
	echo "<script>alert('A verify code was sent to your mailbox, please paste it in the next form.');</script>";
	echo"<script>window.location.href='FP2page.php';</script>";
	}

	}

?>
