<?php

$content = '<div class="DashNav">';
$content .= '<a href="?EditPage" class="pbutton">Gérer les pages</a> ';
$content .= '<a href="?NewPage" class="pbutton">Créer une page</a> ';
$content .= '<a href="?projectAdd" class="pbutton">Créer un Projet</a> ';
$content .= '<a href="?EditProject" class="pbutton">Éditer une Projet</a> ';
$content .= '</div>';

if(
    isset($_SESSION['login'])
    && !empty($_SESSION['login'])
  ){

    // formulaire envois nouvelle page
    if(isset($_GET['NewPage'])){
      $page = new page();
      $content .= $page->pageCreator();
    }

    // formulaire envois de pages en édition
    elseif(isset($_GET['EditPage'])){
      $page = new page();
      $content .= $page->pageEditor($_GET['EditPage']);
    }

    // formulaire envois de pages en édition
    elseif(isset($_GET['DelPage'])){
      $page = new page();
      $content .= $page->pageDelete();
    }

    // formulaire envoie nouveau projet
    if(isset($_GET['projectAdd'])){
      $project = new project();
      $content .= $project -> projectAdd();
    }
    // Formulaire de lodification de projet
    elseif(isset($_GET['projectEdit'])){
      $PROJECT = new project();
      $content .= $project -> projectEdit();
    }
  }

  $addTPL = [
    'main'=>'page.tpl',
    'title'=>'>> DashBoard',
    'thumbnail'=>'lib/public/thems/flatdarky/medias/blueasy.header.jpg',
    'description'=>'Dashboard utilisateur',
    'content'=>$content
  ];

?>
