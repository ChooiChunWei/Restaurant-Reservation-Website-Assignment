<?php session_start();?>

<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="main.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<link href='https://fonts.googleapis.com/css?family=Fredoka One' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Averia Serif Libre' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Atma' rel='stylesheet'>

<style>
h1{
	text-align:center;
	font-family: 'Fredoka One';
}

h3,h5{
	font-family: 'Averia Serif Libre';
	font-size:22px;
}

h3{
	text-decoration:underline;
}

p{
	font-family: 'Atma';
	font-size:20px;
}
</style>
<title>About Us</title>
</head>

<body>
<?php include('Navbar.php')?>



<!-- About Modal -->
<div id="about" class="modal">
  <div class="modal-content " style="height:1360px">
  	<div class="titlecontainer">
      <span onclick="Home()" class="Navbutton exit">&times;</span>
      <h1><i class="far fa-question-circle MIcon"></i>About Us</h1>
    </div>
    
    <div class="intro">
      <img src="../Images/bg5.jpg" alt="Restaurant Photo" style="height:340px;width:910px;padding-top:30px">
      <h3>Introduction </h3>
      <p>The Chill Chill Steakhouse was founded in 2010 by Mr. Chooi Chun Wei.
       Mr. Chooi named this steakhouse as "Chill Chill" because he want everyone feeling chill after having a chill meal here.
       We try our best to serve delicious food that are affordable to everyone including students.
       We also have a nice and comfort dining environment to release the stress of the customers.
       <br /><br />We open from 1200 to 2400 every day and we are closed on every Tuesday.
      </p><br />   
    </div>
  
  	<div class="titlecontainer" style="border-radius:0px">
      <h1>Our Principles</h1>
    </div>
    <div class="center">
	    <div class="quarter">
	    <img class="img" src="../Images/healthy.png" alt="Healthy Icon">
	      <h5>Healthy</h5>
	      <p>We serve healthy food which the ingredients like vegetables are organic and no chemicals used.</p>
	    </div>
		<div class="quarter">
		<img class="img"src="../Images/fresh.jpg" alt="Fresh Icon">
      <h5>Fresh</h5>
      <p>We serve fresh food which the ingredients are freshly delivered to our shop every morning.</p>
    </div>
    	<div class="quarter">
    	<img class="img" src="../Images/delicious.png" alt="Delicious Icon">
      <h5>Delicious</h5>
      <p>We serve delicious and nice food that will impress you and brighten up your day.</p>
    </div>
    <div class="quarter">
    <img class="img"src="../Images/cheap.png" alt="Cheap Icon">
      <h5>Cheap</h5>
      <p>The prices of the food are reasonable and affordable to ensure everyone have the chance to enjoy it.</p>
    </div>
    
	</div>
      
  </div> 
</div>



<?php include('Background.php')?>



<script>
/*Automatic oepn the About Modal*/
document.getElementById('about').style.display='block';

function Home() {
    location.href = "Home.php";
}

</script>

</body>

</html>
