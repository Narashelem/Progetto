<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "utenti";

$user_h = $_POST["username"];
$pass_h = $_POST["password"];
$user_nome = $_POST["nome"];
$user_cognome = $_POST["cognome"];
$user_cod_fiscale = $_POST["cod_fiscale"];
$user_luogo_nascita = $_POST["luogo_nascita"];
$user_data_nascita = $_POST["data_nascita"];

if(strcmp($_POST["gender"],"Maschio") == 0){
  $user_sesso = "M";
}else{
  $user_sesso = "F";
}


$mm = mb_substr($user_data_nascita, 0, 2);
$dd = mb_substr($user_data_nascita, 3, 2);
$yyyy = mb_substr($user_data_nascita, 6, 10);

$data_result = $yyyy . '-' . $mm . '-' . $dd;

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

$sql = "INSERT INTO paziente (id_utente, nome, cognome, cod_fiscale, data_nascita, luogo_nascita, sesso)
VALUES ('$id_user' , '$user_nome', '$user_cognome', '$user_cod_fiscale', '$data_result', '$user_luogo_nascita', '$user_sesso')";

if ($conn->query($sql) === TRUE) {
    header( "refresh:0;url= signin.php" );
} else {
    echo "CONNESSIONE AL DATABASE NON RIUSCITA <br> " . $sql . "<br>" . $conn->error;
}

?>
