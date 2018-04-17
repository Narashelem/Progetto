<?php
session_start();
$servername = "localhost";
$username = "proget15_root";
$password = "root";
$db = "proget15_utenti";

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


$sql = "SELECT * from paziente, utenti WHERE ID_user = id_utente AND user ='" . $user_h . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

          $user_name = $row["nome"];
          $user_surname = $row["cognome"];
          $user_gender = $row["sesso"];
          $user_cod_fiscale = $row["cod_fiscale"];
          $user_nascita = $row["luogo_nascita"];
          $user_image = $row["img"];

    }
}

if($boh){

    $_SESSION['logged_in'] = true;

    $_SESSION["username"] = $user_h;
    $_SESSION["rank"] = $rank;


    if($rank == 1){
      header( "refresh:0;url=../admin.php" );
    }else{
      $_SESSION["nome"]  = $user_name;
      $_SESSION["cognome"]  = $user_surname;
      $_SESSION["sesso"]  = $user_gender;
      $_SESSION["cod_fiscale"]  = $user_cod_fiscale;
      $_SESSION["luogo_nascita"]  = $user_nascita;
      $_SESSION["img"] = $user_image;
      header( "refresh:0;url=../paziente.php" );
    }
}
else{
    header( "refresh:0;url=../error.php" );
}

$conn->close();
?>
