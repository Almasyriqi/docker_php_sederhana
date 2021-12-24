<?php
echo "Hello there, this is a PHP Apache container <br>";

// The MySQL service named in the docker-compose.yml.
$host = '172.10.0.2';

// Database use name
$user = 'root';

//database user password
$pass = 'admin';

// database name
$mydatabase = 'php_user';

// check the MySQL connection status
$conn = new mysqli($host, $user, $pass, $mydatabase);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected to MySQL server successfully! <br>";
}

// select query
$sql = 'SELECT * FROM users';

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "username: " . $row["username"]. " - password: " . $row["password"]. "<br>";
  }
} else {
  echo "0 results";
}
?>