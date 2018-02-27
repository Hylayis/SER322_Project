<html>
    <head>
        <title>Delete</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>
        <?php
        require 'bhconnect.php';
        $query = "DELETE FROM Users WHERE userID = '". $_POST['removeusers'] . "'";
        
        $response = @mysqli_query($dbc, $query);
        
        if($response){
        	echo '<html>
			    <body>
			        <form action="index.php" method="get">
			        <p>User removed successfully</p><br>
			        <input type="submit" value="Return to main page">
			        </form>
			    </body>
			</html>';
        	echo $query;
		}
        ?>
    </body>
</html>
