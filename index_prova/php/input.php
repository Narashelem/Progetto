<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "utenti";

$user_h = $_POST["username"];
$pass_h = $_POST["password"];

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$sql = "INSERT INTO utenti (user,password,rank)
VALUES ('$user_h', '$pass_h',0)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>
