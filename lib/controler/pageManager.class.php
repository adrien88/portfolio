<?php

class pageManager {

  public function add(array $data=[]){
    global $PDO;
    unset($data['id_page']);
    $str = implode(',',array_keys($data));
    $strk = ':'.implode(',:',array_keys($data));
    $req='INSERT INTO pages ('.$str.')VALUES ('.$strk.') ;';

    $stat=$PDO->prepare($req);
    $stat->execute($data);
    $error=$stat->errorInfo()[2];
    if(!empty($error)){
      print_r($error);
      return $error;
    }
    return false;
  }



  public function edit($id,array $data=[]){
    global $PDO;

    unset($data['id_page']);
    $str = '';
    foreach($data as $key=>$val){
      $str .=$key.'=:'.$key.', ';
    }
    $str=substr($str,0,(strlen($str)-2));
    $req='UPDATE pages SET '.$str.' WHERE id_page = \''.$id.'\' ;';

    $stat=$PDO->prepare($req);
    $stat->execute($data);
    $error=$stat->errorInfo()[2];
    if(!empty($error)){
      return $error;
    }
    return false;
  }

  public function delete($id){
    global $PDO;
    $PDO->exec('DELETE FROM pages WHERE id_page = \''.$id.' \';');
  }

  /*
      GET page from urls
  */
  public function getById($id){
    global $PDO;
    $req='SELECT * FROM pages WHERE id_page = ? ;';
    //INNER JOIN users ON users.id_user = pages.id_owner
    $stat=$PDO->prepare($req);
    $stat->execute(array($id));
    if($stat!==false){
      return $stat->fetch();
    }
    return false;
  }

  /*
      GET page from urls
  */
  public function getByUrl($url){
    global $PDO;
    $req='SELECT * FROM pages WHERE url = ? ;';
    //INNER JOIN users ON users.id_user = pages.id_owner
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
    $req='SELECT id_page,url,title,description FROM pages ;';
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
    $req='SELECT id_page,url,title,description,thumbnail,publication FROM pages ;';
    $stat=$PDO->prepare($req);
    $stat->execute();
    if($stat!==false){
      return $stat->fetchAll();
    }
    return false;
  }

}

?>
