
<?php
//include auth.php file on all secure pages
include("auth.php");
?>

<!DOCTYPE html>
<html>
<head>
<style>

body{
	background-image: url('images/book.jpg');
	
}

h1
{
	background-color: #FFEFD5;
	opacity:0.8;
	color:#FF4500;
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #FFEFD5;
	opacity:0.8;
}

li {
    float: left;
}

li a {
    display: block;
    color: #000080;
    text-align: center;
    padding: 16px;
    text-decoration: none;
}
 
li a:hover {
    background-color: #111111;
}
</style>
</head>

<div class="form">
<h1><center>OnlineBookStore</center><h1>
<p>Welcome <?php echo $_SESSION['username']; ?></p>
<ul>
  <li><a href="index.php">Home</a></li>
  <li><a href="book.php">Book</a></li>
  <li><a href="cart.php">Mycart</a></li>
  <li><a href="reguser.php">Users</a></li>
	<li><a href="logout.php">Logout</a></li>
  <li><a href="login.php">Login</a></li>
  <li><a href="registration.php">Register</a></li>
  <li><a href="About.php">Contact</a></li>
	<li><a href="modify.php">Modify</a></li>
  
</ul>
<div>

</body>
</html>