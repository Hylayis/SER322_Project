<?php
DEFINE('DB_USER', 'bhweb');
DEFINE('DB_PASSWORD', 'supersecure');
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_NAME', 'bookharmony');

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

?>