<?php include('register.php')?>

<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="main.css">
<link href='https://fonts.googleapis.com/css?family=Fredoka One' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Averia Serif Libre' rel='stylesheet'>

<style>
h1{
	text-align:center;
	font-family: 'Fredoka One';
}

b{
	font-family:'Averia Serif Libre';
}

</style>
<title>Sign Up</title>
</head>

<body>
<?php include('Navbar.php')?>



<!--Sign Up Modal-->
<div id="signup" class="modal">
  <div class="modal-content" style="height:1350px">
  	<div class="titlecontainer">
      <span onclick="Home()" class="Navbutton exit">&times;</span>
      <h1><img src="../Images/signup.png" class="MIcon" alt="Sign Up Icon">Sign Up</h1>
    </div>
    
    <div>
	    <form method="post" class="SU">
		    <b>Name:</b><br />
		      	<input type="text" placeholder=" Name" name="name" pattern="[A-Za-z\s]{0,50}" title="Alphabet Only & Maximum 50 alphabets." autofocus required class="SUinput"><br /><br />
		      
		    <b>Gender:</b><br />
			    <label style="font-size:20px;font-family:'Averia Serif Libre';">
			      <input type="radio" name="gender" value="Male" checked> Male
			  	  <input type="radio" name="gender" value="Female"> Female
			    </label><br /><br />
		   
		    <b>Email:</b><br />
		      	<input type="email" placeholder=" Email" name="email" required class="SUinput"><br /><br />
		      	
		    <b>Password:</b><br />
		      	<input type="password" placeholder=" Password" name="password" pattern=".{6,}" title="Minimum 6 characters" required class="SUinput"><br /><br />
		
		    <b>Reconfirm Password:</b><br />
		      	<input type="password" placeholder=" Reconfirm Password" name="re-password" required class="SUinput"><br /><br />
		      
		    <b>Date of Birth:</b><br />
		      	<input type="date" placeholder=" Date of Birth" name="dob" required class="SUinput"><br /><br />
		
		    <b>Phone Number:</b><br />
		      	<input type="tel" pattern="[0-9]{10,11}" title="Number only & at least 10-11 digits." placeholder=" Phone Number" name="pnumber" required class="SUinput"><br />
		
		    <label style="font-size:20px;font-family:'Averia Serif Libre';">
		        <input type="checkbox" checked="checked" name="terms" required>I understand and accept the <a onclick="document.getElementById('T&C').style.display='block'" style="color:dodgerblue;text-decoration:underline">Terms & Conditions</a>.
		    </label><br /><br />
		
		
		<div>
	    	<div class="SUcontainer">
				<input type="submit" value="Sign Up" name="signup" class="Signupbutton">
			</div>
			<div class="SUcontainer">
				<button onclick="window.location.href='loginpage.php';" class="Cancelbutton">Cancel</button>
			</div>
		</div>
		</form>
    </div>          
  </div>
</div>

<!--Terms & Condition Modal-->
<div id="T&C" class="modal">
  <div class="modal-content">
  	<div class="titlecontainer">
      <span onclick="document.getElementById('T&C').style.display='none'" class="Navbutton exit">&times;</span>
      <h1><img src="../Images/signup.png" class="MIcon" alt="Sign Up Icon">Terms & Conditions</h1>
    </div>
    	
    <div style="font-size:20px;padding:20px 80px;margin-bottom:50px;">
    	<b>Last updated: 2018/10/25</b>
    	<p>Please read these Terms and Conditions carefully before using this website operated by ChillChill Steakhouse. </p>
    	<p>Your access to and use of the Service is conditioned on your acceptance of and compliance with these Terms. These Terms apply to all visitors, users and others who access or use the Service.</p>
		<b>By accessing or using the Service you agree to be bound by these Terms. If you disagree with any part of the terms then you may not access the Service.</b><br />
		
		<p>The use of this website is subject to the following terms of use:</p>
		<p>1. The content of the pages of this website is for your general information and use only. It is subject to change without notice.</p>
		<p>2. This website uses cookies to monitor browsing preferences. If you do allow cookies to be used, the personal information may be stored by us.</p>
		<p>3. Your use of any information or materials on this website is entirely at your own risk, for which we shall not be liable. It shall be your own responsibility to ensure that any products, services or information available through this website meet your specific requirements.</p>
		<p>4. This website contains material which is owned by or licensed to us. This material includes, but is not limited to, the design, layout, look, appearance and graphics. Reproduction is prohibited other than in accordance with the copyright notice, which forms part of these terms and conditions.</p>
		<p>5. Unauthorised use of this website may give rise to a claim for damages and/or be a criminal offence.</p>
		<p>6. Your use of this website and any dispute arising out of such use of the website is subject to the laws of Malaysia.</p><br />
		
		<button onclick="document.getElementById('T&C').style.display='none'" class="OKbutton">OK</button>
    </div>
    
   </div>
</div>




<?php include('Background.php')?>



<script>
/*Automatic oepn the Sign Up Modal*/
document.getElementById('signup').style.display='block';

function Home() {
    location.href = "Home.php";
}

</script>

</body>

</html>
