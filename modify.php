<!DOCTYPE html>
<html>
	<body>	
<?php

require('db.php');
		if(isset($_GET['submit']))
		{
$password = $_GET['password'];
$id = $_GET['id'];

$sql = "UPDATE users SET password='$password' WHERE id='$id'";
		}
		
		?>
		
		
		<?php if( isset($result) ) echo "modified"; //print the result above the form ?>




		<form name="modify" action="modify.php" method="post">
			<h4>Enter Modification details</h4>
			<input type="number" name="id" placeholder="Enter id" required>
			<br/>
			<input type="password" name="password" placeholder="Enter Password" required />
			<br/>
			<input type="submit" name="submit" value="Modify" />
		</form>
		
	</body>
	</html>
