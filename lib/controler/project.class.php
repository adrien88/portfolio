<?php

class project  {

  public function __construct(){

  }

  public function projectAdd(){
    //
    if(
      isset($_POST)
      && !empty($_POST)
    ){
      if (
        isset($_FILES['archive']['tmp_name'])
        && !empty($_FILES['archive']['tmp_name'])
      ){
        $target='projets/'.basename($_FILES['archive']['tmp_name']);
        $folder=preg_replace('#\.zip#','',$target);
        move_uploaded_file($_FILES['archive']['tmp_name'],$target);
        $zip=new ZipArchive;
        if(($res=$zip->open($target))!==false){
          mkdir($folder);
          $zip->extractTo($folder);
          $zip->close();
        }

      // ajouter les données
      $about = serialize(
        [
          'title'=>$_POST['title'],
          'description'=>$_POST['description'],
          'owner'=>$_SESSION['login'],
          'publication'=>time(),
          'folder'=>$target,
        ]
      );
      file_put_contents($folder.'/.about.srz',$about);
      $pre = ['status'=>'Les données ont été correctement envoyées'];
      $form = file_get_contents('lib/public/tpl/edit_project.tpl');
      return parser::parserHTML($form,$pre,['clean'=>true]);
    }
  }
  // Formulair envoie de projet
  else{
    $pre = ['status'=>'Envoyer un projet'];
    $form = file_get_contents('lib/public/tpl/edit_project.tpl');
    return parser::parserHTML($form,$pre,['clean'=>true]);
  }
}


  public function projectEdit($id){

  // 
  if(
    isset($_POST)
    && !empty($_POST)
  ){
    if (
      isset($_FILES['archive']['tmp_name'])
      && !empty($_FILES['archive']['tmp_name'])
    ){
      $target='projets/'.basename($_FILES['archive']['tmp_name']);
      $folder=preg_replace('#\.zip$#','',$target);
      move_uploaded_file($_FILES['archive']['tmp_name'],$target);
      $zip=new ZipArchive;
      if(($res=$zip->open($target))!==false){
        mkdir($folder);
        $zip->extractTo($folder);
        $zip->close();
      }

      // ajouter les données
      $about = serialize(
        [
          'title'=>$_POST['title'],
          'description'=>$_POST['description'],
          'owner'=>$_SESSION['login'],
          'publication'=>time(),
          'folder'=>$target,
        ]
      );
      file_put_contents($folder.'/.about.srz',$about);
      $pre = ['status'=>'Les données ont été correctement envoyées'];
      $form = file_get_contents('lib/public/tpl/edit_project.tpl');
      return parser::parserHTML($form,$pre,['clean'=>true]);
    }
  }
  else{

    if(
      isset($id)
      && !empty($id)
    ){
      $pre = [
        'id_page'=>$data['id_page'],
        'title'=>$data['title']
      ];
      // print_r($pre);
      $form = file_get_contents('lib/public/tpl/edit_project.tpl');
      return parser::parserHTML($form,$pre,['clean'=>true]);
    }
    else{
      $list ='';
      foreach(glob('projets/*',GLOB_ONLYDIR) as $folder){

        $list .= '<div class="col-xs-12 col-sm-6 col-md-3 col-lg-4"';
        if(file_exists($folder.'/screenshot.jpg')){
          $list .= ' style="background-image:url(\''.$folder.'/screenshot.jpg'.'\');"';
        }
        $list .= '>';
        $list .= '<a href="'.$folder.'">'.basename($folder).'</a>';
        $list .= '</div>';

      }

      return parser::parserHTML($form,[''=>$list],['clean'=>true]);

      }
    }
  }
}
