<?php

class router {

  public static function auto($landing='./'){
    if(isset($_GET) && !empty($_GET)){
      $out=[];
      $out['path']=array_keys($_GET)[0];
      $parts=explode('/',$out['path']);
      // $out['docRoot']='';
      // for($i=1;$i<=count($parts);$i++){
      //   $out['docRoot'].='../';
      // }
      $out['page']=str_replace('_','.',array_shift($parts));
      $out['obj']=array_shift($parts);
      $out=array_merge($out,$parts);
      return $out;
    }
    else{
      header('Location:'.$landing);
      exit;
    }
  }
}

class routerManager {
  public function __construct(){
  }
}
