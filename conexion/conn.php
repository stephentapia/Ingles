<?php
// Connection variables
$dbhost	= "sql10.freesqldatabase.com";// localhost or IP
$dbuser	= "sql10628741";// database username
$dbpass	= "NZe9mlX9vQ";// database password
$dbname	= "sql10628741";// database name

// Connection variables
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


?>