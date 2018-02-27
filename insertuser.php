<?php
	require 'bhconnect.php';
	
	$userID = random_int(500,100000); //This is terrible and unacceptable but it works.
	
	$query = "INSERT into Users(userID, userName, DOB, Gender, email)
			  VALUES(".$userID.", 
			  '".$_POST['username']."', 
			  '".$_POST['DOB']."',
			  '".$_POST['gender']."',
			  '".$_POST['email']."')";
	
	$response = @mysqli_query($dbc, $query);
	
	if($response){
		echo '<html>
			    <body>
			        <form action="index.php" method="get">
			        <p>User added successfully</p><br>
			        <input type="submit" value="Return to main page">
			        </form>
			    </body>
			</html>';
		echo $query;
	}
	else {
		echo $query;
		echo "   Failed to add user.";
	}
?>