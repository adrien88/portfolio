<?php

class page extends pageManager {

  public function __construct(){

  }

  /*
      Create Bootstrap menu
  */
  public function BootstrapMenu(){
    $listpage='';

    $data = $this->getUrls();
    if(isset($data) and $data!==false){
      foreach($data as $key => $elem){
        $listpage.='<li class="nav-item"><a class="nav-link" href="'.$elem['url'].'">'.$elem['title'].'</a></li>';
      }
    }
    unset($data);
    return $listpage;
  }

  // formualire de page avec option de pré-remplissage
  public function form_page(array $data = []){

    $form = '';
    $form = file_get_content('lib/public/tpl/form_page.tpl');
    $form = parser::parserHTML($form,$data,['clean'=>true]);

    $addTPL = [
      'main'=>'page.tpl',
      'title'=>'Login',
      'thumbnail'=>'lib/public/thems/flatdarky/medias/blueasy.header.jpg',
      'description'=>'Connexion utilisateur',
      'content'=>$form
    ];
    return $addTPL;
  }

}

?>
