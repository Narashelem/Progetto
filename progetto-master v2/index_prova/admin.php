<?php

  session_start();

  if(!$_SESSION['logged_in']){
    header( "refresh:0;url=index.php" );
  }else{
    if( $_SESSION['rank'] == 0){
      header( "refresh:0;url=paziente.php" );
    }
  }

  echo "Pagina admin";
?>
