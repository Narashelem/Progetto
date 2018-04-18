<?php
  error_reporting(0);
  ini_set('display_errors', 0);
  session_start();

  if($_SESSION['logged_in']){
    if($_SESSION['rank'] == 1){
      header( "refresh:0;url=admin.php" );
    }
    else{
      header( "refresh:0;url=paziente.php" );
    }
  }

 ?>

<html>

<head>
  <link rel="stylesheet" type="text/css" href="css/mainstyle.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>

  <script src="js/main.js"></script>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
    $( function() {
      $( "#datepicker" ).datepicker();
    } );
  </script>

</head>

<body>
  <div class="page">
    <div class="header">
      <div class="logo">
        NOME DI CACCA
      </div>
      <div class="nav_menu">
        <li class="active"><a href=" ">HOME</a></li>
        <li><a href=" ">SERVICES</a></li>
        <li><a href=" ">CONTACT</a></li>
        <li><a href=" ">ABOUT</a></li>
        <li><a href=" ">FAQ</a></li>
      </div>
    </div>

    <div class="centro">
      <h1>Prenota le tue visite online!</h1>

      <div class="buttons">
        <btn class="btn button2" onclick="toggleElement('login_content')">Login</btn>
        <btn class="btn button1" onclick="toggleElement('signup_content')">Sign Up</btn>
      </div>
    </div>

    <div class="shadow" id="shadow">
      <div class="login_content" id="login_content">
        <btn class="fa fa-times" onclick="toggleElement('login_content')"></btn>
        <img src="images/user.png" alt="">

        <h3>Sign In</h3>
        <form class="input" action="php/login.php" method="post">

          <div class="inputbox">
            <span><i class="fa fa-user"></i></span>
            <input type="text" name="username" placeholder="Username">
          </div>
          <div class="inputbox">
            <span><i class="fa fa-lock"></i></span>
            <input type="password" name="password" placeholder="Password">
          </div>

          <input type="submit" name="" value="Login">

        </form>
      </div>

      <div class="signup_content" id="signup_content">
        <btn class="fa fa-times" onclick="toggleElement('signup_content')"></btn>
        <btn class="fa fa-angle-double-left" onclick="toggleSignUp()" id="signup_back"></btn>
        <img src="images/user.png" alt="">
        <form class="input" action="php/input.php" method="post">

          <div class="signup1" id="signup1">

            <h3>Sign Up</h3>
            <div class="inputbox">
              <span><i class="fa fa-user"></i></span>
              <input type="text" name="username" required placeholder="Username">
            </div>
            <div class="inputbox">
              <span><i class="fa fa-lock"></i></span>
              <input type="password" name="password" id="password" placeholder="Password">
            </div>

            <div class="inputbox">
              <span><i class="fa fa-lock"></i></span>
              <input type="password" name="password2" id="password2" placeholder="Repeat Password" oninput="check(this)">
            </div>
            <btn class="btn button3" onclick="toggleSignUp()">Continua</btn>

          </div>

          <div class="signup2" id="signup2">

            <h3>Perfavore completa i campi.</h3>

            <div class="inputbox">
              <input type="text" name="nome" placeholder="Nome">
            </div>

            <div class="inputbox">
              <input type="text" name="cognome" placeholder="Cognome">
            </div>

            <div class="inputbox_gender">
              <div class="gender1">
                <span><i class="fa fa-mars"></i></span>
                <input type="radio" name="gender" value="Maschio" checked> Male<br>
              </div>
              <div class="gender2">
                <span><i class="fa fa-venus"></i></span>
                <input type="radio" name="gender" value="Femmina"> Female<br>
              </div>
            </div>

            <div class="inputbox">
              <input type="text" name="cod_fiscale" placeholder="Codice Fiscale">
            </div>

            <div class="inputbox">
              <input type="text" name="luogo_nascita" placeholder="Luogo di Nascita">
            </div>

            <div class="inputbox">
              <input type="text" name="data_nascita" placeholder="Data di Nascita" id="datepicker">
            </div>


            <input type="submit" name="" value="Sign Up">

          </div>
        </form>
      </div>

      <div class="error_content">
        <btn class="fa fa-times" onclick="toggleElement('error_content')"></btn>
        <h1>Username o password non coincidono. Perfavore riprovare</h1>
      </div>

    </div>
  </div>

</body>
<html>
