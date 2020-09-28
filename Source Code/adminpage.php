<?php session_start();?>
<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<link rel="stylesheet" href="main.css">
<link href='https://fonts.googleapis.com/css?family=Fredoka One' rel='stylesheet'>

<style>
h1{
	text-align:center;
	font-family: 'Fredoka One';
}
</style>
<title>Admin Page</title>
</head>

<body>
<?php include('Navbar.php')?>



<!--Admin Page Modal-->
<div id="admin" class="modal">
  <div class="modal-content" style="width:500px;">
  	<div class="titlecontainer" >
      <span onclick="Home()" class="Navbutton exit" >&times;</span>
      <h1><img src="../Images/admin.png" class="MIcon" alt="Admin Icon">Admin Page</h1>
    </div>
    
    <div style="text-align:center;">
    <input type="button" onclick="Customersinfopage()" value="Customers Info" name="customersinfo" class="Updatepbutton">
    <input type="button" onclick="Changep2page()" value="Change Password" name="changep" class="Changepbutton">
    <input type="button" onclick="Bookingrecordspage()" value="Booking Records" name="bookingrecords" class="recordsbutton">	
    </div>
       
  </div>
</div>



<?php include('Background.php')?>



<script>
/*Automatic open the Booking Info Modal*/
document.getElementById('admin').style.display='block';

function Home() {
    location.href = "Home.php";
}

function Changep2page() {
    location.href = "changep2page.php";
}

function Bookingrecordspage() {
    location.href = "adminbooking.php";
}

function Customersinfopage() {
    location.href = "admincustomerinfo.php";
}


</script>

</body>

</html>