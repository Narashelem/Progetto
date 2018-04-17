<!DOCTYPE html>

<?php
  session_start();

  if(!$_SESSION['logged_in']){
    header( "refresh:0;url=index.php" );
  }else{
    if( $_SESSION['rank'] == 1){
      header( "refresh:0;url=admin.php" );
    }
  }

  $user_img = $_SESSION["img"];
  $nome = $_SESSION["nome"];
  $cognome = $_SESSION["cognome"];
  $cod_fiscale = $_SESSION["cod_fiscale"];
  $luogo_nascita = $_SESSION["luogo_nascita"];

 ?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/pazientestyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='//fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="js/menu.js"></script>

        <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script>
      function openTab(evt, tabName) {
          var i, tabcontent, tablinks;
          tabcontent = document.getElementsByClassName("tabcontent");
          for (i = 0; i < tabcontent.length; i++) {
              tabcontent[i].style.display = "none";
          }
          tablinks = document.getElementsByClassName("tablinks");
          for (i = 0; i < tablinks.length; i++) {
              tablinks[i].className = tablinks[i].className.replace(" active", "");
          }
          document.getElementById(tabName).style.display = "block";
          evt.currentTarget.className += " active";
      }
      </script>
  </head>
  <body>

    <div class="page">

      <i class="fa fa-bars toggle-menu"> </i>

      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 sidemenu">

        <i class="fa fa-times"></i>
        <div class="sidemenu-container">

          <center>
            <a href="index.html"><h1 class="boxed_item">LOGO <span class="logo_bold">BOLD<span></h1></a>
          </center>



          <div class="navigation_selection">
              <div class="navigation_items" onclick="openTab(event, 'Home')">HOME</div>
              <div class="navigation_items" onclick="openTab(event, 'Calendario')">CALENDARIO</div>
              <div class="navigation_items" onclick="openTab(event, 'Prenotazioni')">PRENOTAZIONI</div>
              <div class="navigation_items" onclick="openTab(event, 'Prescrizioni')">PRESCRIZIONI</div>
          </div>

          <center>
            <a href="php/signout.php">
              <h1 class="boxed_item boxed_item_smaller">
                <i class="fa fa-user"></i> SIGN OUT
              </h1>
            </a>
          </center>

        </div>

      </div>

      <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10  pagecontent">
        <div class="into_page">

          <div id="Home" class="tabcontent home">

            <div class="col-lg-3 home1">
              <div class="user_buttons">

              </div>
              <div class="user_image">
                <img src="<?php  echo $user_img; ?>" class="image_css" alt="">
              </div>
              <div class="user_name">
                <?php echo $nome . "<br>" . $cognome; ?>
              </div>

              <div class="row1">
                <div class="line1">
                </div>
              </div>

              <div class="ruolo">
                Paziente
              </div>

              <div class="row">
                <div class="line">
                </div>
              </div>
            </div>

            <div class="col-lg-9 home2">
              <div class="headerhome2">
                PROFILO <i class="fa fa-user"></i>
              </div>
            </div>

          </div>

          <div id="Calendario" class="tabcontent calendario">
            CALENDARIO
          </div>

          <div id="Prescrizioni" class="tabcontent">

          </div>

          <div id="Prenotazioni" class="tabcontent">

          </div>


        </div>
      </div>
    </div>



  </body>
</html>
