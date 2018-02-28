<html>
    <head>
        <title>Search</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>
        <?php
        require 'bhconnect.php';
        
        $query = $_POST['keyword']; //use $_POST?
        $min_length = 3; //sets minimum query length
		
        
        if(strlen($query) >= $min_length) {

            //$query = htmlspecialchars($query); //html to equivalent
            //$query = mysql_real_escape_string($query); //prevents SQL injections
        	$qstring = "SELECT * FROM Books JOIN Authors on(Books.author=Authors.authorID) WHERE title LIKE '%".$query."%'
						OR (Authors.name LIKE '%".$query."%')
                		OR (ISBN LIKE '%".$query."%')
                		OR (type LIKE '%".$query."%')
               			OR (genre LIKE '%".$query."%')";
        	
        	
            
        	$response = @mysqli_query($dbc, $qstring);           
            if($response) {
                // echo "<table id='Search Results'>";                
                // populates array
                while($row = mysqli_fetch_array($response)) {
                    
                    echo "<p><h3>".$row['title']."</h3>".
                		"Author: ".$row['name']."<br>".
                		"Pages: ".$row['pages']."<br>".
						"Genre: ".$row['genre']."<br>".
						"ISBN: ".$row['ISBN']."<br></p>";
                }
                    
            }else{ echo "No results"; }
                
        }else{ echo "Minimum search is ".$min_length." characters"; }
        
        ?>
    </body>
</html>
