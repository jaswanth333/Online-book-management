<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Add book</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body style="background-color:powderblue">
<?php

require('db.php');
if (isset($_REQUEST['bookname'])){
        // removes backslashes
	$bookname = stripslashes($_REQUEST['bookname']);
        //escapes special characters in a string
	
	$author = stripslashes($_REQUEST['author']);
	
	$price = stripslashes($_REQUEST['price']);
	
	//$trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `books` (bname, author, price)
VALUES ('$bookname', '$author', '$price')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='addbook'>
<h3>Book added successfully.</h3>
<br/>Click here to <a href='index.php'>Home</a></div>";
        }
    }else{
		
		
?>
<div class="addbook" align="center">
<h1>Add Book</h1>


<form name="book" action="" method="post">
<input type="text" name="bookname" placeholder="bookname" required />
<br>
<input type="text" name="author" placeholder="author" required />
<br>
<input type="number" name="price" placeholder="price" required />
<br>
<input type="submit" name="add" value="add" />
<br><hr>
<a href="index.php" align="center">Home</a>
<a href="book.php" align="center">Books</a>

</form>
</div>
<?php } ?>
</body>
</html>