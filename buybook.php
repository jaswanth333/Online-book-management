<?php
include('db.php');
error_reporting(0);
mysqli_select_db($con, 'register'); 
$records= mysqli_query($con, "select bname from books ORDER BY bname ASC");
while ($row = $records->fetch_assoc())

{
  $option .= '<option value = "'.$row['bname'].'">'.$row['bname'].'</option>';
  
}


if($_POST['select'])
{
    $result=$_GET['book'];
    
    $ins=mysqli_query($con,"insert into cart2(bname,price) values ('$bname','$price') select bname,price from books where bname='$result'");
    
}

?>

<!DOCTYPE html>
<head>
</head>
<html>
<style>
 body
 {
	 background-color:powderblue;
	
 }
 
 p
 {
	  text-align:center;
 }
 </style>
<body>
<h1 align="center">Buy Book</h1>

<form method="POST" action=" " align="center">
<select name="book">
<option value="select">Select</option>
<option value = "<?php echo $option?>"></option>
<input type="submit" name="select" value="Add to cart"/>
<br/>
<br/>
<br/>
<a href="index.php">Home</a>
<a href="book.php">Books</a>
</select>
</form>
</body>
</html>
