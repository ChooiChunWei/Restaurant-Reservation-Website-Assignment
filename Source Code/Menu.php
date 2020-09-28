<?php session_start();?>

<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="main.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<link href='https://fonts.googleapis.com/css?family=Fredoka One' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Atma' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Averia Serif Libre' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Baloo' rel='stylesheet'>

<style>
h1{
	text-align:center;
	font-family: 'Fredoka One';
}

button{
	font-family:'Anton';
}

b{
	font-family: 'Averia Serif Libre';
}
</style>
<title>Menu</title>
</head>

<body>
<?php include('Navbar.php')?>



<!-- Menu Modal -->
<div id="menu" class="modal">
  <div class="modal-content">
  	<div class="titlecontainer">
      <span onclick="Home()" class="Navbutton exit">&times;</span>
      <h1><i class="fas fa-book MIcon"></i>The Menu</h1>
    </div>

	<div class="menutab">
	  <button class="tablinks" onclick="openMenu(event, 'starters');" id="start">Starters</button>
	  <button class="tablinks" onclick="openMenu(event, 'maincourses')">Main Courses</button>
	  <button class="tablinks" onclick="openMenu(event, 'desserts')">Desserts</button>
	</div>
	<div id="starters" class="tabcontent">
	  <h2><b>Soup of the day</b> <span class="specialtag">Seasonal</span><span class="pricetag">$5.50</span></h2>
	      <p class="caption">Special made soup for today</p>
	      <hr />
	  <h2><b>Bruschetta</b> <span class="pricetag">$8.50</span></h2>
	      <p class="caption">Bread with pesto, tomatoes, onion, garlic</p>
	      <hr />      
	  <h2><b>Garlic bread</b> <span class="pricetag">$9.50</span></h2>
	      <p class="caption">Grilled ciabatta, garlic butter, onions</p>
	      <hr />      
	   <h2><b>Chicken Salad</b> <span class="pricetag">$6.50</span></h2>
	      <p class="caption">Grilled chicken with fresh vegetables</p>
	      <hr />    
	  <h2><b>Tomozzarella</b> <span class="pricetag">$10.50</span></h2>
	      <p class="caption">Tomatoes and mozzarella</p>
	    <br />    
	</div>
	
	<div id="maincourses" class="tabcontent">
	  <h2><b>Lasagna</b> <span class="specialtag">Popular</span><span class="pricetag">$13.50</span></h2>
	      <p class="caption">Special sauce, mozzarella, parmesan, ground beef</p>
	      <hr />
	  <h2><b>Ravioli</b> <span class="pricetag">$13.50</span></h2>
	      <p class="caption">Ravioli filled with cheese</p>
	      <hr />   
	  <h2><b>Spaghetti Classica</b> <span class="pricetag">$11.00</span></h2>
	      <p class="caption">Fresh tomatoes, onions, ground beef</p>
	      <hr />   
	  <h2><b>Seafood Pasta</b> <span class="pricetag">$25.50</span></h2>
	      <p class="caption">Salmon, shrimp, lobster, garlic</p>
	      <hr />
	  <h2><b>Deluxe Burger</b> <span class="pricetag">$5.00</span></h2>
	      <p class="caption">Chicken, shrimp, mozzarella, special sauce</p>
	      <hr />
	  <h2><b>Pineapple'o'clock</b> <span class="pricetag">$16.50</span></h2>
	      <p class="caption">Fresh tomatoes, mozzarella, fresh pineapple, bacon, fresh basil</p>
	      <hr />
	  <h2><b>Meat Town</b> <span class="pricetag">$20.00</span></h2>
	      <p class="caption">Fresh tomatoes, mozzarella, hot pepporoni, hot sausage, beef, chicken</p>
	      <br />
	</div>
	
	<div id="desserts" class="tabcontent">
	  <h2><b>Fruit Salad</b> <span class="specialtag">Popular</span><span class="pricetag">$2.50</span></h2>
	      <p class="caption">Healthy fruit with thousand island</p>
	      <hr />
	  <h2><b>Ice cream</b><span class="pricetag">$2.00</span></h2>
	      <p class="caption">Colourful and different flavour of ice creams</p>
	      <hr />
	  <h2><b>Chocolate Cake</b><span class="pricetag">$4.00</span></h2>
	      <p class="caption">Cake with 3 type of chocolates</p>
	      <hr />
	  <h2><b>Cheesy Wedges</b><span class="pricetag">$5.00</span></h2>
	      <p class="caption">Wedges with mozarrella, parmesan, cheddar</p>
	      <br />
	</div>
  </div> 
</div>



<?php include('Background.php')?>



<script>
/*Menu Tab*/
function openMenu(evt, menuName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(menuName).style.display = "block";
    evt.currentTarget.className += " active";
}
document.getElementById("start").click();/*Select a tab initially*/

/*Automatic oepn the Menu Modal*/
document.getElementById('menu').style.display='block';

function Home() {
    location.href = "Home.php";
}
</script>

</body>

</html>
