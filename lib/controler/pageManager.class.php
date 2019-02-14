<?php

class pageManager {

  /*
      GET page from urls
  */
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

  /*
      GET urls list to create a menu
  */
  public function getUrls(){
    global $PDO;
    $req='SELECT url,title FROM pages ;';
    $stat=$PDO->prepare($req);
    $stat->execute();
    if($stat!==false){
      return $stat->fetchAll();
    }
    return false;
  }

  /*
      GET meta
  */
  public function getAllMetas(){
    global $PDO;
    $req='SELECT url,title,description,thumbnail,publication FROM pages ;';
    $stat=$PDO->prepare($req);
    $stat->execute();
    if($stat!==false){
      return $stat->fetchAll();
    }
    return false;
  }

}

?>
