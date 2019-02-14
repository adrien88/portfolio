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
    'navbar_pages'=>$page->BootstrapMenu(),
    'dropdown_user'=>$USER->dropdown_user()
  ];
  $TPL=array_merge($TPL,$addTPL);

  /*
      Get PATH
  */
  $PATH=router::auto($CONFIG['landing']);
  // print_r($PATH);
  $addTPL = [
    'title'=>$PATH['page'].' | '.$CONFIG['sitetitle'],
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
  // test saved page
  if($data !== false){
    $addTPL = [
      'main'=>'page.tpl'
    ];
    $addTPL=array_merge($addTPL,$data);
  }
  // test statics pasgge
  elseif(file_exists('lib/public/pages/'.$PATH['page'])){
    include 'lib/public/pages/'.$PATH['page'];
  }
  // Send error
  else{
    $addTPL = [
      'main'=>'page.tpl',
      'title'=>'Erreur',
      'descritption'=>'Ce contenu n\'existe pas.',
      'content'=>'La page n\'éxiste pas, à été mise hors ligne, déplacée ou supprimée.'
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
  echo parser::auto($THEM.'/tpl/',$TPL,$opts);


 ?>
