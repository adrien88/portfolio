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

}

?>
