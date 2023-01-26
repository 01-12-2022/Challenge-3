<?php 

$host = "localhost";
$database = "tshitshop";
$username = "itech";
$password = "01122022";
$port = 3306;

// database connection using login data above
$connection = new \mysqli($host, $username, $password, $database, $port);

// if an error occoured, the error will be print on website
if ($connection -> connect_errno) {
	echo "Failed to connect to MySQL: " . $connection -> connect_error;
	exit();
}

$connection->close();


?>