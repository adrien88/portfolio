<?php

$content = '';
$content .= '<a href="?NewPage" class="pbutton">Créer une page</a> | ';
$content .= '<a href="?EditPage" class="pbutton">Éditer une page</a> | ';
$content .= '<a href="?NewProject" class="pbutton">Créer un Projet</a> | ';
$content .= '<a href="?EditProject" class="pbutton">Éditer une Projet</a> | ';
$content .= '<br>';

if(
    isset($_SESSION['login'])
    && !empty($_SESSION['login'])
  ){

    // formulaire envois nouvelle page
    if(isset($_GET['NewPage'])){

      //  tester
      if(isset($_POST['page'])){

      }

      $page = new page();
      $content .= $page->form_page([
        'title'=>'defaut',
        'content'=>'Contenu par defaut.',
        'login'=>$_SESSION['login'],
        'publication' => date('d/m/Y')
      ]);
    }

    // formulaire envois de pages en édition
    elseif(isset($_GET['EditPage'])){

      $page = new page();
      //  tester
      if(isset($_POST['page'])){
        $return = $page->pageSumit();
        $content .= $page->pageEditor($_GET['EditPage']);

      } else{
        $content .= $page->pageEditor($_GET['EditPage']);
      }

    }

    // formulaire envoie nouveau projet
    if(isset($_GET['NewProject'])){
      $PROJECT = new project();
    }
  }

  $addTPL = [
    'main'=>'page.tpl',
    'title'=>'Dash',
    'thumbnail'=>'lib/public/thems/flatdarky/medias/blueasy.header.jpg',
    'description'=>'Dashboard utilisateur',
    'content'=>$content
  ];

?>
