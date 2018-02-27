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
echo "test";

$xmlObject = $xmlDoc->getElementsByTagName('author');
$itemCount = $xmlObject->length;
echo "test";

for ($i=0; $i < $itemCount; $i++){
  $authorID = $xmlObject->item($i)->getElementsByTagName('authorID')->item(0)->childNodes->item(0)->nodeValue;
  $name  = $xmlObject->item($i)->getElementsByTagName('name')->item(0)->childNodes->item(0)->nodeValue;
  $gender  = $xmlObject->item($i)->getElementsByTagName('gender')->item(0)->childNodes->item(0)->nodeValue;
  $sql   = "INSERT INTO 'authors' (authorID, name, gender) VALUES ('$authorID', '$link', '$gender')";
  mysqli_query($sql);
  echo "Finished Item $authorID n<br/>";
}
echo "test";
?>