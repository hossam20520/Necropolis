<?php

namespace Necropolis\core\view;
use Jenssegers\Blade\Blade;
class view{


    private static $blade = null;
    private static $_instance;
    private static $val = array();
    private static $status = "not_ready";
  
private function __construct(){

  
   

    self::$blade = new Blade('views', 'cache');
   
}

    public static function go($name, $arr = array() ){
           
          
            self::$val = $arr;
           
          if(!self::$_instance) {
        self::$_instance = new self();
    }
    
       echo  self::$blade->make($name, self::$val );

       return self::$_instance;
    }


    public static function redirect($url){
        header("Location: $url");
    }

   




}














?>