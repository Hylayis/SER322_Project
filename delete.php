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
        
        echo $query . "<br>";
        echo $response;
        ?>
    </body>
</html>
