<?php
	 require 'bhconnect.php';
	 $query = "SELECT userID, userName FROM Users";
	 
	 $response = @mysqli_query($dbc, $query);
	 
	 if($response){
	 	echo "<html>	<title>Book Harmony</title>	<h1>Book Harmony</h1><br>	<body>	<form action=\"search.php\" method=\"post\"> <h2>Search</h2>
	Search for a book title or Author:	<input type=\"text\" id=\"keyword\">	<input type=\"submit\" id=\"search\" value=\"search\">	<br></form>
	<form>	<h3>Find Similar Users</h3>	Select a user: <br>	<select id=\"findusers\">";
	 	while($row = mysqli_fetch_array($response)){
	 		echo "<option value=\"".$row['userID']."\">".$row['userName']."</option>";
	 	}
	 };
?>