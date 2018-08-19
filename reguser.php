
<?php
include("db.php");
mysqli_select_db($con, 'register'); 
$records= mysqli_query($con, "select * from users");
?>

<!DOCTYPE html>
<head>
<title>Admin Panel</title>
</head>
<html>
<body style="background-color:powderblue;">
<h1><center>Registered Users DB</center></h1>
<div class="viewbook" align="center">
<table width="600" border="1" cellpadding="1" cellspacing="1">
<tr>
<th>Id</th>
<th>Username</th>
<th>Email</th>

</tr>

<?php

	while ($row = $records->fetch_assoc()) 
	{
echo "<tr>";
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['username'] . "</td>";
echo "<td>" . $row['email'] . "</td>";

echo "</tr>";

	}
?>

</table>

<a href="index.php" align="center">Home</a>
<a href="book.php" align="center">Books</a>

</div>
</body>
</html>
