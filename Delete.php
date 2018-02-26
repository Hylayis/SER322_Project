<html>
    <head>
        <title>Delete</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>
        <?php
            
            mysql_connect("localhost", "bhweb", "supersecure") or die("Error connecting to database: ".mysql_error());
            /*
                "bhweb" -> username
                "supersecure" -> password
                
                on connection fail: error
            */
            mysql_select_db("bookharmony") or die(mysql_error());
            
            $query = $_GET['query'];
            
            $sql = "DELETE FROM Books WHERE id=$query";
            
            if ($sql === TRUE) {
                echo "Book deleted successfully";
            } else {
                echo "Error deleting Book: " . $sql->error; }
        ?>
    </body>
</html>
