
<?php
include("db.php");
mysqli_select_db($con, 'register'); 
$records= mysqli_query($con, "select * from books");

?>

<!DOCTYPE html>
<head>
<title>Book Data</title>
</head>
<html>
<body style="background-color:powderblue">
<h1><center>Book Database</center></h1>
<div class="viewbook" align="center">
<table width="600" border="1" cellpadding="1" cellspacing="1">
<tr>
<th>Id</th>
<th>Book Name</th>
<th>Author</th>
<th>Price</th>
</tr>

<?php

	while ($row = $records->fetch_assoc()) 
	{
echo "<tr>";
echo "<td>" . $row['bid'] . "</td>";
echo "<td>" . $row['bname'] . "</td>";
echo "<td>" . $row['author'] . "</td>";
echo "<td>" . $row['price'] . "</td>";
echo "</tr>";

	}
?>

</table>
<a href="index.php" align="center">Home</a>
<a href="book.php" align="center">Books</a>
</div>
</body>
</html>
