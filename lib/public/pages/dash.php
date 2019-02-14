<?php

$content = '';
$content .= '<a href="?NewPage">Créer une page</a> | ';
$content .= '<a href="?EditPage">Éditer une page</a> | ';
$content .= '<a href="?DelPage">Supprimer une page</a> | ';
$content .= '<br>';

if(
    isset($_SESSION['login'])
    && empty($_SESSION['login'])
  ){


    //  evoyer une page
    if(isset($_POST['page'])){

    }
    //  ennvoyer un projet
    elseif(isset($_POST['projet'])){

    }

    // formulaire envois nouvelle page
    if(isset($_GET['NewPage'])){
      $page = new page();
      $page->form_page(['title'=>'defaut','content'=>'Contenu par defaut.']);
    }

    // formulaire envois nouvelle page
    elseif(isset($_GET['EditPage'])){
      $page = new page();
      $list='';
      if(empty($_GET['EditPage'])){
        foreach($page->getAllMetas() as $elem){
          $list='<a href="?EditPage='.$elem['url'].'">'.$elem['title'].'</a>';
        }
        $content .= $list.'truc';
      }
      else{
        $content .= $page->form_page($page->getByUrl($_GET['EditPage']));
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
