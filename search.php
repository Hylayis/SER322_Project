<html>
    <head>
        <title>Search</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>
        <?php
        require 'bhconnect.php';
        
        $query = $_GET['query']; //use $_POST?
        $min_length = 3; //sets minimum query length

        if(strlen($query) >= $min_length) {

            $query = htmlspecialchars($query); //html to equivalent
            $query = mysql_real_escape_string($query); //prevents SQL injections
            
            $raw_results = mysql_query("SELECT * FROM Books
                WHERE (`title` LIKE '%".$query."%')
                OR (`author` LIKE '%".$query."%')
                OR (`ISBN` LIKE '%".$query."%')
                OR (`type` LIKE '%".$query."%')
                OR (`genre` LIKE '%".$query."%')") or die(mysql_error());
                
            if(mysql_num_rows($raw_results) > 0) {
                // echo "<table id='Search Results'>";
                
                // populates array
                while($result = mysql_fetch_array($raw_results)) {
                    
                    echo "<p><h3>".$result['title']."</h3>".$result['author']."</p>";
                }
                    
            }else{ echo "No results"; }
                
        }else{ echo "Minimum search is ".$min_length." characters"; }
        
        ?>
    </body>
</html>
