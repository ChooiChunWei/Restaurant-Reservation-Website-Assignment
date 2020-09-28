<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<link rel="stylesheet" href="main.css">
<link href='https://fonts.googleapis.com/css?family=Alex Brush' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Anton' rel='stylesheet'>

<style>
/* Hide the images by default */
.mySlides {
    display: none;
}
</style>

</head>

<body>
<!--Background images-->
<div class="container">
  <div>
  	<img class="element mySlides" src="../Images/bg3.png" alt="Background Image">
  	<img class="element mySlides" src="../Images/bg2.jpg" alt="Background Image">
  	<img class="element mySlides" src="../Images/bg4.jpg" alt="Background Image">
  	<img class="element mySlides" src="../Images/bg5.jpg" alt="Background Image">
  </div>
</div>



<!--Logo,text,button in middle-->
<div class="middle">
	<img class="middle" src="../Images/logo3.png" style="border-radius: 50%;">
	<p class="middletext">Chill&nbsp;Chill Steakhouse</p>
	<?php 
	 if(isset($_SESSION['adminemail']))
	 {
	 	echo "<p><a href=\"adminpage.php\" class=\"middlebutton Rbutton\">Admin Page</a></p>";
	 }else
	 {
	 	echo "<p><a href=\"Reservepage.php\" class=\"middlebutton Rbutton\">Reserve Now</a></p>";
	 }
	 ?>
</div>


<script>
/*Auto slideshow background*/
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none"; 
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1} 
    slides[slideIndex-1].style.display = "block"; 
    setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>

</body>

</html>
