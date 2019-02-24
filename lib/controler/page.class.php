<?php

class page extends pageManager {

  public function __construct(){

  }

  public function pageCreator(){

    $out='';
    if(
        isset($_POST['url']) && !empty($_POST['url'])
        // && preg_match('#[a-z0-8-_.]{3,}#i',$_POST['url'])
      )
    {
      if(
          isset($_POST['title']) && !empty($_POST['title'])
          // && preg_match('#[a-z0-8-_. ]{5,}#i',$_POST['title'])
        )
      {
        if(
          isset($_POST['id_owner']) && !empty($_POST['id_owner'])
          )
        {
          $_POST['publication'] = time();
          $out.= $this->add($_POST);
        }
        else{
          $out.= "";
        }
      }
      else{
        $out.= "";
      }
    }
    else{
      $out.= "";
    }

    $pre=[
      'url'=>'defaut.html',
      'id_owner'=>$_SESSION['id_user'],
      'title'=>'defaut',
      'content'=>'Contenu par defaut.',
      'login'=>$_SESSION['login']
    ];
    $form = file_get_contents('lib/public/tpl/form_page.tpl');
    return parser::parserHTML($form,$pre,['clean'=>true]);
  }

  public function pageEditor($id=null){

    $out='';
    if(
        isset($_POST['url']) && !empty($_POST['url'])
        // && preg_match('#[a-z0-8-_.]{3,}#i',$_POST['url'])
      )
    {
      if(
          isset($_POST['title']) && !empty($_POST['title'])
          // && preg_match('#[a-z0-8-_. ]{5,}#i',$_POST['title'])
        )
      {
        if(
          isset($_POST['id_owner']) && !empty($_POST['id_owner'])
          )
        {

          $out.= $this->edit($_POST['id_page'],$_POST);
        }
        else{
          $out.= "";
        }
      }
      else{
        $out.= "";
      }
    }
    else{
      $out.= "";
    }


    $out.='<table>';
    if(!isset($id) || empty($id))
    {
      foreach($this->getAllMetas() as $elem){
        $out.='<tr><td>'.$elem['id_page'].' | <b>'.$elem['title'].'</b> </td>
        <td><a href="?EditPage='.$elem['id_page'].'"> Modifier </a></td>
        <td><a href="?DelPage='.$elem['id_page'].'"> Supprimer </a></td></tr>';
      }
      return $out.'</table>';
    }
    else{
      $pre = $this->getById($id);
      // print_r($pre);
      $form = file_get_contents('lib/public/tpl/form_page.tpl');
      return parser::parserHTML($form,$pre,['clean'=>true]);
    }
  }



  public function pageDelete(){
    if(
      isset($_POST['pageDelete'])
      && !empty($_POST['pageDelete'])
    ){
      $this->delete($_POST['pageDelete']);
    }
    else{
      $data = $this->getById($_GET['DelPage']);
      $pre = [
        'id_page'=>$data['id_page'],
        'title'=>$data['title']
      ];
      // print_r($pre);
      $form = file_get_contents('lib/public/tpl/del_page.tpl');
      return parser::parserHTML($form,$pre,['clean'=>true]);
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
        $listpage.='<a class="dropdown-menu-item" title="'.$elem['description'].'" href="'.$elem['url'].'">'.$elem['title'].'</a>';
      }
    }
    unset($data);
    return $listpage;
  }



}

?>
