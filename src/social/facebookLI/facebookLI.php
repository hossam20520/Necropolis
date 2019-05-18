<?php
namespace Necropolis\social\facebookLI;
use Facebook\Facebook;
use App\social\facebookConf\config;

class facebookLI{

    public static $fb;
    public static $url;
    public static $first_name = null;
    public static $gender_user = null ;
    public static $last_name =null;
    public static $email_fb = null;
    public static $id_user = null;
    public static $pic = null;
    public static $pic_user_fb = null;


    public function __construct(){
      
    }

    public static function getURL(){

     session_start();
     $ar = config::getInfo();
     $fb = new Facebook($ar);

        self::$fb = $fb;

        $helper = $fb->getRedirectLoginHelper();
     $_SESSION['FBRLH_state']=$_GET['state'];
      $permissions = config::getPermissions();
     $url = self::$url;
    $login_url = $helper->getLoginUrl($url, $permissions);

    try{
        $accessToken = $helper->getAccessToken();
        if(isset($accessToken)){
           $_SESSION['access_token'] = (string) $accessToken;
            
            
            
        }
        
        }catch(Exception $exc){
             $exc->getTraceAsString();
        } 

return $login_url;


    }

    public static function Redirect($url){
        self::$url  = $url;
    }

    public static function Info(){
        session_start();
        try{
		
            if(isset($_SESSION['access_token'])){
                self::$fb->setDefaultAccessToken($_SESSION['access_token']);
                $res = self::$fb->get('/me?fields=id,name,email,first_name,last_name,picture,gender');
                $user = $res->getGraphUser();
                $user->getField('name');
                self::$first_name = $user->getField('first_name');
                self::$last_name = $user->getField('last_name');
                self::$email_fb  =  $user->getField('email');
               
                self::$gender_user = $user->getField('gender');
                self::$id_user = $user->getField('id');
                self::$pic  = $user->getPicture();
                self::$pic_user_fb = $name['url'];

                $_SESSION['email'] = $user->getField('email');


            }

        }
    catch (Exception $exc){
		
		
	}
    }




}











?>