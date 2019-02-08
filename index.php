<?php

  ini_set('display_errors','1');

  /*
      load config
  */
  $CONFIG = parse_ini_file('config.ini',1)['site'];
  /*
      defaut render
  */
  $TPL = [
    'lang'=>$CONFIG['lang'],
    'charset'=>$CONFIG['charset'],
    'title'=>$CONFIG['sitetitle'],
    'description'=>$CONFIG['sitedescription'],
    'nav'=>'navbar.tpl',
    'header'=>'header.tpl',
    'footer'=>'footer.tpl',
  ];
  $THEM = 'lib/public/thems/'.$CONFIG['themDefault'];

  /*
      load PDO
  */
  include 'lib/model/pdo.php';

  /*
      Autoloading of PHP class
  */
  spl_autoload_register(function ($class) {
      include 'lib/controler/'.$class.'.class.php';
  });

  /* create USER */
  $USER = new user();
  /* create PAGE */
  $page = new page();


  // GENERATE MENU
  $addTPL = [
    'navbar_pages'=>$page->BootstrapMenu()
  ];
  $TPL=array_merge($TPL,$addTPL);

  /*
      Get PATH
  */
  $PATH=router::auto($CONFIG['landing']);
  // print_r($PATH);
  $addTPL = [
    'title'=>$PATH['page'].' | '.$CONFIG['sitetitle'],
    'docRoot'=>$PATH['docRoot']
  ];
  $TPL=array_merge($TPL,$addTPL);
  // echo '>>'.$PATH['docRoot'];

  /*
      Load from cache
  */
  $cache='lib/public/cache/'.$PATH['page'];
  if(
    file_exists($cache)
    && ((filemtime($cache) + 3600) < time())
  ){
    include $cache;
    exit;
  }

  /*
      Create content
  */

  $data = $page->getByUrl($PATH['page']);
  if($data !== false){
    $addTPL = [
      'main'=>'page.tpl',
      'header_title'=>$data['title'],
      'header_desc'=>$data['description'],
      'header_bg'=>$data['picture'],
      'main_dpub'=>$data['dpub'],
      'main_content'=>$data['content']
    ];

  } else{
    $addTPL = [
      'main'=>'main.tpl',
      'main_title'=>'Erreur :',
      'main_content'=>'Cette page n\'éxiste pas.'
    ];
  }

  //
  // $physicly = 'lib/public/pages/'.$PATH['page'];
  // if(file_exists($physicly)){
  //   include $physicly;
  // }
  $TPL=array_merge($TPL,$addTPL);


  $opts = [
    'clean'=>true,
    'recursive'=>true
  ];

  /*
      Build page
  */
  // $tpl = file_get_contents();
  echo parser::auto($THEM.'/tpl/index.tpl',$TPL,$opts);


 ?>
