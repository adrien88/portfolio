<?php

  ini_set('display_errors','1');

  /*
  Autoloading of PHP class
  */
  spl_autoload_register(function ($class) {
    include 'lib/controler/'.$class.'.class.php';
  });

  /*
    load config
  */
  $CONFIG = parse_ini_file('config.ini',1)['site'];

  /*
    load config
  */
  // minifier::auto();

  /*
      defaut render
  */
  $TPL = [
    'lang'=>$CONFIG['lang'],
    'charset'=>$CONFIG['charset'],
    'title'=>$CONFIG['sitetitle'],
    'description'=>$CONFIG['sitedescription'],
    'themPath'=>'lib/public/thems/'.$CONFIG['themDefault'],
  ];
  $THEM = 'lib/public/thems/'.$CONFIG['themDefault'].'/tpl/';


  /*
      load PDO
  */
  include 'lib/model/pdo.php';

  /* create USER */
  $USER = new user();
  /* create PAGE */
  $page = new page();

  // GENERATE MENU
  $addTPL = [
    'login'=>ucfirst($_SESSION['login']),
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
      Create content
  */
  $data = $page->getByUrl($PATH['page']);
  // test saved page
  if($data !== false){
    $addTPL = [
      'main'=>'page.tpl'
    ];
    $addTPL=array_merge($addTPL,$data);
    $parser='';
  }
  // test statics pasgge
  elseif(file_exists('lib/public/pages/'.$PATH['page'])){
    include 'lib/public/pages/'.$PATH['page'];
    // $THEM = 'lib/public';
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

  $TPL=array_merge($TPL,$addTPL);

  $opts = [
    'clean'=>true,
    'recursive'=>true
  ];

  /*
      Build page
  */
  echo parser::auto($THEM,$TPL,$opts);


 ?>
