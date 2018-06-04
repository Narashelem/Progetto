<?php

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

echo $user_h . "<br>" . $pass_h . "<br>" . $user_nome . "<br>" . $user_cognome . "<br>" . $user_cod_fiscale . "<br>" . $user_luogo_nascita . "<br>" . $user_data_nascita . "<br>" . $user_sesso . "<br>" . $_POST["gender"];
echo $mm . "<br>" . $dd . "<br>" . $yyyy . "<br>" ;
$data_result = $yyyy . '-' . $mm . '-' . $dd;
echo $data_result;
 ?>
