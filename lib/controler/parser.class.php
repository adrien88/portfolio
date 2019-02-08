<?php
  class parser{

    public static function auto($tplfile, array $data, array $opts){

      if (isset($opts)){
        extract($opts);
      }

      $tpl='';
      if(file_exists($tplfile))
      {
        $tpl=file_get_contents($tplfile);
        $dir=dirname($tplfile).'/';

        preg_match_all('#\$[a-z0-9_-]+#i',$tpl,$matches);
        // echo ' <pre> '.print_r($matches,1).'</pre>';

        if(isset($matches) && !empty($matches)){
          foreach($matches[0] as $patt){
            $key = substr($patt,1);

            if(isset($data[$key])){
              if(file_exists($dir.$data[$key]) && is_file($dir.$data[$key])){
                $subtpl=self::auto($dir.$data[$key],$data,$opts);
                $tpl=str_replace($patt,$subtpl,$tpl);
              }else{
                $tpl=str_replace($patt,$data[$key],$tpl);
              }
            }

            elseif(isset($clean)){
              $tpl=str_replace($patt,'',$tpl);
            }


          }
        }
      }
      return $tpl;
    }
  }

 ?>
