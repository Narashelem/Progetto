<?php

session_start();

// Echo session variables that were set on previous page
    echo "Username: " . $_SESSION["username"] . ".<br>";
    echo "Rank: " . $_SESSION["rank"] . ". <br>";
    echo "Image: " . $_SESSION["img"]. ".<br>";

    echo "Nome: " . $_SESSION["nome"]. ".<br>";
    echo "Cognome: " . $_SESSION["cognome"]. ".<br>";
    echo "Sesso: " . $_SESSION["sesso"]. ".<br>";
    echo "Codice fiscale: " . $_SESSION["cod_fiscale"]. ".<br>";
    echo "Luogo di nascita: " . $_SESSION["luogo_nascita"]. ".<br>";


?>
