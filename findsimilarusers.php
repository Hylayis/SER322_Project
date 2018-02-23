<html>
<head>
  <title>Book Harmony - Find Similar Users</title>
</head>
<body>
<h1>Book Harmony - Find Similar Users</h1>
<?php
  // create short variable names - needs updated with input names from HTML

  $searchtype=$_POST['searchtype'];
  $searchterm=trim($_POST['searchterm']);

  if (!$searchtype || !$searchterm) {
     echo 'You have not entered search details.  Please go back and try again.';
     exit;
  

  if (!get_magic_quotes_gpc()){
    $searchtype = addslashes($searchtype);
    $searchterm = addslashes($searchterm);
  }

  @ $db = new mysqli('localhost', 'bhweb', 'supersecure', 'bookharmony');

  if (mysqli_connect_errno()) {
     echo 'Error: Could not connect to database.  Please try again later.';
     exit;
  }

      //needs updated for SQL language to sort
  $query = "select * from users where ".$searchtype." like '%".$searchterm."%'";
  $result = $db->query($query);

  $num_results = $result->num_rows;

  echo "<p>Number of Users found: ".$num_results."</p>";

      //needs updated to proper table for Users 
  for ($i=0; $i <$num_results; $i++) {
     $row = $result->fetch_assoc();
     echo "<p><strong>".($i+1).". Title: ";
     echo htmlspecialchars(stripslashes($row['title']));
     echo "</strong><br />Author: ";
     echo stripslashes($row['author']);
     echo "<br />ISBN: ";
     echo stripslashes($row['isbn']);
     echo "<br />Price: ";
     echo stripslashes($row['price']);
     echo "</p>";
  }

  $result->free();
  $db->close();

?>
</body>
</html>