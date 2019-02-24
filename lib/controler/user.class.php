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
      $_SESSION['login']='Visiteur';
    }
  }

  //  formulaire de connexion
  public function connexion_form(){
    $form = file_get_contents('lib/public/tpl/form_login.tpl');
    $form = parser::parserHTML($form,[],['clean'=>true]);

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
              $_SESSION['id_user']=$data['id_user'];
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
    if(
      isset($_SESSION['login'])
      && $_SESSION['login'] != 'Visiteur'
    ){
      $dropdown='<a class="dropdown-menu-item" href="dash.php"> Dashboard </a>';
      $dropdown.=' <a class="dropdown-menu-item" href="login.php?closeSession">Déconnexion</a>';
    }
    else{
      $dropdown='<a class="dropdown-menu-item" href="login.php">Connexion</a>';
    }
    return $dropdown;
  }

  public function deconnexion(){
    if(isset($_SESSION['login'])){
      $_SESSION=null;
      session_destroy();
      header('location:./login.php');
      exit;
    }
  }

}
