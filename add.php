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

$xmlObject = $xmlDoc->getElementsByTagName('item');
$itemCount = $xmlObject->length;
echo $itemCount;

for ($i=0; $i < $itemCount; $i++){
  $authorID = $xmlObject->item($i)->getElementsByTagName('authorID')->item(0)->childNodes->item(0)->nodeValue;
  $name  = $xmlObject->item($i)->getElementsByTagName('name')->item(0)->childNodes->item(0)->nodeValue;
  $gender  = $xmlObject->item($i)->getElementsByTagName('gender')->item(0)->childNodes->item(0)->nodeValue;
  $sql   = "INSERT INTO authors (authorID, name, gender) VALUES ('$authorID', '$name', '$gender');";
  
    if (mysqli_query($con, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}



    mysqli_close($con);

?>