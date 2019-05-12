<?php
namespace Necropolis\sessions;
use Necropolis\core\view\view;

class session{
    
    public static $value;
    protected static $instance;
    public $user;


   
    public static function test(){
        echo "hello";
    }

    public static function setSession($key,$val){
    session_start();
       
     $_SESSION[$key] = $val;
    }

    public static function getSession($key){
        session_start();
         self::$value =  @$_SESSION[$key];
        
       // $this->user = unserialize($_SESSION["user"]);
       
        

    return self::$value;
    }






    public static function destroyAll(){
        session_start();
       // self::$value  = null;
        //session_start();
        
        session_destroy();
        session_unset();
    }

    public static function isLoged($key, $url){
        session_start();
        if(@$_SESSION[$key] !== null ){
            view::redirect($url);
       
        }else{
            
        }
    }


   
}









?>