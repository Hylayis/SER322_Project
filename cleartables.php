<?php
//initial setup 
$xmlDoc = new DOMDocument();
$xmlDoc->load("authors.xml");

$con = mysqli_connect("localhost","bhweb","supersecure","bookharmony");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

/*
mysqli_select_db($mysql_database, $bd) 
    or die("Oops some thing went wrong");
*/

mysqli_query($con, "TRUNCATE TABLE authors");
echo "Authors successfully cleared ";
mysqli_query($con, "TRUNCATE TABLE books");
echo "Books successfully cleared ";
mysqli_query($con, "TRUNCATE TABLE booksread");
echo "BooksRead successfully cleare d";
mysqli_query($con, "TRUNCATE TABLE users");
echo "Users successfully cleared ";
mysqli_close($con);

?>