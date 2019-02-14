<?php

class user extends userManager {

  public function __construct(){
    session_start();
    if(
      (!isset($_SESSION['login'])
      || empty($_SESSION['login']))
      && !isset($_SESSION['try'])
    ){
      $_SESSION['try']=3;
    }
  }

  //  formulaire de connexion
  public function connexion_form(){
    $form = '
      <div id="returnmessage">
      </div>
      <form id="loginform" action="" method="post">
        <label for="login">login</label><br>
        <input id="login" type="varchar" name="login" value=""><br>
        <span id="errorLogin"></span>
        <br>
        <label for="password">password</label><br>
        <input id="password" type="password" name="password" value=""><br>
        <span id="errorPassword"></span>
        <hr>
        <input type="submit" name="" value="envoyer">
        <input type="reset" name="" value="effacer">
      </form>
      <script  src="lib/public/js/ajax.login.js">
      </script>
    ';

    $addTPL = [
      'main'=>'page.tpl',
      'title'=>'Login',
      'thumbnail'=>'lib/public/thems/flatdarky/medias/blueasy.header.jpg',
      'description'=>'Connexion utilisateur',
      'content'=>$form
    ];
    return $addTPL;
  }

  public function connexion_test(){
    if (
      isset($_SESSION['try'])
      && $_SESSION['try'] > 0
    ){
      if(
        isset($_POST['login'])
        && !empty($_POST['login'])
      ){

        $data = $this->getinfo($_POST['login']);
        if($data!==false){

          if(
            isset($_POST['password'])
            && !empty($_POST['password'])
          ){

            if(
              // $data['passwd'] == crypt($_POST['password'],md5($data['email']))
              $data['password'] == $_POST['password']
            ){
              $mssg =  "Vous êtes connnecté.";
              $_SESSION['login']=$data['login'];
              header('location:dash.php');
              exit;
            }
            else{
              $mssg =  'Mauvais mot de passe.';
              $_SESSION['try']--;
            }
          }
          else{
            $mssg =  'Mot de passe non renseigné.';
          }
        }
        else{
          $mssg =  'Cet utilisateur n\'existe pas.';
          $_SESSION['try']--;
        }

      }
      else{
        $mssg =  'Le champs utilisateur n\'a pas été renseigné.';
      }
    }
    else{
      $mssg = 'Refus temporaire de connexion par sécurité. Revenez dans 30 minutes.';
    }

    $addTPL = [
      'main'=>'page.tpl',
      'title'=>'Login',
      'thumbnail'=>'lib/public/thems/flatdarky/medias/blueasy.header.jpg',
      'description'=>'Connexion utilisateur',
      'content'=>$mssg
    ];
    return $addTPL;
  }

  public function dropdown_user(){
    if(isset($_SESSION['login'])){
      $dropdown='> '.$_SESSION['login'].' : ';
      $dropdown.='<a href="login.php?closeSession">Déconnexion</a>';
      $dropdown.='<a href="dash.php">Dashboard</a>';

    }
    else{
      $dropdown='<a href="login.php">Connexion</a>';
    }
    return $dropdown;
  }

  public function deconnexion(){
    if(isset($_SESSION['login'])){
      $_SESSION=null;
      session_destroy();
      header('location:');
      exit;
    }
  }

}
