<?php
	if(isset($_POST['contactus']))
	{	
	$name = $_POST['Name'];
	$email = $_POST['Email'];
	$subject = $_POST['Subject'];
	$message = $_POST['Message'];
	
	$email_body = "You have received a new message from the user, $name. \n".
					"Email: $email\n".
					"Here is the message:\n $message";
					
	$to = "chillchillsteakhouse@gmail.com";
	
	mail($to,$subject,$email_body);
	
	echo "<script>alert('Submit Successful!');</script>";
	echo "<script>window.location.href='Home.php';</script>";
	}
?>
