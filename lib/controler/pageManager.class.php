<?php

class pageManager {

  public function getByUrl($url){
    global $PDO;
    $req='SELECT * FROM pages WHERE url = ? ;';
    $stat=$PDO->prepare($req);
    $stat->execute(array($url));
    if($stat!==false){
      return $stat->fetch();
    }
    return false;
  }

  public function getUrls(){
    global $PDO;
    $req='SELECT url,title FROM pages WHERE url = ? ;';
    $stat=$PDO->prepare($req);
    $stat->execute(array($url));
    if($stat!==false){
      return $stat->fetch();
    }
    return false;
  }

}

?>
