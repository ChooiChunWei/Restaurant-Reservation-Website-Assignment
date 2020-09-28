<?php session_start();?>
<?php include('contactform.php')?>

<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="main.css">
<link href='https://fonts.googleapis.com/css?family=Fredoka One' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Averia Serif Libre' rel='stylesheet'>

<style>
a{
	color:red;
	text-decoration:none;
}

iframe{
	border:0;
	height:526px;
	margin-bottom:30px;
	width:470px;
}

h1{
	text-align:center;
	font-family: 'Fredoka One';
}

input{
	font-family:'Averia Serif Libre';
}
</style>
<title>Contact Us</title>
</head>

<body>
<?php include('Navbar.php')?>



<!--Contact Modal -->
<div id="contact" class="modal">
  <div class="modal-content" style="height:730px;">
  	<div class="titlecontainer">
      <span onclick="Home()" class="Navbutton exit">&times;</span>
      <h1><img src="../Images/contact.png" class="MIcon" alt="Contact Icon">Contact Us</h1>
    </div>
    
     <div>
      <h5 style="text-align: center;font-size:20px;font-family:'Averia Serif Libre';">For any enquiries, please contact us through any of the following methods: </h5><br />  
     	<div class="half" style="height:520px;">
       
	      <h5 style="font-size:20px"><img src="../Images/GPS.png" alt="GPS Icon" class="icon" style="width:auto;margin-left:90px;margin-right:35px"><a href="https://www.google.com/maps/place/315,+Jalan+13,+Salak+South+Baru,+57100+Kuala+Lumpur,+Wilayah+Persekutuan+Kuala+Lumpur/@3.0856598,101.7111685,17z/data=!4m13!1m7!3m6!1s0x31cc35893d46be67:0xd6eb29aaf54569da!2s315,+Jalan+13,+Salak+South+Baru,+57100+Kuala+Lumpur,+Wilayah+Persekutuan+Kuala+Lumpur!3b1!8m2!3d3.085701!4d101.7111!3m4!1s0x31cc35893d46be67:0xd6eb29aaf54569da!8m2!3d3.085701!4d101.7111" target="_blank">315, Jalan 13, Salak Selatan Baru</a></h5>
	      <h5 style="font-size:20px"><img src="../Images/Phone.png" alt="Phone Icon" class="icon"><a href="tel:+60379821515 " target="_blank">+03 79821515</a></h5>
	      <h5 style="font-size:20px"><img src="../Images/Email.png" alt="Email Icon" class="icon"><a href="mailto:chillchillsteakhouse@gmail.com" target="_blank">chillchillsteakhouse@gmail.com</a></h5>
	      
            
      <form style="margin-left:25px;margin-right:25px;text-align:center;margin-bottom:20px;font-family:'Averia Serif Libre';" method="post">
      <fieldset>
      	<legend>Drop us a message:</legend>
      	<table>
      		<tr>
      			<td>Name: <br /><br /></td>
      			<td><input type="text" placeholder="Name" pattern="[A-Za-z\s]{0,30}" autofocus name="Name" title="Alphabet Only & Maximum 30 alphabets." required style="width:340px"><br /><br /></td>
      		</tr>
      		<tr>
      			<td>Email: <br /><br /></td>
      			<td><input type="email" placeholder="Email" required name="Email" style="width:340px"><br /><br /></td>
      		</tr>
      		<tr>
      			<td>Subject: <br /><br /></td>
      			<td><input type="text" placeholder="Subject" name="Subject" style="width:340px"><br /><br /></td>
      		</tr>
      		<tr>
      			<td>Message: <br /><br /><br /></td>
      			<td><textarea placeholder="Write your message here..." required name="Message" rows="3" cols="45"></textarea></td>
      		</tr>
      	</table>
      		<input type="submit" value="Send" name="contactus" style="cursor: pointer;">       
        </fieldset>
      </form><br />
       </div>
    <div class="half" style="height:520px;">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.033778432227!2d101.7111685033511!3d3.085659789426029!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc35893d46be67%3A0xd6eb29aaf54569da!2s315%2C+Jalan+13%2C+Salak+South+Baru%2C+57100+Kuala+Lumpur%2C+Wilayah+Persekutuan+Kuala+Lumpur!5e0!3m2!1sen!2smy!4v1538183212325">
    </iframe>
    </div>   
  </div>
 </div>
</div>



<?php include('Background.php')?>



<script>
/*Automatic oepn the Contact Modal*/
document.getElementById('contact').style.display='block';

function Home() {
    location.href = "Home.php";
}

</script>

</body>

</html>
