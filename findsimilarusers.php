<html>
<head>
  <title>Book Harmony - Find Similar Users</title>
</head>
<body>
<h1>Book Harmony - Find Similar Users</h1>
<?php
  // create short variable names - needs updated with input names from HTML

  //$searchtype=$_POST['similarusers'];
  $searchterm=trim($_POST['similarusers']);

    /*
  if (!$searchtype || !$searchterm) {
     echo 'You have not entered search details.  Please go back and try again.';
     exit;
  */

  if (!get_magic_quotes_gpc()){
    //$searchtype = addslashes($searchtype);
    $searchterm = addslashes($searchterm);
  }

  @ $db = new mysqli('localhost', 'bhweb', 'supersecure', 'bookharmony');

  if (mysqli_connect_errno()) {
     echo 'Error: Could not connect to database.  Please try again later.';
     exit;
  }

      //needs updated for SQL language to sort
      /*
      *This select currently pulls all of the matching. Needs updated to show information of the users it matches with. Also needs updated in the $query field to reflect once finalized
      SELECT distinct u.userName, u.DoB, u.email, u.gender, count(*) as numMatches
        FROM BooksRead T1, BooksRead T2, Users u
        WHERE T2.userID = u.userID
        AND T1.ISBN = T2.ISBN 
        AND T1.userID < T2.userID 
        AND T1.userID = 1 
        AND T1.rating = T2.rating
        GROUP BY userName
        */
            

  $query = "SELECT distinct u.userName, u.DoB, u.email, u.gender, count(*) as numMatches
  FROM BooksRead T1, BooksRead T2, Users u
  WHERE T2.userID = u.userID
        AND T1.ISBN = T2.ISBN 
        AND T1.userID < T2.userID 
        AND T1.userID =".$searchterm."
        AND T1.rating = T2.rating
        GROUP BY userName";
  $result = $db->query($query);

  $num_results = $result->num_rows;

      /*
  if ($num_results>0){
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
  } */

  echo "<p>Number of Users found: ".$num_results."</p>";

      //needs updated to proper table for Users 
  for ($i=0; $i <$num_results; $i++) {
     $row = $result->fetch_assoc();
     echo "<p><strong>".($i+1).". User Name: ";
     echo htmlspecialchars(stripslashes($row['username']));
     echo "</strong><br />Date of Birth: ";
     echo stripslashes($row['DoB']);
     echo "<br />Email: ";
     echo stripslashes($row['email']);
     echo "<br />Gender: ";
     echo stripslashes($row['gender']);
     echo "<br />Number of Books Matched: ";
     echo stripslashes($row['numMatches']);
     echo "</p>";
  }

  $result->free();
  $db->close();

?>
</body>
</html>