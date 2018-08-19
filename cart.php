<?php
include('db.php');
mysqli_select_db($con, 'register'); 
$records= mysqli_query($con, "select * from cart2");
?>

<!DOCTYPE html>
<head>
<title>User Panel</title>
</head>
<html>
<body style="background-color:powderblue">
<h1><center>Cart DB</center></h1>
<div class="viewbook" align="center">
<table width="600" border="1" cellpadding="1" cellspacing="1" style="text-align:center">
<tr>

<th>Books</th>
<th>Price</th>

</tr>
<tr>
<td>a</td>
<td>500</td>
<?php

	while ($row = $records->fetch_assoc()) 
	{
echo "<tr>";
echo "<td>" . $row['bname'] . "</td>";
echo "<td>" . $row['price'] . "</td>";

echo "</tr>";

	}
?>

</table>
<br>
<br>
<hr>

<a href="index.php" align="center">Home</a>
<a href="book.php" align="center">Books</a>

</div>
</body>
</html>