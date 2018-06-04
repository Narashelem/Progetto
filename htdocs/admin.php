<?php

  error_reporting(0);
  ini_set('display_errors', 0);
  session_start();

  if(!$_SESSION['logged_in']){
    header( "refresh:0;url=index.php" );
  }else{
    if( $_SESSION['rank'] == 0){
      header( "refresh:0;url=paziente.php" );
    }
  }

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/admincss.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <div class="page">
      <div class="sidemenu">
        <div class="sidemenu-container">
          <ul>
            <li><icon class="fa fa-home"></icon><a href="index.php">Home</a></li>
            <li><icon class="fa fa-user"></icon><a href="index.php">Pazienti</a>
              <ul>
                <li><a href="index.php">Aggiungi</a></li>
                <li><a href="index.php">Elimina</a></li>
                <li><a href="index.php">Prescrivi</a></li>
              </ul>
            </li>
            <li><icon class="fa fa-address-card"></icon><a href="index.php">Calendario</a></li>
            <li><icon class="fa fa-question"></icon><a href="php/signout.php">Esci</a></li>
          </ul>
        </div>
      </div>
      <div class="pagecontent">

      </div>
    </div>
  </body>
</html>
