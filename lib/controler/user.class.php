<?php

class user extends userManager {

  public function __construct(){
    session_start();
  }

  public function connexion(){
    if (
      isset($_SESSION['try'])
      && $_SESSION['try'] > 0
    ){
      if(
        isset($_POST['login'])
        && !empty($_POST['login'])
      ){

        $data = getinfo($_POST['login']);
        if($data!==false){

          if(
            isset($_POST['password'])
            && !empty($_POST['password'])
          ){

            if(
              // $data['passwd'] == crypt($_POST['password'],md5($data['email']))
              $data['passwd'] == $_POST['password']
            ){
              return "Vous êtes connnecté.";
              // $_SESSION['login']=$data['login'];
            }
            else{
              return 'Mauvais mot de passe.';
              $_SESSION['try']--;
            }
          }
          else{
            return 'Mot de passe non renseigné.';
          }
        }
        else{
          return 'Cet utilisateur n\'existe pas.';
          $_SESSION['try']--;
        }

      }
      else{
        return 'Le champs utilisateur n\'a pas été renseigné.';
      }
    }
    else{
      return 'Refus temporaire de connexion par sécurité. Revenez dans 30 minutes.';
    }
  }

  public function deconnexion(){
  }

}
