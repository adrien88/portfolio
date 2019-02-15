<?php

class page extends pageManager {

  public function __construct(){

  }

  public function pageEditor($url=null){
    $list='<ul>';
    if(!isset($url) || empty($url))
    {
      foreach($this->getAllMetas() as $elem){
        $list.='<li>'.$elem['url'].' | <b>'.$elem['title'].'</b> | <i>"'.$elem['description'].'"</i>
        || <a href="?EditPage='.$elem['url'].'">Modifier</a>
        || <a href="DelPage='.$elem['url'].'">Supprimer</a></li>';
      }
      return $list.'</ul>';
    }
    else{
      return $this->form_page($this->getByUrl($url));
    }
  }

  public function pageSubmit(){

    if(
        isset($_POST['url']) && !empty($_POST['url']) &&
        preg_match('#[a-z0-8-_.]{3,}#i',$_POST['url'])
      )
    {
      if(
          isset($_POST['title']) && !empty($_POST['title']) &&
          preg_match('#[a-z0-8-_. ]{5,}#i',$_POST['title'])
        )
      {
        if(
          isset($_POST['loginID']) && !empty($_POST['loginID'])
          )
        {

        }
        else{

        }
      }
      else{

      }
    }
    else{

    }
  }


  /*
      Create Bootstrap menu
  */
  public function BootstrapMenu(){
    $listpage='';

    $data = $this->getUrls();
    if(isset($data) and $data!==false){
      foreach($data as $key => $elem){
        $listpage.='<li class="nav-item"><a class="nav-link" title="'.$elem['description'].'" href="'.$elem['url'].'">'.$elem['title'].'</a></li>';
      }
    }
    unset($data);
    return $listpage;
  }

  // formualire de page avec option de pré-remplissage
  public function form_page(array $data = []){
    // print_r($data);
    $form = file_get_contents('lib/public/tpl/form_page.tpl');
    return parser::parserHTML($form,$data,['clean'=>true]);
  }

}

?>
