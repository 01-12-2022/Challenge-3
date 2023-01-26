<div class="menu-box">

    <div class="container">

<?php 

echo "test";

$username = $_GET['username'];
$password = $_GET['password'];
$email = $_GET['email'];

$password = md5($password);

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

$result = $connection->query("select exists(select userID from user where username = '" .$username . "' AND password = '" . $password . "' AND email = '" . $email . "') as 'exists';");

$exists = $result->fetch_row()['exists'];

echo "found: " . $exists;

//$result = $connection->query("insert into user (username, password, email) values ('" . $username . "', '" . $password . "', '" . $email . "');SELECT LAST_INSERT_ID() AS userID;");

//$userID = $result->fetch_row()['userID'];



$connection->close();

?>

</div>

</div>