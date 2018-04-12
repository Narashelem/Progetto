<?php

session_start();

// Echo session variables that were set on previous page
    echo "Username: " . $_SESSION["username"] . ".<br>";
    echo "Rank: " . $_SESSION["rank"] . ". <br>";
    echo "Not_Match: " . $_SESSION["notmatch"];
?>
