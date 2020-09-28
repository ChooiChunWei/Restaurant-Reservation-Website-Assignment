<?php
	session_start();
	include "conn.php"; //connection
	
	if(isset($_POST['fp2']))
	{
	$verifycode= mysqli_real_escape_string($con,$_POST['verifycode']);
	
	/*Checking the verify code */
	$sql = "SELECT * FROM customers WHERE Customer_Password = '$verifycode' and Customer_Email = '".$_SESSION['email']."';";
	$result = mysqli_query($con,$sql);
	
	$sql1 = "SELECT * FROM admin WHERE Admin_Password = '$verifycode' and Admin_Email = '".$_SESSION['email']."';";
	$result1 = mysqli_query($con,$sql1);

		if((mysqli_num_rows($result)<=0)&&(mysqli_num_rows($result1)<=0))/*Wrong verify code*/
		{
			echo "<script>
			alert('Wrong verify code, please try again!');
			window.history.go(-1);
			</script>";
		}elseif((mysqli_num_rows($result)>0)&&(mysqli_num_rows($result1)<=0))/*Customer's verify code is correct*/
		{
			echo"<script>
			alert('Login successful. \\nPlease update your new password!');
			</script>";

			if($row=mysqli_fetch_array($result))
			{
			$_SESSION['user'] = $row['Customer_Name'];//as a marking that the user logged in 
			$_SESSION['id'] = $row['Customer_ID'];
			}
	
			echo"<script>
			window.location.href='changep1page.php';
			</script>";
		}elseif((mysqli_num_rows($result)<=00)&&(mysqli_num_rows($result1)>0))/*admin's verify code is correct*/
		{
			echo"<script>
			alert('Login successful. \\nPlease update your new password!');
			</script>";

			if($row=mysqli_fetch_array($result1))
			{
			$_SESSION['adminemail'] = $row['Admin_Email'];//as a marking that the user logged in 
			}
	
			echo"<script>
			window.location.href='changep1page.php';
			</script>";
		}

		
	mysqli_close($con);
	}

?>