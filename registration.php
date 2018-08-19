<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body style="background-image: url('images/login.png');">
<?php
require('db.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['username'])){
        // removes backslashes
	$username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username); 
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($con,$email);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
	//$trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `users` (username, password, email)
VALUES ('$username', '$password', '$email')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }else{
		
		
?>
<div class="form" align="center">
<h1>Registration</h1>

<form name="registration" action="registration.php" method="post">
<input type="text" name="username" placeholder="Username" required />
<br>
<input type="email" name="email" placeholder="Email" required />
<br>
<input type="password" name="password" placeholder="Password" required />
<br>
<input type="submit" name="submit" value="Register" />
<br/>
<br/>
<br/>
<a href="index.php">Home</a>
</form>
</div>
<?php } ?>
</body>
</html>