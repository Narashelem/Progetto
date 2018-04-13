<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$db = "utenti";

$user_h = $_POST["username"];
$pass_h = $_POST["password"];
$boh = false;


// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
/*echo "Connected successfully"; */

$sql = "SELECT * from utenti";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

        if($user_h == $row["user"] && $pass_h == $row["password"]){
            $boh = true;
            $rank = $row["rank"];
        }
    }
}

if($boh){

    $_SESSION["username"] = $user_h;
    $_SESSION["rank"] = $rank;
    $_SESSION["notmatch"] = 0;

    header( "refresh:3;url=session.php" );

    echo "Connesso";
}
else{
    $_SESSION["notmatch"] = 1;

    header( "refresh:3;url=index.html" );

    echo "User o password ERRATI";
}

$conn->close();
?>
