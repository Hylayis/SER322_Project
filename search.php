<html>
    <head>
        <title>Search</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>
        <?php
            echo "<p>This is the search</>";
        
            mysql_connect("localhost", "root", "") or die("Error connecting to database: ".mysql_error());
            /*
                "root" -> username
                "" -> password
                
                on connection fail: error
             */
            mysql_select_db("<Db name>") or die(mysql_error());
        
            $query = $_GET['query'];
            $min_length = 3; //sets minimum query length
        
            if(strlen($query) >= $min_length) {
                
                $query = htmlspecialchars($query); //html to equivalent
                $query = mysql_real_escape_string($query); //prevents SQL injections
                
                $raw_results = mysql_query("SELECT * FROM books
                    WHERE (`title` LIKE '%".$query."%') OR (`author` LIKE '%".$query."%')") or die(mysql_error());
                
                if(mysql_num_rows($raw_results) > 0) {
                    // populates array
                    while($results = mysql_fetch_array($raw_results)) {
                        
            	        echo "<p><h3>".$results['title']."</h3>".$results['author']."</p>";
                    }
                    
                }else{ echo "No results"; }
                
            }else{ echo "Minimum search length is ".$min_length; }
        
        ?>
    </body>
</html>
