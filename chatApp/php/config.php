
<?php
$servername = "localhost:3008"; // Replace with the correct host and port
$username = "root";
$password = " "; // Replace with the actual password for the MySQL user
$database = "chat";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
