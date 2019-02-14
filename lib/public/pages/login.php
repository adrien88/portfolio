<?php

  // Connexion d'utilisateurs
  if(
    isset($_POST['login'])
    && !empty($_POST['login'])
  ){
    $addTPL = $USER->connexion_test();
  }
  else{
    $addTPL = $USER->connexion_form();
  }

  // Connexion d'utilisateurs
  if(
    isset($_GET['closeSession'])
  ){
    $USER->deconnexion();
  }


?>
