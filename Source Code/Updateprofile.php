<?php
	include "conn.php"; //connection
		
	if(isset($_POST['updatep']))
	{
		//retrieve data from My Profile Page
		$name = mysqli_real_escape_string($con,$_POST['name']);
		$gender = mysqli_real_escape_string($con,$_POST['gender']);
		$email = mysqli_real_escape_string($con,$_POST['email']);
		$dob = mysqli_real_escape_string($con,$_POST['dob']);
		$phonenumber = mysqli_real_escape_string($con,$_POST['pnumber']);
		
		//variables to validate the dob
		$nowdate = new DateTime();
		$nowdate->modify('-13 year');
		$inputdate = new DateTime($dob);
		
		$customeremail = $_SESSION['email'];		
		
		//if the email didn't change and the dob is correct
		if(($_SESSION['email'] == $email)&&($nowdate > $inputdate))
		{		
			$update_sql="UPDATE customers SET Customer_Name = '$name', Customer_Phone_Number = '$phonenumber', Customer_Dob = '$dob', Customer_Gender = '$gender' WHERE Customer_Email = '".$_SESSION['email']."';";
		
			if(!mysqli_query($con, $update_sql))
			{
				die('Error:'.mysqli_error($con));
			}else
			{
				echo"<script>alert('Update Profile Successfully!');</script>";
				echo"<script>window.location.href = 'profilepage.php';</script>";
			}
		}
		//if the email didn't change but the dob is wrong
		elseif(($_SESSION['email'] == $email)&&($nowdate < $inputdate))
		{
			echo"<script>
				alert('You must be at least 13 years old to use this website.');
				window.location.href='profilepage.php';
				</script>";
		}else//if the email changed,then proceed to this code
		{
			//checking whether a customer registered using same email address
			$email_check_query= "SELECT * FROM customers WHERE Customer_Email='$email' LIMIT 1";
			$result=mysqli_query($con,$email_check_query);
			$customer=mysqli_fetch_assoc($result);	
			
			//if the email changed was registered but the dob is correct
			if(($customer['Customer_Email'] == $email)&&($nowdate > $inputdate))
			{		
				echo"<script>
				alert('A customer already signed up using this email address!');
				window.history.go(-1);
				</script>";
			}
			//if the email changed was registered and the dob is wrong
			elseif(($customer['Customer_Email'] == $email)&&($nowdate < $inputdate))
			{
				echo"<script>
				alert('A customer already signed up using this email address!\\nYou must be at least 13 years old to use this website.');
				window.history.go(-1);
				</script>";
			}
			//if the email changed is okay but the dob is wrong
			elseif(($customer['Customer_Email'] !== $email)&&($nowdate < $inputdate))
			{	
				echo"<script>
				alert('You must be at least 13 years old to use this website.');
				window.history.go(-1);
				</script>";
			}else//the email changed and the dob are correct
			{
				$UpdateEmail_sql="UPDATE customers SET Customer_Email = '$email' WHERE Customer_Email = '$customeremail';";
				if(!mysqli_query($con, $UpdateEmail_sql))
				{
					die('Error:'.mysqli_error($con));
				}else
				{
					$_SESSION['email'] = $email;//update the new email to the session
														
					$update_sql="UPDATE customers SET Customer_Name = '$name', Customer_Phone_Number = '$phonenumber', Customer_Dob = '$dob', Customer_Gender = '$gender' WHERE Customer_Email = '".$_SESSION['email']."';";
			
					if(!mysqli_query($con, $update_sql))
					{
						die('Error:'.mysqli_error($con));
					}else
					{
						echo"<script>alert('Update Profile Successfully!');</script>";
						echo"<script>window.location.href = 'profilepage.php';</script>";	
					}
					
				}
			}
		}
	}
	mysqli_close($con);
?>