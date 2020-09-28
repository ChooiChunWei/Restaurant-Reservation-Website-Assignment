<?php session_start();?>
<?php include('Updateprofile.php')?>

<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<link href='https://fonts.googleapis.com/css?family=Annie Use Your Telescope' rel='stylesheet'>
<link rel="stylesheet" href="main.css">
<link href='https://fonts.googleapis.com/css?family=Fredoka One' rel='stylesheet'>

<style>
h1{
	text-align:center;
	font-family: 'Fredoka One';
}
</style>
<title>My Profile</title>
</head>

<body>
<?php include('Navbar.php')?>



<!--Profile Page Modal-->
<div id="profile" class="modal">
  <div class="modal-content" style="height:750px;background-color:black;">
  	<div class="titlecontainer">
      <span onclick="Home()" class="Navbutton exit">&times;</span>
      <h1><img src="../Images/myprofile.png" class="MIcon" alt="My Profile Icon">My Profile</h1>
    </div>
    
    <div >
			<form method="post" class="Pro">
			<fieldset style="margin:5px;padding:30px;font-family: 'Annie Use Your Telescope';" class="half">
				<div>
					<?php 
					include("conn.php");
					$customeremail = $_SESSION['email'];
					$sql = "SELECT * FROM customers WHERE Customer_Email='$customeremail';";
					$result= mysqli_query($con,$sql);
					$rows = mysqli_fetch_array($result);
					
					
					if($rows['Customer_Gender'] == 'Female'){
					   $id1 = "Female";
					   $id2 = "Male";
				   	}elseif($rows['Customer_Gender'] == 'Male'){
				      	$id1 = "Male";
					    $id2 = "Female";
				   	}	      
					?>
				
					<b>Name :</b><br />
						<input type="text" placeholder=" Name" name="name" pattern="[A-Za-z\s]{0,50}" autofocus title="Alphabet Only & Maximum 50 alphabets." class="Proinput" required value="<?php echo $rows['Customer_Name']?>"><br /><br />
					
					<b>Gender :</b><br />
						<label style="font-size:20px">
						<?php
						   echo "<input type=\"radio\" name=\"gender\" class=\"Proinput\" value=\"$id1\" checked > $id1";
						   echo "<input type=\"radio\" name=\"gender\" class=\"Proinput\" value=\"$id2\" > $id2";
						?>
						</label><br /><br />
							    
					<b>Email :</b><br />
						<input type="email" placeholder=" Email" name="email" class="Proinput" required value="<?php echo $rows['Customer_Email']?>"><br /><br />
						      	
					 <b>Date of Birth :</b><br />
						<input type="date" placeholder=" Date of Birth" name="dob" class="Proinput" required value="<?php echo $rows['Customer_Dob']?>"><br /><br />
						
					 <b>Phone Number :</b><br />
						<input type="tel" pattern="[0-9]{10,11}" title="Number only & at least 10-11 digits." placeholder=" Phone Number" name="pnumber" class="Proinput" required value="<?php echo $rows['Customer_Phone_Number']?>"><br />
				</div>
			</fieldset>		
	
			<div class="half" style="text-align:center;background-color:#F1F1F1;">
				<input type="submit" value="Update Profile" name="updatep" class="Updatepbutton" style="margin-top:120px">
				<input type="button" onclick="Changep2page()" value="Change Password" name="changep" class="Changepbutton">
				<input type="button" onclick="Bookingrecordspage()" value="Booking Records" name="records" class="recordsbutton">		
			</div>
			</form>  
    </div>
  </div>
</div>



<?php include('Background.php')?>



<script>
/*Automatic open the Booking Info Modal*/
document.getElementById('profile').style.display='block';

function Home() {
    location.href = "Home.php";
}

function Changep2page() {
    location.href = "changep2page.php";
}

function Bookingrecordspage() {
    location.href = "bookingrecordspage.php";
}

</script>

</body>

</html>