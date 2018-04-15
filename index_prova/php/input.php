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

$sql = "INSERT INTO utenti (user,password)
VALUES ('$user_h', '$pass_h')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "SELECT ID_User from utenti";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

          $id_user = $row["ID_User"];
    }
}

$sql = "INSERT INTO paziente (id_utente)
VALUES ('" . $id_user  ."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>
