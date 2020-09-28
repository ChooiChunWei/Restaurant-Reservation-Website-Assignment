<?php session_start();?>

<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="main.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<link href='https://fonts.googleapis.com/css?family=Fredoka One' rel='stylesheet'>

<style>
h1{
	text-align:center;
	font-family: 'Fredoka One';
}

td,th {
    border: 1px solid #dddddd;
    text-align: center;
    padding:20px 30px;
    font-size:20px;
    border:none; 
}

th{
	border-bottom:medium silver solid;
	border-top:medium silver solid;
	font-family:'Fredoka One';
}

tr:nth-child(even) {
    background-color:#E7E7E7;
}

tr:nth-last-child(1)>td:last-child{
	border-bottom-right-radius:18px;
} 

tr:nth-last-child(1)>td:first-child{
	border-bottom-left-radius:18px;
}

tr:hover{
	border-bottom: thick #666666 ridge;
	border-top: thick #666666 ridge;
	font-family:'Fredoka One';
}

button{
	border-radius: 8px;
	border-color: black;
	background-color: white;
	border: 1.8px #000000 solid;
}

button:hover{
	background-color: #CCCCCC;
}
</style>
<title>Customers Info</title>
</head>

<body>
<?php include('Navbar.php')?>



<!--Booking Records Modal-->
<div id="aci" class="modal">
  <div class="modal-content" style="width:1500px">
  	<div class="titlecontainer">
      <span onclick="Home()" class="Navbutton exit">&times;</span>
      <h1><img src="../Images/bookinginfo.png" class="MIcon" alt="Customer Records Icon">Customers Info</h1>
    </div>
    
    <div style="background-color:#E7E7E7;">
    <form method="post" style="padding:30px">
    		<input type="email" name="Email" placeholder=" Email" style="margin-left:415px"class="Searchinput">
    		<input type="submit" name="Searchbtn" value="Search" class="Searchinput Searchbutton">
    		<input type="submit" value="Reset" onclick="Reset()" class="Searchinput Searchbutton">
    		<input type="submit" value="Print" onclick="printContent('aci')" class="Searchinput Searchbutton">

    </form>
    </div>
    
    <div>
	   <table style="border-collapse: collapse;width:100%;margin-bottom:50px;">
		   <tr>
		   	<th>Customer ID</th>
		   	<th>Name</th>
		   	<th>Gender</th>
		   	<th>Email</th>
		   	<th>Phone Number</th>
		    <th>Date of Birth</th>
		    <th>Delete Account</th>
		    
	  	   </tr>
	  	   <?php
				include("conn.php");
				
				if(isset($_POST['Searchbtn']))
				{
					if(empty($_POST['Email']))/*if the search key is empty*/
					{
						echo "<script>
						alert('Please key in your search first!');
						window.location.href='admincustomerinfo.php';
						</script>";
					}else
					{
							$Email= mysqli_real_escape_string($con,$_POST['Email']);
							$Email_sql = "SELECT * FROM Customers WHERE Customer_Email = '$Email';";
							$result = mysqli_query($con,$Email_sql);
					}
					
				}else
				{	/*Normal condition*/
					$Read_sql="SELECT * FROM Customers ORDER BY Customer_ID ASC;";
					$result= mysqli_query($con,$Read_sql);
				}

				
				if(mysqli_num_rows($result)<=0)
				{
					echo "<script>
					alert('Wrong email or No this customer\'s record.');
					window.location.href='admincustomerinfo.php';
					</script>";
				}
				
				while($rows = mysqli_fetch_array($result))
				{
					echo "<tr>";
					echo "<td>".$rows['Customer_ID']."</td>";
					echo "<td>".$rows['Customer_Name']."</td>";
					echo "<td>".$rows['Customer_Gender']."</td>";
					echo "<td>".$rows['Customer_Email']."</td>";
					echo "<td>".$rows['Customer_Phone_Number']."</td>";
					echo "<td>".$rows['Customer_Dob']."</td>";
					
					echo "<td>";
					echo "<button onclick=\"reconfirm(" . $rows['Customer_ID'] .")\" style=\"height:35px;width:35px;cursor: pointer;\"><i class=\"fas fa-trash-alt\" style=\"font-size:20px\"></i></button>";
					echo "</td>";
					
					echo"</tr>";
					
					
				}
			
			?>

	   </table>	   
	   
    </div>
  </div>
</div>



<?php include('Background.php')?>



<script>
/*Automatic open the Booking Records Modal*/
document.getElementById('aci').style.display='block';

function Home() {
    location.href = "Home.php";
}

function Reset() {
    location.reload(true);
}

function reconfirm( id ){
    if (confirm("Are you sure to delete this account?")) {
        window.location.href='DeleteCustomer?id=' + id ;
    } else {
        location.reload();
    }
}

function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}

</script>

</body>

</html>
