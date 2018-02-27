<?php
//initial setup 
$xmlDoc = new DOMDocument();
$con = mysqli_connect("localhost","bhweb","supersecure","bookharmony");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  echo '<html>
			    <body>
			        <form action="index.php" method="get">
			        <p>User added successfully</p><br>
			        <input type="submit" value="Return to main page">
			        </form>
			    </body>
			</html>';
  echo $query;
/*
This next section adds AUTHORS to the database
*/
$xmlDoc->load("authors.xml");
//Reads XML file
$xmlObject = $xmlDoc->getElementsByTagName('item');
$itemCount = $xmlObject->length;
echo $itemCount;
//iterates through, adding each element to mysql table
for ($i=0; $i < $itemCount; $i++){
  $authorID = $xmlObject->item($i)->getElementsByTagName('authorID')->item(0)->childNodes->item(0)->nodeValue;
  $name  = $xmlObject->item($i)->getElementsByTagName('name')->item(0)->childNodes->item(0)->nodeValue;
  $gender  = $xmlObject->item($i)->getElementsByTagName('gender')->item(0)->childNodes->item(0)->nodeValue;
  $sql   = "INSERT INTO authors (authorID, name, gender) VALUES ('$authorID', '$name', '$gender');";
  
    if (mysqli_query($con, $sql)) {
        echo "New record created successfully".$authorID."<br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

}

/*
This next section adds BOOKS to the database
*/
$xmlDocBooks = new DOMDocument();
$xmlDocBooks->load("books.xml");
//Reads XML file
$xmlObject = $xmlDocBooks->getElementsByTagName('item');
$itemCount = $xmlObject->length;
echo $itemCount;
//iterates through, adding each element to mysql table
for ($i=0; $i < $itemCount; $i++){
  $ISBN = $xmlObject->item($i)->getElementsByTagName('ISBN')->item(0)->childNodes->item(0)->nodeValue;
  $title  = $xmlObject->item($i)->getElementsByTagName('title')->item(0)->childNodes->item(0)->nodeValue;
  $author  = $xmlObject->item($i)->getElementsByTagName('author')->item(0)->childNodes->item(0)->nodeValue;
  $pages  = $xmlObject->item($i)->getElementsByTagName('pages')->item(0)->childNodes->item(0)->nodeValue;
  $type  = $xmlObject->item($i)->getElementsByTagName('type')->item(0)->childNodes->item(0)->nodeValue;
  $genre  = $xmlObject->item($i)->getElementsByTagName('genre')->item(0)->childNodes->item(0)->nodeValue;
  $sql   = "INSERT INTO books (ISBN, title, author, pages, type, genre) VALUES ('$ISBN', '$title', '$author',  '$pages', '$type' ,'$genre');";
  
    if (mysqli_query($con, $sql)) {
        echo "New record created successfully:".$ISBN."<br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}

/*
This next section adds USERS to the database
*/
$xmlDocUsers = new DOMDocument();
$xmlDocUsers->load("users.xml");
//Reads XML file
$xmlObject = $xmlDocUsers->getElementsByTagName('item');
$itemCount = $xmlObject->length;
echo $itemCount;
//iterates through, adding each element to mysql table
for ($i=0; $i < $itemCount; $i++){

  $userID = $xmlObject->item($i)->getElementsByTagName('userID')->item(0)->childNodes->item(0)->nodeValue;
  $userName  = $xmlObject->item($i)->getElementsByTagName('userName')->item(0)->childNodes->item(0)->nodeValue;
  $DOB  = $xmlObject->item($i)->getElementsByTagName('DOB')->item(0)->childNodes->item(0)->nodeValue;
  $gender  = $xmlObject->item($i)->getElementsByTagName('gender')->item(0)->childNodes->item(0)->nodeValue;
  $email  = $xmlObject->item($i)->getElementsByTagName('email')->item(0)->childNodes->item(0)->nodeValue;
    
  $sql   = "INSERT INTO users (userID, userName, DOB, gender, email) VALUES ('$userID', '$userName', '$DOB',  '$gender', '$email');";
  
    if (mysqli_query($con, $sql)) {
        echo "New record created successfully:".$userID."<br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}


/*
This next section adds BooksRead to the database
*/
$xmlDocRead = new DOMDocument();
$xmlDocRead->load("booksread.xml");
//Reads XML file
$xmlObject = $xmlDocRead->getElementsByTagName('item');
$itemCount = $xmlObject->length;
echo $itemCount;
//iterates through, adding each element to mysql table
for ($i=0; $i < $itemCount; $i++){
  $userID = $xmlObject->item($i)->getElementsByTagName('userID')->item(0)->childNodes->item(0)->nodeValue;
  $ISBN  = $xmlObject->item($i)->getElementsByTagName('ISBN')->item(0)->childNodes->item(0)->nodeValue;
  $startDate  = $xmlObject->item($i)->getElementsByTagName('startDate')->item(0)->childNodes->item(0)->nodeValue;
  $finishDate  = $xmlObject->item($i)->getElementsByTagName('finishDate')->item(0)->childNodes->item(0)->nodeValue;
  $rating  = $xmlObject->item($i)->getElementsByTagName('rating')->item(0)->childNodes->item(0)->nodeValue;
    
  $sql   = "INSERT INTO booksread (userID, ISBN, startDate, finishDate, rating) VALUES ('$userID', '$ISBN', '$startDate',  '$finishDate', '$rating');";
  
    if (mysqli_query($con, $sql)) {
        echo "New record created successfully:".$userID."<br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}




//Closes Connection
    mysqli_close($con);

?>